<?php
   $file = fopen('public\List_of_student.txt', 'r');

   while(!feof($file)) {
     $line = fgets($file);
     echo $line . "<br>";
   }
?>