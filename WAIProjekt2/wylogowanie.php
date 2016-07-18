<?php
session_start();
session_destroy();
echo "Wylogowano";
echo "<br>";
echo "<a href=\"galeria.php\">Powrot na strone galerii</a>";
?>