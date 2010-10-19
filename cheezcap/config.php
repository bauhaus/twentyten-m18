<?php
//
// CheezCap - Cheezburger Custom Administration Panel
// (c) 2008 - 2010 Cheezburger Network (Pet Holdings, Inc.)
// LOL: http://cheezburger.com
// Source: http://code.google.com/p/cheezcap/
// Authors: Kyall Barrows, Toby McKes, Stefan Rusek, Scott Porad
// License: GNU General Public License, version 2 (GPL), http://www.gnu.org/licenses/gpl-2.0.html
//

$themename = "CheezCap";	// used on the title of the custom admin page

function cap_get_options()
{
    $number_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10","12","14","16","18","20");
	return array(
		new Group ("First Group", "firstGroup",
			array(
					new BooleanOption("Simple Boolean Example", "This will create a simple true/false switch with default of \"true\".", "simple_boolean_example", true),
	                new TextOption("Simple Text Exmaple", "This will create store a string value with a default of \"Say Cheez!\".", "simple_text_example", "Say Cheez!"),
					new TextOption("Text Area Exmaple", "This text option is displayed as a Text Area", "text_area_example", "Sup Dawg?  I put an option in your option so that you would have options.", true),
					new DropdownOption("Inline Options Dropdown Example", "This dropdown creates its options using an inline array.", "inline_options_dropdown_example", array('Red', 'Yellow', 'Green')),
					new DropdownOption("Reusable Options Dropdown Example", "This dropdown creates its options by reusing an array.", "resuable_options_dropdown_example", $number_entries),
				)
			)
			,
		new Group ("Another Group", "anotherGroup",
			array(
					new BooleanOption("Simple Boolean Example #2", "This will create a simple true/false switch with default of \"true\".", "simple_boolean_example2", true),
	                new TextOption("Simple Text Exmaple #2", "This will create store a string value with a default of \"Say Cheez!\".", "simple_text_example2", "Say Cheez!"),
					new TextOption("Text Area Exmaple #2", "This text option is displayed as a Text Area", "text_area_example2", "Sup Dawg?  I put an option in your option so that you would have options.", true),
					new DropdownOption("Inline Options Dropdown Example #2", "This dropdown creates its options using an inline array.", "inline_options_dropdown_example2", array('Red', 'Yellow', 'Green')),
					new DropdownOption("Reusable Options Dropdown Example #2", "This dropdown creates its options by reusing an array.", "resuable_options_dropdown_example2", $number_entries),
				)
			)
			,
		new Group ("Yet Another", "yetAnother",
			array(
					new BooleanOption("Simple Boolean Example #3", "This will create a simple true/false switch with default of \"true\".", "simple_boolean_example3", true),
	                new TextOption("Simple Text Exmaple #3", "This will create store a string value with a default of \"Say Cheez!\".", "simple_text_example3", "Say Cheez!"),
					new TextOption("Text Area Exmaple #3", "This text option is displayed as a Text Area", "text_area_example3", "Sup Dawg?  I put an option in your option so that you would have options.", true),
					new DropdownOption("Inline Options Dropdown Example #3", "This dropdown creates its options using an inline array.", "inline_options_dropdown_example3", array('Red', 'Yellow', 'Green')),
					new DropdownOption("Reusable Options Dropdown Example #3", "This dropdown creates its options by reusing an array.", "resuable_options_dropdown_example3", $number_entries),
				)
			)
	);
}


?>