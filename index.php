<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><title>photoviewer</title>
<link rel="shortcut icon" href="/favicon.png">
<link rel="stylesheet" type="text/css" href="/css/column.css.php">
<link rel="stylesheet" type="text/css" href="/css/center.css.php">
</head>
<body>
<table>
<tr>
<td valign=top>
<?php

$PHP_SELF = 'index.php';
if ($handle = opendir('.')) {
	while (false !== ($directory = readdir($handle))) {
		if(is_dir($directory) && $directory != '.' && $directory != '..') {
			chdir($directory);
			$handle2 = opendir('.');
			while(false !== ($file = readdir($handle2)))
			if($file == 'info.php') {
				$directories[] = $directory;
			}
			chdir('../');
		}
	}
	closedir($handle);
}
sort($directories);
echo '<div id=left_column>
	<ul class=menu>'."\n";
while (list($l,$directory) = each($directories)) {
	require_once $directory.'/info.php';
	echo "\t\t".'<li><a class=menu_item href="'.$PHP_SELF.'?dir='.$directory.'">'.$title.'</a></li>'."\n";

}
echo "	</ul>\n";
?>
</div>
</td>
<td valign=top>
<div id=center>
<?php
if ( !empty($_GET["dir"]) && is_dir($_GET["dir"]) ) {
	chdir($_GET["dir"]);
	if ($handle = opendir('.')) {
		while (false !== ($file = readdir($handle)) ) {
			if ( substr($file,-7) == "_tn.jpg" ) {
				$thumbnails[] = $file;
			}
		}
       		closedir($handle);
		sort($thumbnails);

		if ( !isset($_GET["image"]) ) {
			$key = array_search($_GET["dir"], $directories);
			if( array_key_exists($key-1, $directories) ) {
				$previous_dir = $directories[$key-1];
				$previous_link = 'href="'.$PHP_SELF.'?dir='.$previous_dir.'"';
			} else $previous_link = null;
			
			if( array_key_exists($key+1, $directories) ) {
				$next_dir = $directories[$key+1];
				$next_link = 'href="'.$PHP_SELF.'?dir='.$next_dir.'"';
			} else $next_link = null;
			
			echo "\t<ul class=header>\n\t\t<li>";
			echo '<a class=link '.$previous_link.'><< Previous Date / Fecha Anterior </a>';
			require $_GET["dir"].'/info.php';
			echo '<a class=link href="'.$PHP_SELF.'?dir='.$_GET["dir"].'"><< '.$title.' >></a>';
			echo '<a class=link '.$next_link.'> Next Date / Siguiente  Fecha>></a>';
			echo "</li>\n\t</ul>\n"; 
//
			#echo "\t\t".'<li><a class=link href="'.$_GET["dir"].'/'.$_GET["dir"].'_ms.zip">Download Low Resolution Photos - Zipped / Descargue Fotos de Baja Resolucion en un archivo Zip</a></li>'."\n";
#</div>'."\n";
			echo "\t<ul class=main>\n\t\t<li>\n";
        		while (list($l,$image) = each($thumbnails)) {
				echo "\t\t<a class=image href=\"".$_SERVER["REQUEST_URI"].'&image='.substr($image,0,8).'_ms.jpg"><img src="'.$_GET["dir"].'/'.$image."\"></a>\n";
        		}
			echo "\t\t</li>\n\t</ul>\n";
		} elseif(!empty($_GET["image"]) && is_file($_GET["image"]) ) {
			$image_search = substr($_GET["image"],0,8).'_tn.jpg';
			$key = array_search($image_search, $thumbnails);
			if ( array_key_exists($key-1, $thumbnails) ) {
				$previous_image = $thumbnails[$key-1];
				$previous_link = 'href="'.$PHP_SELF.'?dir='.$_GET["dir"].'&image='.substr($previous_image,0,8).'_ms.jpg"';
			} else $previous_link = null;
			
			if ( array_key_exists($key+1, $thumbnails) ) {
				$next_image = $thumbnails[$key+1];
				$next_link = 'href="'.$PHP_SELF.'?dir='.$_GET["dir"].'&image='.substr($next_image,0,8).'_ms.jpg"';
			} else $next_link = null;

			echo "\t<ul class=header>\n\t\t<li>";
			echo '<a class=link '.$previous_link.'><< Previous Photo / Foto Anterior </a>';
			require $_GET["dir"].'/info.php';
			echo '<a class=link href="'.$PHP_SELF.'?dir='.$_GET["dir"].'"><< '.$title.' >></a>';
			echo '<a class=link '.$next_link.'> Next Photo / Siguiente Foto >></a>';
			echo "</li>\n\t</ul>\n"; 
			
			echo "\t<ul class=main>\n\t\t<li>";
			echo '<a class=image href="'.$_GET["dir"].'/'.substr($_GET["image"],0,8).'.jpg"><img src="'.$_GET["dir"].'/'.$_GET["image"]."\"></a>";	
			echo "</li>\n\t</ul>\n";
		}
	}
}

//chdir("/home/websites/photoviewer/");
//$dir=opendir(".");
//$file = fopen("blog.txt", "r");
//$text = fread($file, filesize("blog.txt"));
//fclose($file);
#echo $text."</div>\n"; 
echo "</div>\n"; 
#PHPINFO(32);
?>
</td>
<td valign=top>
<div id=right_column>
<?php

/*echo '<form name=blog method=post action="/post.php">'."\n";
echo "	<ul class=blog>\n\t";
		echo "\t\t".'<li>m-blog: Leave your message here / Deja tu mensaje aqui</li>'."\n";
		echo "\t\t".'<li>Name/Nombre</li><li><input title="Name/Nombre" name=name type=text size=18></li>'."\n";
		echo "\t\t".'<li>Email</li><li><input title="Email" name=email type=text size=18></li>'."\n";
		echo "\t\t".'<li>Message/Mensaje</li><li><textarea title="Message/Mensaje" name=message rows=10 cols=15></textarea></li>'."\n";
		echo "\t\t".'<li><input value="Post" name=button type=submit></li>'."\n\t";
echo "	</ul>\n";
echo "</form>\n"; */
echo "\t<ul class=botmenu>\n";
	#if ($_ENV["LANG"] == 'en_US') # need a newer version of PHP for this
		echo "\t\t".'<li>This site is best viewed with <a class=menu_item href="http://mozilla.org">Mozilla Firefox</a></li>'."\n";
	#else
		echo "\t\t".'<li>Este sitio de web est&aacute; mejor visto con <a class=menu_item href="http://mozilla.org">Mozilla Firefox</a></li>'."\n";
echo "\t</ul>\n";
echo "</div>\n";
?>
</td>
</tr>
</table>
</body>
</html>
