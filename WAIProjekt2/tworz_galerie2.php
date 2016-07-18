<?php
function jezeli($file, $index)
{
    
        $nazwa_min = "miniaturka_" . $file;
        $nazwa_z_w = "znak_wodny_" . $file;
        $z_w="images/zdjecia_znak_wodny/$nazwa_z_w";
        $min="images/Miniatury/$nazwa_min";
        
            if(($index)%3==0) echo "<tr>";
            echo "<td><a target=\"_blank\" href=\"$z_w\"><img src=\"$min\" alt=\"zdjecie\"/><input type=\"checkbox\" name=\"tab[]\" value=\"$nazwa_min\"/></a></td>";
            if(($index+1)%3==0) echo "</tr>";
    
}


?>