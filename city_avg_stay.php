<?php
include 'include.php';
$rowcount=0;
//$hashmap = array();
//$count = array();
$loc_id=0;
$days=0;
$row = 0;
$cities=array();
$counter=array();
if (($handle = fopen("chat_id.csv", "r")) !== FALSE) 
{
	//$file = fopen("citystruct.csv","w");
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
 {
 	//if(isset(var))
 	//if(count($data)>=3)
 	echo $row." ";
 	print_r($data);
 	echo " ";
 	$row++;
    $loc_id = $data[2];
    echo $loc_id." ";
	//if(count($data)>=7)
	$days = $data[6];
	
    if($days<0)
    	$days=$days+30;
    //if($loc_id!=NULL)
    echo $days." ";
    $filename = '/home/zeeshan/location/$loc_id.txt';
    //if (file_exists($filename))
    {
     echo "inside if <br>";	
     $file = fopen("location/$loc_id.txt","r");
     $city = fgets($file);
    //$hashmap[$city]+=$days;
    /*foreach($hashmap as $id=>$value)
    {

    }*/
    /*echo '<pre>'; 
    print_r($hashmap);
    echo '</pre>'; 
    */
    //echo $city;

    if (array_key_exists($city, $cities)) 
    {
    	//echo "there";
    	$counter[$city]++;
    	$cities[$city]=$cities[$city]+$days;

    }
	else
	{
    	$cities[$city]=$days;
    	$counter[$city]=1;
    
	}
     echo $city.$days;
        echo "<br>";


    }
 }
 	$file = fopen("avgstays.csv","a+");
 	foreach($cities as $x=>$x_value)
  	{
  		$x_value=$x_value/$counter[$x];
  		 echo "City=" . $x . ", stays=" . $x_value;
         echo "<br>";
     	$cities1=array($x,$x_value);
 		//echo '</pre>'; 
 		fputcsv($file,$cities1);
  	}
fclose($file);
echo "counter";
echo "<br>";

$file = fopen("msgspercity.csv","a+");
foreach($counter as $x=>$x_value)
  {
  	 echo "City=" . $x . ", msgs=" . $x_value;
  echo "<br>";
  	$cities2=array($x,$x_value);
 	//	echo '</pre>'; 
 		fputcsv($file,$cities2);
  }
  fclose($handle);
}
?>