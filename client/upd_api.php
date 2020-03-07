<?php
// apipvz.php: paima iš lenteles "zinutes" paskutinius n ('kiek') į nurodytą miestą ('kur') įrašus 
// Jei kur nenurodyta =visi miestai, jei kiek nenurodyta=visi įrašai
//
session_start();

if($_SESSION["type"]!=3)
{
	header("location: negalima.php");
	exit;
}
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *'); 

//$miestas="Ryga";$kiek="3";// autonominiam testavimui
$kur=$_GET['kur']; 
$kiek=$_GET['kiek'];
$dar=$_GET['dar'];


$server = "localhost";
$user = "stud";
$password = "stud";
$db= "it";
		$dbc=new mysqli($server,$user,$password,$db);
		if($dbc->connect_error){
			die ("Negaliu prisijungti prie MySQL:"	.$dbc->connect_error);}
$sql = ("SET CHARACTER SET utf8"); $dbc->query($sql);      // del lietuviškų raidžių

$sql="";
$sql= $sql."UPDATE User SET vardas = '".$kur."', pavarde = '".$kiek."', amzius = '".$dar."' WHERE id = '".$_SESSION["id"]."' "; $dbc->query($sql); 

// suformuojam sql užklausą pagal parametrus $miestas ir paskutinius $kiek
//if (!empty($kiek))$sql="SELECT * FROM ( ";
//else $sql="";
$sql="";
$sql= $sql."SELECT * FROM User WHERE id = '".$_SESSION["id"]."'";
//if (!empty($miestas))$sql=$sql." WHERE id='".$miestas."'";
//if (!empty($kiek))$sql=$sql." ORDER BY id DESC LIMIT ".$kiek.") sub ORDER BY id ASC";
//echo $sql; die;     //autonominiam testavimui kaip atrodo sql užklausa
$result =  $dbc->query($sql);
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);

?>