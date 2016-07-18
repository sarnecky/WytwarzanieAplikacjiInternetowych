<?php
$i=0;
$dl=0;
function sprawdz($xml)
{
	foreach($xml->children() as $uzytkownik)
	{ 
		if($uzytkownik->nazwa == $_POST["nazwa"])
			return false;
	}
	return true;
}
$xml=simplexml_load_file("uzytkownicy.xml") or die("Error: Cannot create object");
if(sprawdz($xml))
{
	foreach($xml->children() as $uzytkownik) $i++;
	$myxml = fopen("uzytkownicy.xml", "r+") or die("Unable to open file!");
	while(!feof($myxml))
	{
  		$dl+=strlen(fgets($myxml));
	}
	fseek($myxml, $dl-16);
	$i++;
	fwrite($myxml, "<uzytkownik>" . "\r\n");
	fwrite($myxml, "<id>" . $i. "</id>" . "\r\n");	
	fwrite($myxml, "<nazwa>" . $_POST["nazwa"] . "</nazwa>" . "\r\n");
	fwrite($myxml, "<haslo>" . md5($_POST["haslo"]) . "</haslo>" . "\r\n");
	fwrite($myxml, "</uzytkownik>" . "\r\n");
	fwrite($myxml, "</uzytkownicy>" . "\r\n");
	fclose($myxml);
	echo "Witamy " . $_POST["nazwa"] .". Jestes nowym uzytkownikiem !" ;

}
else
{
	echo "uzytkownik o podanej nazwie juz istnieje. Wprowadz inna nazwe.";
}
echo "<a href=\"galeria.php\">Powrot na strone galerii</a>";
?>