<?php 
session_start();
$index=0 ;

if((isset($_SESSION["zdjecie"])) && (isset($_SESSION["id"])))
{
	echo "<link rel=\"stylesheet\" href=\"css.css\" type=\"text/css\">";
	echo "<h1 id=\"wysrodkuj\">" ."Galeria uzytkownika #" . $_SESSION["nazwa"] . "</h1>";
	echo "<div id=\"id3\">";
	echo "<form action=\"usun_miniatury.php\" method=\"post\" enctype=\"multipart/form-data\">";
	while($index !=$_SESSION["index"]+1)
	{
		if(isset($_SESSION["zdjecie"][$index]))
		{
			$min="images/Miniatury/" . $_SESSION["zdjecie"][$index];
			$nazwa_min = $_SESSION["zdjecie"][$index];

			if(($index+1)%3!=0)
			{
				echo "<img src=\"$min\" alt=\"zdjecie\"/><input type=\"radio\" name=\"usun\" value=\"$nazwa_min\"/>";
			}
			else
			{
				echo "<img src=\"$min\" alt=\"zdjecie\"/><input type=\"radio\" name=\"usun\" value=\"$nazwa_min\"/><br>";
			}		
		}

		$index++;
	}
	echo "<br>";
	echo "<input type=\"submit\" id=\"wysrodkuj\" value=\"Usun zaznaczone\">";
	echo "</form>";
	echo "</div>";

}

else if(!isset($_SESSION["id"]))
{
	echo "Jestes niezalogowany, wiec nie mozesz zobaczyc nowej dynamicznej galerii";
	echo "<button type=\"button\"><a href=\"logowanie.html\">Zaloguj sie</a></button>";
}
else
{
	echo "Zaden checkbox nie zostal zaznaczony, wiec nie mozna utworzyc galerii";
	echo "<button type=\"button\"><a href=\"galeria.php\">Zaznacz checkboxy i wroc :)</a></button>";
}
echo "<a href=\"galeria.php\">Powrot na strone galerii</a>";
?>