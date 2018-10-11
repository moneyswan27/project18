<?php
   $filename = $_GET['filename'];
   
   header("content-disposition: attachment; filename = " . $filename);
   
   $fp = fopen("../data/".$filename, "r");
   fpassthru($fp);
   fclose($fp);
?>