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
		.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Pasiekiamumo statusas : </h1>
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
	<h2>Keisti pasiekiamumo statusą : </h2><br>
	
		
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
	if (isset($_POST['stat'])){
  	echo " <b> Esu Pasiekiamas </b> <br> ";
		$sql= $sql."UPDATE User SET statusas = '1' WHERE id='".$_SESSION["id"]."'"; $dbc->query($sql); 
		$_SESSION["statusas"] = 1;
   
	}
		else {
			echo " <b> Esu Nepasiekiamas </b> <br> ";
			$sql= $sql."UPDATE User SET statusas = '0' WHERE id='".$_SESSION["id"]."'"; $dbc->query($sql); 
			$_SESSION["statusas"] = 0;
		}
		



?>
	<br>

			
		</div>
		<div>
	<form action="" method="post">
		<label for="kur">Pasiekiamumo statusas: </label>
	<label class="switch">
		
  <input name="stat" type="checkbox"  <?php if ($_SESSION["statusas"] == 1) { echo "checked='checked'"; } ?>>
		
  <span class="slider round"></span>
		
</label>
		<input type="submit" name="Redaguoti" value="Išsaugoti būseną" >
		</form>
	
		</div>
      



</body>
    </div>
    <p>

    </p>
</body>
</html>