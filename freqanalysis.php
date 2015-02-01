<?php
include 'include.php';
$words = array();
$score = array();
$total_score=0;
$row = 0;
if (($handle = fopen("hackathon_chat_data.csv", "r")) !== FALSE) 
{
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE && $row<20000) 
 {
    $num = count($data);
	$chat = $data[1];
	$chat_words = explode(" ",$chat);
	$chat_words_cnt = count($chat_words);
	$i = 0;
	while($i<$chat_words_cnt)
	{
	  if(check($words))  
		if(array_key_exists($chat_words[$i],$words))
			$words[$chat_words[$i]]++;
		else
			$words[$chat_words[$i]] = 1;
      $i++;		
	}
	$row++;
 }
 asort($words);
 //print_r($words);
 echo '<pre>'; 
 print_r($words); 
 echo '</pre>';
}
?>