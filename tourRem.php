<?php
include 'themvars.php';

$toRem=array_keys($_POST);

/*foreach ($toRem as $value)
{
	var_dump($value);
	echo'<br/>
	';
}*/
foreach ($toRem as $value)
{
	$value=str_ireplace("_"," ",$value);
	remTournament($value);//dcfe700ace79a58e7b71975b3b97d58e
}

//remTournament($_POST['tName']);

header( 'Location: compedit.php' ) ;
?>