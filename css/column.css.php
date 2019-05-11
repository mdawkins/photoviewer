<?php

$color_dark = '#4384d3';
$color_lite = '#ffffff';
$color_med = '#dddddd';

$px_large = '14px';
$px_med = '12px';
$px_small = '10px';

echo'

#left_column {
	width: 100%;
	color: '.$color_dark.';
	font-size: '.$px_med.';
	text-decoration: none;
	font-weight: bold;
}

#right_column {
	width: 100%;
	color: '.$color_dark.';
	font-size: '.$px_med.';
	text-decoration: none;
	font-weight: bold;
	background-color: transparent;
}

ul.menu  {
	text-align: left;
	border: 1px solid '.$color_dark.';
	background: '.$color_med.';
}

.menu li {
	padding: 3px;
	list-style-type: none;
}
				
a.menu_item, a.menu_item:link, a.menu_item:visited, a.menu_item:active, a.menu_item:visited {
	background: transparent;
	text-decoration: none; 
	font-size: '.$px_med.'; 
	color: '.$color_dark.'; 
	font-weight: bold;
}

a.menu_item:hover {
	color: '.$color_lite.'; 
}
				
ul.botmenu  {
        border: 1px solid '.$color_dark.';
        text-align: center;
        padding: 0px;
        background: '.$color_med.';
}

.botmenu li {
        padding: 3px;
        list-style-type: none;
}
				
ul.blog  {
        border: 1px solid '.$color_dark.';
        text-align: center;
        padding: 0px;
        background: '.$color_med.';
}

.blog li {
        padding: 3px;
        list-style-type: none;
}

';
?>
