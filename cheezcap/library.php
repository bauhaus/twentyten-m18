<?php
//
// CheezCap - Cheezburger Custom Administration Panel
// (c) 2008 - 2010 Cheezburger Network (Pet Holdings, Inc.)
// LOL: http://cheezburger.com
// Source: http://code.google.com/p/cheezcap/
// Authors: Kyall Barrows, Toby McKes, Stefan Rusek, Scott Porad
// License: GNU General Public License, version 2 (GPL), http://www.gnu.org/licenses/gpl-2.0.html
//

class Group
{
	var $name;
	var $id;
	var $options;
	
	function Group( $_name, $_id, $_options )
	{
		$this->name = $_name;
		$this->id = "cap_" . $_id;
		$this->options = $_options;
	}
	
	function WriteHtml()
	{
		?>
            <table width="100%">
                <tr>
                    <th width="50%">Option</th>
                    <th width="50%">Value</th>
                </tr>
                <?php 
                    for( $i=0; $i < count( $this->options ); $i++ )
                    {
                        $this->options[$i]->WriteHtml();
                    }
                ?>
            </table>
		<?php 
	}
}

class Option
{
	var $name;
	var $desc;
	var $id;
    var $_key;
	var $std;
	
	function Option( $_name, $_desc, $_id, $_std )
	{
		$this->name = $_name;
		$this->desc = $_desc;
        $this->id = "cap_" . $_id;
        $this->_key = $_id;
		$this->std = $_std;
	}
	
	function WriteHtml()
	{
		echo "";
	}
	
	function Update($ignored)
	{
        $value = $_POST[$this->id];
		update_option( $this->id, $value );
	}
	
	function Reset($ignored)
	{
		update_option( $this->id, $this->std );
	}
	
	function Import($data)
    {
        if (array_key_exists($this->id, $data->dict))
            update_option( $this->id, $data->dict[$this->id] );
	}
	
	function Export($data)
    {
        $data->dict[$this->id] = get_option($this->id);
    }

    function get()
    {
        return get_option($this->id);
    }
}

class TextOption extends Option
{
    var $useTextArea;

	function TextOption( $_name, $_desc, $_id, $_std = "", $_useTextArea = false )
	{
        $this->Option( $_name, $_desc, $_id, $_std );
        $this->useTextArea = $_useTextArea;
	}
	
	function WriteHtml()
	{
		$stdText = $this->std;
		
        if ( get_settings( $this->id ) != "" )
            $stdText =  get_settings( $this->id );

		?><tr align="left">
					<th scope="row"><?php echo $this->name ?>:</th>
                    <?php
        $commentWidth = 2;
        if ($this->useTextArea) {
            $commentWidth = 1;
            ?><td rowspan="2"><textarea style="width:100%;height:100%;" name="<?php echo $this->id ?>" id="<?php echo $this->id ?>"><?php echo htmlspecialchars($stdText) ?></textarea><?php
        }else {
            ?><td><input name="<?php echo $this->id ?>" id="<?php echo $this->id ?>" type="text" value="<?php echo htmlspecialchars($stdText) ?>" size="40" /><?php
        }
					?></td>
				</tr>
                <tr><td colspan="<?php echo $commentWidth; ?>"><small><?php echo $this->desc ?></small></td></tr><tr><td colspan="2"><hr /></td></tr><?php 
	}

    function get()
    {
        $value = get_option($this->id);
        if (!$value)
            return $this->std;
        return $value;
    }
}

class DropdownOption extends Option
{
    var $options;

	function DropdownOption( $_name, $_desc, $_id, $_options, $_stdIndex = 0 )
	{
		$this->Option( $_name, $_desc, $_id, $_stdIndex );
		$this->options = $_options;
	}
	
	function WriteHtml()
	{
		?>	
		<tr align="left">
			<th scope="top"><?php echo $this->name ?></th>
			<td>
				<select name="<?php echo $this->id ?>" id="<?php echo $this->id ?>">
				<?php
					foreach( $this->options as $option )
					{
						?><option<?php if ( get_settings( $this->id ) == $option || (!get_settings( $this->id ) && $this->options[$this->std] == $option)) {
							echo ' selected="selected"';
						}?>><?php echo $option; ?></option><?php
					}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<small><?php echo $this->desc; ?></small><hr />
			</td>
		</tr><?php
	}

    function get()
    {
        $value = get_option($this->id, $this->default);
        if (strtolower($value) == 'disabled')
            return false;
        return $value;
    }
}

class BooleanOption extends DropdownOption
{
    var $default;
    function BooleanOption( $_name, $_desc, $_id, $_default = false)
    {
        $this->default = $_default;
        $this->DropdownOption($_name, $_desc, $_id, array("Disabled", "Enabled"), $_default ? 1 : 0);
    }

    function get()
    {
        $value = get_option($this->id, $this->default);
        if (is_bool($value))
            return $value;
        switch (strtolower($value)) {
            case 'true':
            case 'enable':
            case 'enabled':
                return true;
            
            default:
                return false;
        }
    }
}

// This class is the handy short cut for accessing config options
// 
// $cap->post_ratings is the same as get_bool_option("cap_post_ratings", false)
//
class autoconfig
{
    private $data = false;
    private $cache = array();

    function init()
    {
        if ($this->data)
            return;

        $this->data = array();
		$options = cap_get_options();
        foreach ($options as $group)
            foreach($group->options as $option)
            {
                $this->data[$option->_key] = $option;
            }
    }

    public function __get($name)
    {
        $this->init();

        if (array_key_exists($name, $this->cache))
            return $this->cache[$name];

        $option = $this->data[$name];
        if (!$option)
            throw new Exception("Unknown key: " . $name);
        $value = $this->cache[$name] = $option->get();
        return $value;
    }

	public function fetchConfig($fn){
		$code = '$this->' . $fn;
		eval("return $code");
	}
}

function top_level_settings()
{
    global $themename;
	
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

	?>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js" type="text/javascript"></script> 

	<div class="wrap">
		<script type="text/javascript">
			function openExpandyGroup( groupId )
			{
				var eOpen = document.getElementById(groupId + '_open');
				eOpen.style.display = 'block';
				var eClosed = document.getElementById(groupId + '_closed');
				eClosed.style.display = 'none';
			}
			function closeExpandyGroup( groupId )
			{
				var eOpen = document.getElementById(groupId + '_open');
				eOpen.style.display = 'none';
				var eClosed = document.getElementById(groupId + '_closed');
				eClosed.style.display = 'block';
			}
		</script>
		<h2><b><?php echo $themename; ?> Theme Options</b></h2>
		
		<form method="post">		

            <div id="config-tabs">
			<?php 
				$groups = cap_get_options();
                print "<ul>";
				foreach( $groups as $group )
                {
                    printf("<li><a href='#%s'>%s</a></li>", $group->id, $group->name);
                }
                print "</ul>";
				foreach( $groups as $group )
                {
                    printf("<div id='%s'>", $group->id);
                    $group->WriteHtml();
                    print "</div>";
                }
            ?>
            </div>
            <script> $(function() { $("#config-tabs").tabs(); }); </script>
			<p class="submit" style='float:left'>
				<input type="hidden" name="action" value="save" />
				<input name="save" type="submit" value="Save changes" />    
			</p>
		</form>
		<form enctype="multipart/form-data" method="post">
			<p class="submit" style='float:left'>
				<input name="action" type="submit" value="Reset" />
            </p>
			<p class="submit" style='margin-left:20px; float:left'>
				<input name="action" type="submit" value="Export" />
			</p>
			<p class="submit" style='float:left'>
                <input name="action" type="submit" value="Import" />
                <input type="file" name="file" />
            </p>
        </form>
        <div style='clear:left'></div>
		<h2>Preview (updated when options are saved)</h2>
		<iframe src="../?preview=true" width="100%" height="600" ></iframe>
	<?php
}

class ImportData
{
    var $dict = array();
}

function cap_serialize_export($data)
{
    header('Content-disposition: attachment; filename=theme-export.txt');
    print serialize($data);
    exit();
}

?>