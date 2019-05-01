<?php 
$zip = $_GET["zip"];
$file = fopen('zip_codes.csv', 'r');
$mapping = array();
$district = "(Enter Region Manually)";
while ($line = fgetcsv($file))
{
if ($line[0] == $zip) 
 {
  $district=$line[2]; 
  break;
 }
}
fclose($file);
print($district)
?>