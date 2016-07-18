<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Deskorolka-moja pasja</title>
	<link rel="stylesheet" href="css.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Days+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
</head>
<body>


<?php 
if(isset($_SESSION["nazwa"]))
{
	echo "Witaj " . $_SESSION["nazwa"] . "<br/>";
	echo "<button type=\"button\"><a href=\"wylogowanie.php\">Wyloguj sie</a></button>"; 	
}
else
{
	echo "<button type=\"button\"><a href=\"logowanie.html\">Zaloguj sie</a></button>";
}

?>
	<header id="container">
			<?php include("header.php"); ?>
	</header>	

		<nav id="container1">
			<ol>
				<li class><a href="index.html">Strona Główna</a></li>
				<li><a href="galeria.php">Galeria</a></li>
				<li><a href="#">Ciekawostki</a>
				<ul>
						<li><a href="tricki.html">Tricki</a>
						<li><a href="historia.html">Historia(mobile)</a>
				</ul>
				</li>
				<li><a href="#">Formularze</a>
					<ul>
						<li><a href="formularz.html">Formularz</a>
						<li><a href="kontakt.html">Kontakt</a>
					</ul>
				</li>
			</ol>
		</nav>
<br>
<br>
		<section>
		
		<h1 id="wysrodkuj">Galeria publiczna</h1>
		<div id="id3">
		<?php 

			if(!isset($_SESSION["nazwa"]))
			{
				echo "<b>Jestes niezalogowany, przeslany plik zostanie dodany jako element publicznie dostepny w galerii</b>";	
			}
		?>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<p>
			    Wybierz zdjecie do pobrania	:<br><br>
			    <input type="text" value="tytul" name="tytul"><br><br>
			    <input type="text" value="znak wodny" name="znak_wodny"><br><br>			    
			    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
			    <?php if(isset($_SESSION["id"])) echo "Prywatne: <input type=\"checkbox\" name=\"prywatne\" value=\"tak\"><br>"; ?>
			    <input type="submit" value="Upload Image" name="submit"><br><br>
		    </p>
		</form>
		<?php 
		if(isset($_SESSION["nazwa"]))
		{
			echo "<a href=\"prywatna_galeria.php\">Prywatna galeria</a><br>";
			echo "<a href=\"dynamiczna_galeria.php\">Dynamiczna galeria</a><br>";
		}
		?>
		</div>			
		<table id="table1">
			
		<?php if(isset($_SESSION["nazwa"])) echo "<form action=\"zapamietaj_miniatury.php\" method=\"post\" enctype=\"multipart/form-data\">" ?>
			<?php require_once("tworz_galerie.php"); ?>
		<?php if(isset($_SESSION["nazwa"])) echo "<div id=\"id3\"><input type=\"submit\" id=\"wysrodkuj\" value=\"Zapamietaj wybrane\"></div>" ?>
			</form>
		</table>			

	
	
	</section>
	<footer>
		<small>Copyright &copy; 2014 Sebastian Sarnecki</small>
	</footer>
			
		
</body>
</html>