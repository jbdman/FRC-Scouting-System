<?php
include('g/phpgraphlib.php');
include 'themvars.php';
$connect=mysql_connect($server,$username,$password); 
		
mysql_select_db($database) or die( "Unable to open database");
//var_dump($_GET);
if(strlen($_GET['comp'])==0)
{
	$query="Select * from Team T ORDER BY reliability;";
}
else
{
	$query="Select * FROM `Team` T, isAt I WHERE T.teamno=I.teamno AND I.tname='".$_GET['comp']."' ORDER BY reliability;";
}
$result=mysql_query($query,$connect);
if (!$result) 
{
	die('Invalid query: ' . mysql_error());
}

$data=array();
$data2=array();

while($row = mysql_fetch_array($result))
{
	array_push($data,$row['teamno']);
	array_push($data2,$row['reliability']);
}

$data=array_combine($data,$data2);

$graph = new PHPGraphLib(942,700);
$graph->addData($data);
$graph->setGradient("242,148,34","242,131,34");
$graph->setDataValues(false);
$graph->setTitle('Team Reliability');
$graph->setTextColor("38,27,38");
$graph->setBackgroundColor("240,242,242");
$graph->createGraph();
?>