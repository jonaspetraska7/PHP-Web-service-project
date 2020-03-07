<?php
// Initialize the session
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
		tr {
			 width: 200px;
		}
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
        <h1>Kreditų pildymas </h1>
		<br>
		<br>
		<br>
		<div1 align=right>
			<a href="/it/client/asmenine_info.php" class="btn btn-success">Asmeninės informacijos redagavimas</a>
			<a href="/it/client/konsultacija.php" class="btn btn-success">Konsultacija</a>
			<a href="/it/client/pildymas.php" class="btn btn-success">Papildyti kreditus</a>
			<a href="/it/client/reitingas.php" class="btn btn-success">Suteikti reitingą konsultatui</a>
			<a href="/it/logout.php" class="btn btn-success">Atsijungti</a>
		</div1>
		
		<br>
		<br>
		
	<body>
	<div style="border-style: hidden;
				border-bottom: 8px solid green;
				background-color:rgba(0, 0, 0, 0.5);
				margin: 25px 260px 100px;
				color: white;
				font-weight: bold;">
	<br>
		<br>
	<h2>Jei pritrūkote kreditų Siųskite SMS trumpuoju numeriu 1337 su tekstu 10, 50 arba 100 ir pasipildykite savo kreditus ! </h2><br>
		<p>(Žinutės kaina 1, 2 arba 5 eurai)   </p>
	
		
<div>
	
	
	  
	  
		<div>
	
	
		</div>
      



</body>
    </div>
    <p>

    </p>
</body>
</html>