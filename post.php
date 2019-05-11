<?php
if ( !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"]) )
{
	$out="\t<ul class=footer>\n\t\t<li>".date("Y.m.d").' '.date("H:i:s T").' - From/De: '.$_POST["name"].' Email: <a class=link href="mailto:'.$_POST["email"].'">'.$_POST["email"]."</a></li>\n\t\t<li>".$_POST["message"]."</li>\n\t</ul>\n";
	#echo $out;
	chdir(".");
	$dir=opendir(".");
	$file = fopen("blog.txt", "r");
	$text = fread($file, filesize("blog.txt"));
	fclose($file);
	$file = fopen("blog.txt", "w");
	fwrite($file, $out.$text);
	fclose($file);
	header('Location:'.$_SERVER["HTTP_REFERER"]);
	#phpinfo();
}
else
{
	#phpinfo();
	#$_SERVER["HTTP_REFERER"] = str_replace('?error=empty', '', $_SERVER["HTTP_REFERER"]);
	#$_SERVER["HTTP_REFERER"] = str_replace('&error=empty', '', $_SERVER["HTTP_REFERER"]);
	#header('Location:'.$_SERVER["HTTP_REFERER"].'?error=empty');
	header('Location:'.$_SERVER["HTTP_REFERER"]);
}
?>
