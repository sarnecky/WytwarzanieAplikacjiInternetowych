<?php 
session_start();
$index=0 ;

if((isset($_SESSION["zdjecie"])) && (isset($_SESSION["id"])))
{

	while($index !=$_SESSION["index"]+1)
	{
			if(isset($_SESSION["zdjecie"][$index]))
			{
				$nazwa_min = $_SESSION["zdjecie"][$index];
				if(isset($_POST['usun']))
				{
					if($_POST['usun'] == $_SESSION["zdjecie"][$index])
					{
						unset($_SESSION["zdjecie"][$index]);						
					}

				}
			}
				$index++;
	}
	header("Location: dynamiczna_galeria.php");
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
?>