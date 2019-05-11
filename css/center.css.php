<?php

$color_dark = '#4384d3';
$color_lite = '#ffffff';
$color_med = '#dddddd';

$px_large = '14px';
$px_med = '12px';
$px_small = '10px';

echo'

#center{
	width: 100%;
	padding: 0px;
	margin-right: 4px;
	color: '.$color_dark.';
	font-size: '.$px_med.';
	text-decoration: none;
	font-weight: bold;
	background-color: transparent;
}

ul.header  {
	border: 1px solid '.$color_dark.';
	text-align: center;
	padding-left: 20px;
	background: '.$color_med.';
}

.header li {
	padding: 3px;
	list-style-type: none;
}
				
a.image, a.image:link, a.image:visited, a.image:active, a.image:visited, a.link, a.link:link, a.link:visited, a.link:active, a.link:visited {
	background: transparent;
	text-decoration: none; 
	font-size: '.$px_med.'; 
	color: '.$color_dark.'; 
	font-weight: bold;
}

a.link:hover {
	color: '.$color_lite.'; 
}
				
ul.main  {
        border: 1px solid '.$color_dark.';
        text-align: left;
        padding: 0px;
        background: '.$color_med.';
}

.main li {
        padding: 3px;
        list-style-type: none;
}
				
ul.footer  {
        border: 1px solid '.$color_dark.';
        text-align: left;
        padding: 0px;
        background: '.$color_med.';
}

.footer li {
        padding: 3px;
        list-style-type: none;
}

';
?>
