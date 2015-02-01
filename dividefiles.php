<?php
include 'include.php';
$rowcount=0;
if (($handle = fopen("citystruct.csv", "r")) !== FALSE) 
{
	//$file = fopen("citystruct.csv","w");
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
 {
 	/*$rowcount++;
 	//if($rowcount>39015)
 	//{
 	$num = count($data);
	$loc=$data[1];
	$id=$data[0];
 	$loc_words = explode(",",$loc);
 	$loc_words_count=count($loc_words);
 		if($loc_words_count>=3)
 		{
 			$city=$loc_words[$loc_words_count-3];
 			echo '<pre>'; 
 			echo $id;
  			echo $city; 
 			$array1=array($id,$city);
 			echo '</pre>'; 
 			//fputcsv($file,$array1);	
 		}
    }*/
    $rowcount++;
    if($rowcount<100){
    $city=$data[1];
    $id=$data[0];
    $file= fopen("location/$id.txt","w");
    fwrite($file,$city);
    fclose($file);
}


 }
 echo "done!";
 //echo $rowcount-39015;
  fclose($handle);
}
?>