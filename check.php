<?php $time = strtotime('10/16/2003');

$newformat = date('Y-m-d',$time);

//echo $newformat;
?>

<br>
<?php
$Date = "2010-09-17";
//echo date('Y-m-d', strtotime($Date. ' - 25 days'));
//echo date('Y-m-d', strtotime($Date. ' + 2 days'));
?>

<?php
$time =  date("Y-m-d");
echo $time;

echo date('Y-m-d', strtotime($time. ' - 356 days'));





//select * from ndb_doc where CAST(`testdate` as datetime) between '2013/4/4' and '2014/11/30' ORDER BY `reffull` ASC 

?>
