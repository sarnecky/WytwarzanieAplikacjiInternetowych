<?php
function znak_wodny($sciezka_docelowa, $nazwa_pliku, $typ_zdjecia, $znak_wodny, $cel)
{
	if($typ_zdjecia == "png")
	{
		$image = imagecreatefrompng($sciezka_docelowa);
	}
	else
	{
		$image = imagecreatefromjpeg($sciezka_docelowa);
	}
	$r = 0;
	$g = 0;
	$b = 0;
	$black = imagecolorallocate($image, 0, 0, 0);

	$x = 20;
	$y = 20;
	$watermark = imagecreatefromjpeg("wodny.jpg");

	$width = imagesx($image);
	$height = imagesy($image);

	imagestring($watermark, 5, $x, $y, $znak_wodny, 6);
	$watermark_width = imagesx($watermark);
	$watermark_height = imagesy($watermark);

	imagecopymerge($image, $watermark, (($width - $watermark_width))-10, (($height - $watermark_height))-10, 0, 0, $watermark_width, $watermark_height, 28);

	if($typ_zdjecia == "png")
	{
		imagepng($image, $cel . "zdjecia_znak_wodny/" . "znak_wodny_". $nazwa_pliku  . ".png");
	}
	else
	{
		imagejpeg($image, $cel . "zdjecia_znak_wodny/" . "znak_wodny_". $nazwa_pliku  . ".jpg");
	}
}
function zmiana_rozmiaru($sciezka_docelowa, $nazwa_pliku, $typ_zdjecia, $cel)
{
	if($typ_zdjecia == "png")
	{
		$image = imagecreatefrompng($sciezka_docelowa);
	}
	else
	{
		$image = imagecreatefromjpeg($sciezka_docelowa);
	}
	list($width, $height) = getimagesize($sciezka_docelowa);
	$new_width = 200;
	$new_height = 100;
	$image_new = imagecreatetruecolor($new_width, $new_height);
	imagecopyresized($image_new, $image, 0, 0, 0, 0, $new_width, $new_height,$width, $height);

	if($typ_zdjecia == "png")
	{
		imagepng($image_new, $cel . "Miniatury/" . "miniaturka_". $nazwa_pliku  . ".png");
	}
	else
	{
		imagejpeg($image_new, $cel . "Miniatury/" . "miniaturka_" .  $nazwa_pliku  . ".jpg");
	}
}
?>