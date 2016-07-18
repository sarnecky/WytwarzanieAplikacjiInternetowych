<?php 
session_start();
$index=0 ;
$old=0;
$i=0;
if(isset($_SESSION["id"]))
{
	while($old<=$_SESSION["index"])
	{
		$tab[$old]=$_SESSION["zdjecie"][$old];
		$old++;
	}
	$dir = opendir("images/Miniatury");
	while(false !== ($file = readdir($dir)))
	{
		if($file != '.' && $file != '..')
    	{
	    		if((isset($_POST['tab'][$index])))
	    		{
					$_SESSION["zdjecie"][$index]=$_POST['tab'][$index];
					$_SESSION["index"]=$index;
					$index++; 	    			
	    		}
    	}
	} 
	$i=0;
	while($i<=$old)
	{
		
		$_SESSION["zdjecie"][$index]=$tab[$i];
		$_SESSION["index"]=$index;
		$index++;
		$i++;
	}
	header("Location: galeria.php");
}
else
{
	echo "Jestes niezalogowany, wiec nie mozesz zapamietac nowej galerii";
	echo "<button type=\"button\"><a href=\"logowanie.html\">Zaloguj sie</a></button>";
}
?>
