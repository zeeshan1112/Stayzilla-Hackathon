<?php
include 'include.php';
date_default_timezone_set("UTC");
$zones = array("EarlyMorning","Morning","AfterNoon","Eveninng","LateEvening","Night","PastMidNight");
$zone_dur = array("EarlyMorning"=>0,"Morning"=>0,"AfterNoon"=>0,"Eveninng"=>0,"LateEvening"=>0,"Night"=>0,"PastMidNight"=>0);
$zone_freq = array("EarlyMorning"=>0,"Morning"=>0,"AfterNoon"=>0,"Eveninng"=>0,"LateEvening"=>0,"Night"=>0,"PastMidNight"=>0);
$zone_stay = array("EarlyMorning"=>0,"Morning"=>0,"AfterNoon"=>0,"Eveninng"=>0,"LateEvening"=>0,"Night"=>0,"PastMidNight"=>0);
if (($handle = fopen('C:\Users\chirag.agrawal\Desktop\chat_id.csv', 'r')) !== FALSE) {
    $file = fopen('C:\Users\chirag.agrawal\Desktop\timestamp-rel.csv','a+');
	$detail = fopen('C:\Users\chirag.agrawal\Desktop\timestamp-details.csv','a+');
	fputcsv($file,explode(',',"Zone,Duration,Frequency,Stay"));
	fputcsv($detail,explode(',',"Zone,Duration,Stay"));
	fgetcsv($handle, 1000, ",");
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
		if($data[3]!='')
		{
		 $zonetag = det_zone($data[3]);
		 if($data[1]!='')
			$zone_dur[$zonetag] += (int)$data[1];
		 $zone_freq[$zonetag]++;
		 if($data[6] < 0)
			$data[6] += 30;
		 $zone_stay[$zonetag] += (int)$data[6];
		 $detailcsv = array($zonetag,$data[1],$data[6]);
		 fputcsv($detail,$detailcsv);
		} 
	}
	for($i=0;$i<count($zones);$i++)
	{
	  $cur_zone = $zones[$i];
	  if($zone_freq[$cur_zone]!=0)
	    $finalcsv = array($cur_zone,$zone_dur[$cur_zone]/$zone_freq[$cur_zone],$zone_freq[$cur_zone],$zone_stay[$cur_zone]/$zone_freq[$cur_zone]);
	  else
	    $finalcsv = array($cur_zone,0,$zone_freq[$cur_zone],0);
	  fputcsv($file,$finalcsv);
	}
	fclose($file);
	fclose($detail);
}	
		
?>