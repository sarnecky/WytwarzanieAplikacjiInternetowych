<?php
session_start();
include("edycja_zdjecia.php");
$i=0;
$dl=0;
$cel = "/usr/local/apache/htdocs/images/";
$nazwa_pliku = basename($_FILES["fileToUpload"]["name"]);
$sciezka_docelowa = $cel . $nazwa_pliku ;
$uploadOk = true;
$typ_zdjecia = pathinfo($sciezka_docelowa,PATHINFO_EXTENSION);
$nazwa_pliku = $_FILES["fileToUpload"]["name"] = $_POST["tytul"] . "." . $typ_zdjecia;
$sciezka_docelowa = $cel . $nazwa_pliku ;

if(file_exists($sciezka_docelowa))
{
	echo "zdjecie o danej nazwie juz istnieje. Zmien nazwe.";
	$uploadOk = false;
}
if(isset($_POST["submit"]) && ($uploadOk)) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = true;
    } else {
        echo "Plik nie jest zdjeciem.";
        $uploadOk = false;
    }
}

if($typ_zdjecia != "png" && $typ_zdjecia !="jpg")
{
	echo "Akceptujemy tylko zdjecia typu PNG i JPG "."format ". $typ_zdjecia . " jest zabroniony. ";
	$uploadOk = false;
}
if($_FILES["fileToUpload"]["size"] > 1000000 )
{
	echo "Rozmiar zdjęcia przekracza 1MB, zmniejsz je !!.";
	$uploadOk = false;
}

if(!$uploadOk)
{
	echo "Niestety nie udalo sie zaladowac pliku";
	echo "<br>";
	echo "<a href=\"galeria.php\">Powrot na strone galerii</a>";
	$uploadOk = false;
}
else
{
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $sciezka_docelowa))
	{
		echo "Zdjecie ". $nazwa_pliku . " wyslane na serwer prawidlowo.";

		znak_wodny($sciezka_docelowa, $_POST["tytul"], $typ_zdjecia, $_POST["znak_wodny"], $cel);
		zmiana_rozmiaru($sciezka_docelowa, $_POST["tytul"], $typ_zdjecia, $cel);

			$xml_zdj=simplexml_load_file("zdjecia.xml") or die("Error: Cannot create object");

			foreach($xml_zdj->children() as $zdj) $i++;
			$myxml = fopen("zdjecia.xml", "r+") or die("Unable to open file!");
			while(!feof($myxml))
			{
		  		$dl+=strlen(fgets($myxml));
			}
			fseek($myxml, $dl-12);
			$i++;

			if(isset($_SESSION["nazwa"]))
			{
				if(isset($_POST['prywatne']))
				{
					fwrite($myxml, "<zdj publiczne=\"Nie\">" . "\r\n");
				}
				else
				{
					fwrite($myxml, "<zdj publiczne=\"Tak\">" . "\r\n");
				}
				fwrite($myxml, "<id_zdj>" . $i. "</id_zdj>" . "\r\n");
				fwrite($myxml, "<uzytkownik>" . $_SESSION["id"] . "</uzytkownik>" . "\r\n");
			}
			else
			{
			fwrite($myxml, "<zdj publiczne=\"Tak\">" . "\r\n");
			fwrite($myxml, "<id_zdj>" . $i. "</id_zdj>" . "\r\n");	
			}
			fwrite($myxml, "<tytul>" . $_POST["tytul"] . "</tytul>" . "\r\n");
			fwrite($myxml, "<plik>" . $nazwa_pliku . "</plik>" . "\r\n");
			fwrite($myxml, "</zdj>" . "\r\n");
			fwrite($myxml, "</zdjecia>" . "\r\n");
			fclose($myxml);
			echo "<a href=\"galeria.php\">Powrot na strone galerii</a>";
	}
	else
	{
		echo "Niestety, zdjęcie nie zostało wysłane, spróbuj jeszcze raz.";
		echo "<a href=\"galeria.php\">Powrot na strone galerii</a>";
	}
}
?>