<?php
include 'include.php';
$count = 0;
if (($handle = fopen("hotel.csv", "r")) !== FALSE) 
{
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
 {
 	$num = count($data);
 	for ($c=1; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
            $count++;
        }
        //echo $count;
  }
  echo $count;
  fclose($handle);
}
?>