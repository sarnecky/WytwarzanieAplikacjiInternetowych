<?php
session_start();
$dl=0;
$xml=simplexml_load_file("uzytkownicy.xml") or die("Error: Cannot create object");

function sprawdz($xml)
{
	foreach($xml->children() as $uzytkownik)
	{ 
		if($uzytkownik->nazwa == $_POST["nazwa"])
		{
			if($uzytkownik->haslo == md5($_POST["haslo"]))
			{
				$id = $uzytkownik->id;
				$istnieje = 1;
				return array($id, $istnieje);	
				break;			
			}
		}
	}
	return false;
}

$tab = sprawdz($xml);
if($tab[1]==1)
{
	$_SESSION["id"] = (string)$tab[0];	
	$_SESSION["nazwa"] = $_POST["nazwa"];
	echo "Witaj ". $_SESSION["nazwa"];
	echo "<br>";
	echo "<a href=\"galeria.php\">Powrot na strone galerii</a>";
}
else
{
	echo "Bledna nazwa lub haslo. Sprobuj ponownie.";
	echo "<a href=\"galeria.php\">Powrot na strone galerii</a>";
}
?>