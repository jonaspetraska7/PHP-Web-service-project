<?php
// Initialize the session
session_start();

if($_SESSION["type"]!=2)
{
	header("location: negalima.php");
	exit;
}
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
		input,textarea{  color: black}
		th {
 				 background-color: #4CAF50;
  					color: white;
			}
			td:hover {background-color: lightblue;} 
			
			th, td {
  				padding: 15px;
  				text-align: left;
				background-color: green;
			}
			table {
				margin: 0 auto;
				border: hidden;
				background-color: green;
			}
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Reitingo peržiūra </h1>
		<br>
		<br>
		<br>
		<div1 align=right>
			<a href="/it/work/asmenine_info.php" class="btn btn-info">Asmeninės informacijos redagavimas</a>
			<a href="/it/work/aptarnavimas.php" class="btn btn-info">Klientų aptarnavimas</a>
			<a href="/it/work/statusas.php" class="btn btn-info">Keisti pasiekiamumo statusą</a>
			<a href="/it/work/reitingas.php" class="btn btn-info">Reitingo peržiūra</a>

			<a href="/it/logout.php" class="btn btn-info">Atsijungti</a>
		</div1>
		
		<br>
		<br>
		
	<body>
	<div style="border-style: hidden;
				border-bottom: 8px solid blue;
				background-color:rgba(0, 0, 0, 0.5);
				margin: 25px 260px 100px;
				color: white;
				font-weight: bold;">
	<br>
		<br>
	<h2>Jūsų reitingas : </h2><br>
	
		
<div>

	<?php
	
	$server = "localhost";
$user = "stud";
$password = "stud";
$db= "it";
		$dbc=new mysqli($server,$user,$password,$db);
		if($dbc->connect_error){
			die ("Negaliu prisijungti prie MySQL:"	.$dbc->connect_error);}
$sql = ("SET CHARACTER SET utf8"); $dbc->query($sql);      // del lietuviškų raidžių

$sql="";


// configuration
		$sql= $sql."SELECT reitingas FROM User WHERE id = '".$_SESSION["id"]."' "; 
		$result =  $dbc->query($sql);
	    $outp = $result->fetch_all(MYSQLI_ASSOC);
		$reitingas = $outp[0]['reitingas'];
   
	
		



?>
			
		</div>
	
		<h2> ★★★★★ <?php echo $reitingas ?> ★★★★★ </h2><br>
		
		<div>
	
	
		</div>
      



</body>
    </div>
    <p>

    </p>
</body>
</html>