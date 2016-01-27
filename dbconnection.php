<?php
   $dbconn=mysql_connect("localhost","ourstemc_stem","stem@123");
   if($dbconn)
   {
   	mysql_select_db('ourstemc_stem');
   }
   else
   {
   	echo "Database not connected";
   }
?>