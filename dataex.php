<?php
$row = 1;
if (($handle = fopen("chat_location_mapping.csv", "r")) !== FALSE) {
    $file = fopen("hospital.csv","w");
	fputcsv($file,explode(',',"Location ID,Area"));
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
       // echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
//		    if((strpos(strtolower($data[$c]),'hotel')!==false)|| (strpos(strtolower($data[$c]),'lodge')!==false) || (strpos(strtolower($data[$c]),'restraunt')!==false)
//	||(strpos(strtolower($data[$c]),'guest house')))
         if((strpos(strtolower($data[$c]),'hospital')!==false))
			{
			   fputcsv($file,$data);
			}	
        }
    }
	echo"Done1";
    fclose($handle);
}
?>
