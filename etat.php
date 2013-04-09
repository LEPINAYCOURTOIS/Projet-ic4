


<?php
include_once("hello.php");


$heure = date("H");
$minute = date("i");
$sec = date("s");
$timer=$heure+$minute+$sec; 
$_SESSION['co']=1;


$requete=mysql_query("SELECT timer FROM reseau ");

while ($row=mysql_fetch_array($requete))
{

$tps=$timer-$row['timer'];

if (abs($tps)>10)
{
$_SESSION['co']=0;
} 

}



	if ($_SESSION['co']!=0) {

	echo "connecté";

	} else {
	echo "déconnecté";

	}
?>

