<?php 
session_start();
$index=0 ;

if(isset($_SESSION["id"]))
{
	echo "<link rel=\"stylesheet\" href=\"css.css\" type=\"text/css\">";
	echo "<h1 id=\"wysrodkuj\">" ."Prywatna galeria uzytkownika #" . $_SESSION["nazwa"] . "</h1>";
	echo "<div id=\"id3\">";
	$xml=simplexml_load_file("zdjecia.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $zdj)
	{ 
		if($zdj["publiczne"] == "Nie")
		{
			if($zdj->uzytkownik == $_SESSION["id"])
			{
				$min="images/Miniatury/" . "miniaturka_".$zdj->plik;
				$z_w="images/zdjecia_znak_wodny/". "znak_wodny_" . $zdj->plik;
				if(($index+1)%3!=0)
				{
					echo "<a target=\"_blank\" href=\"$z_w\"><img src=\"$min\" alt=\"zdjecie\"/></a>";
				}
				else
				{
					echo "<a target=\"_blank\" href=\"$z_w\"><img src=\"$min\" alt=\"zdjecie\"/></a><br>";
				}	
				$index++;
			}
		}
	}
	
}
else
{
	echo "Jestes niezalogowany, wiec nie mozesz zobaczyc nowej prywatnej galerii";
	echo "<button type=\"button\"><a href=\"logowanie.html\">Zaloguj sie</a></button>";
}
echo "<br>";
echo "<a href=\"galeria.php\">Powrot na strone galerii</a>";
?>