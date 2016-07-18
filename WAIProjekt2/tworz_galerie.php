<?php
include("tworz_galerie2.php");
$dir = opendir("images");
$index=0;

$xml=simplexml_load_file("zdjecia.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $zdj)
	{ 
		if($zdj["publiczne"] == "Tak")
		{
				$tab[trim($zdj->plik)]="Tak";
		}
		else
		{
			$tab[trim($zdj->plik)]="Nie";
		}
	}
while(false !== ($file = readdir($dir)))
{
	if($file != '.' && $file != '..' && $file != 'Miniatury' && $file != 'zdjecia_znak_wodny' && $tab[$file]=="Tak") 
    {
		
		jezeli($file, $index);
		$index++;
	}
}

?>