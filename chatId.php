<?php
ini_set('max_execution_time', 0);
$over_yet = false;
//$loc = array();
//$dur = array();
//$times = array();
$loc = 0;
$dur = 0;
$times = 0;
$stay = 0;
$checkin = 0;
$checkout = 0;
$chatId = 0;
$fchat = fopen('C:\Users\chirag.agrawal\Desktop\chat_id.csv', "a+");
fputcsv($fchat,explode(',',"Chat ID,Duration,Location Id,Timestamp,Check-In,Check-Out,Stay"));

while($over_yet != true)
{ 
  $fptemp = fopen('C:\Users\chirag.agrawal\Desktop\hackathon_chat_data_backup_temp.csv', "a+");
  if (($handle = fopen("C:\Users\chirag.agrawal\Desktop\hackathon_chat_data_backup.csv", "r")) !== FALSE) 
  {
	// fputcsv($fptemp,explode(',',"Chat ID,Chat Message,UNIX Time Stamp,chat_location_context"));
	 if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
	 {
        $num = count($data);
		$chatId = $data[0];
	//	if(array_key_exists($chatId,$loc))
	//	{
	//	  $over_yet = true;
	//	  break;
	//	}
		$timestamp=$data[2];
		$context = explode(":",$data[3]);
		$location_id = $context[0];
		$checkin = $context[1];
		$checkout = $context[2];
        //$datetime_int = gmdate("Y-m-d\TH:i:s\Z", $timestamp + 0);
		//$datetime_int = new DateTime('@'.$timestamp);
		$dtStr = date("c", $timestamp + 0);
        $datetime_int = new DateTime($dtStr);
		$datetime_final = new DateTime($dtStr);
		while(($data_new = fgetcsv($handle, 1000, ",")) !== FALSE)
		{
		   $chatIdNew = $data_new[0];
		   if($chatIdNew != $chatId)
		   {
		     fputcsv($fptemp, $data_new);
		   }
		   else
		   {
		     //$datetime_final = gmdate("Y-m-d\TH:i:s\Z", $data_new[2]);
			 //$datetime_final  = new DateTime('@' . $data_new[2]);
			 $dtStr1 = date("c", $data_new[2] + 0);
             $datetime_final = new DateTime($dtStr1);
		   }
		}
		$loc = $location_id;
		$dur = $datetime_int->diff($datetime_final)->i;
		$times= $timestamp;
		
		//$timecheckin = strtotime($checkin);
		//$timecheckout = strtotime($checkout);
        //$datediff = $timecheckout - $timecheckin;
        //$stay = floor($datediff/(60*60*24));
		$day2 = (int)explode("/",$checkout)[0];
		$day1 = (int)explode("/",$checkin)[0];
		//echo $day2." ".$day1." ";
		$stay = $day2 - $day1;
	}
	else
	{
	  $over_yet = true;
	}
	if($over_yet != true)
	{
	 fclose($handle);
	 fclose($fptemp);
	 unlink("C:\Users\chirag.agrawal\Desktop\hackathon_chat_data_backup.csv");
     rename('C:\Users\chirag.agrawal\Desktop\hackathon_chat_data_backup_temp.csv','C:\Users\chirag.agrawal\Desktop\hackathon_chat_data_backup.csv');
	}
	else
	{
	  break;
	}
   }
   
   $finalcsv = array($chatId,$dur,$loc,$times,$checkin,$checkout,$stay);
   //print_r($finalcsv);
   fputcsv($fchat,$finalcsv);
 }

// foreach($dur as $key => $value)
// {
//   $arr = array($key,$value,$loc[$key],$times[$key],);
//   fputcsv($fchat,$arr);
// }
 fclose($fchat);
 echo "Done";
 ?>