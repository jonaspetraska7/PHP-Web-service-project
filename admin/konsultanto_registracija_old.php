<?php
// Initialize the session
session_start();
 
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
		input{  color: black}
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Konsultanto registravimas</h1>
		<br>
		<br>
		<br>
		<div1 align=right>
			<a href="/it/admin/konsultanto_registracija.php" class="btn btn-danger">Konsultanto registravimas</a>
			<a href="/it/admin/konsultanto_salinimas.php" class="btn btn-danger">Konsultanto šalinimas</a>
			<a href="/it/admin/kreditai.php" class="btn btn-danger">Kreditų suteikimas / atėmimas</a>
			<a href="/it/admin/DUK.php" class="btn btn-danger">DUK keitimas</a>
			<a href="/it/admin/Video.php" class="btn btn-danger">VIDEO įrašų keitimas</a>
			<a href="logout.php" class="btn btn-danger">Atsijungti</a>
		</div1>
		<body>
	<div style="border-style: hidden;
				border-bottom: 8px solid red;
				background-color:rgba(0, 0, 0, 0.5);
				margin: 25px 260px 100px;
				color: white;
				font-weight: bold;">
		<br>
		<br>
		
	<?php
		
		//header("Content-Type: application/json; charset=UTF-8");
		header('Access-Control-Allow-Origin: *'); 
		
if( isset($_GET['submit']) )
{
    //be sure to validate and clean your variables
    $val1 = htmlentities($_GET['val1']);
    $val2 = htmlentities($_GET['val2']);

    //then you can use them in a PHP function. 
    if (empty($val1) || empty($val2)) echo "Klaida įvedant duomenis, pabandykite dar kartą";
	else {
		$server = "localhost";
	$user = "stud";
	$password = "stud";
	$db= "it";
		$dbc=new mysqli($server,$user,$password,$db);
		if($dbc->connect_error){
			die ("Negaliu prisijungti prie MySQL:"	.$dbc->connect_error);}
			$sql = ("SET CHARACTER SET utf8 "); $dbc->query($sql);
		//header("Content-Type: application/json; charset=UTF-8");
		
		$sql= $sql."SELECT * FROM User ";
		$result =  $dbc->query($sql);
		echo $result;
		if ($result !== FALSE) {
    $outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
}

	}
}
?>
		
		<br>
		<br>


		
		
	<h2>Registracijos forma </h2><br>
	 Užpildykite formos laukus Vardas : <b>Konsultanto prisijungimo vardas</b> bei Slaptažodis : <b>Konsultanto prisijungimo slaptažodis</b> <br><br>
<form action="" method="get">
    Vardas: 
    <input type="text" name="val1" id="val1">


    <br>
    Slaptazodis:
    <input type="text" name="val2" id="val2">

    <br>

    <input type="submit" name="submit" value="send">
</form>
		
		
		
		
		
	<br><b>Siunčiama užklausa į http://localhost/json/api.php:</b><br><p id="uzklausa"></p>
	<b>Atsakymas JSON formate:</b><br><p id="jsonats"></p>
	<b>Rasti tokie pasiūlymai:</b><br><p id="lentele"></p>
		
		</div>

</body>
    </div>
    <p>
        <a href="logout.php" class="btn btn-danger">Atsijungti</a>
    </p>
</body>
</html>