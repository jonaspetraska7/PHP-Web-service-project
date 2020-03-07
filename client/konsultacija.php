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
		h3{
			color : red;
			background-color: white;
		}
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Konsultacija </h1>
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
		
		
		
		
	<h2>Gauti atsakymai į Klausimus :  </h2><br>
	
		
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
	
	
	$sql = "SELECT * FROM User WHERE id = '".$_SESSION["id"]."' ";
    $result = mysqli_query($dbc, $sql);  
while($row = mysqli_fetch_assoc($result))
 {
      //echo "<tr><td>".$row['kreditai']."</td></tr>";
	$Kreditai = $row['kreditai'];
}?>
	
	
	
	

		
		<center></center>
	<br>
	<br>
	<table style="margin: 0px auto;" id="zinutes">
		<tr>
			<th>Klausimas</th>
			<th>Atsakymas</th>
		</tr>
	<?php
$dbc=mysqli_connect('localhost','stud', 'stud','it');
if(!$dbc){die ("Negaliu prisijungti prie MySQL:" .mysqli_error($dbc)); }
		$sql= "SELECT * FROM Zinute WHERE fk_siuntejas = '".$_SESSION["id"]."'  ";

$result = mysqli_query($dbc, $sql);  
while($row = mysqli_fetch_assoc($result))
 {
      echo "<tr><td>".$row['tekstas']."</td><td>".$row['atsakymas']."</td></tr>";  } 
?>
	</table>
	<br>
	
	<h2>Prisijungę konsultantai :  </h2><br>
	
	<table style="margin: 0px auto;" id="zinutes">
		<tr>
			<th>Konsultantas</th>
		</tr>
	<?php
$dbc=mysqli_connect('localhost','stud', 'stud','it');
if(!$dbc){die ("Negaliu prisijungti prie MySQL:" .mysqli_error($dbc)); }
$sql = "SELECT * FROM User WHERE type = '2' AND statusas = '1' ";
    $result = mysqli_query($dbc, $sql);  
while($row = mysqli_fetch_assoc($result))
 {
      echo "<tr><td>".$row['id']."</td></tr>";  }  
?>
	</table>
	
	
	
	
	
	<br>
	<br>
	
	<?php
$dbc=mysqli_connect('localhost','stud', 'stud','it');
if(!$dbc){
die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($dbc));
}

	
    if ($Kreditai > 0) 
	{	
		
	
	
	
	
if($_POST !=null){
	$id = $_SESSION["id"];
	$kam = $_POST['kam'];
	$zinute = $_POST['zinute'];
	$sql = "INSERT INTO Zinute (fk_siuntejas, fk_gavejas, tekstas, atsakyta) VALUES ('$id', '$kam', '$zinute', '0')";
    if (mysqli_query($dbc, $sql)) 
	{	
		$Kreditai = $Kreditai - 1;
		$sql = "UPDATE User SET kreditai = '".$Kreditai."' WHERE id = '".$_SESSION["id"]."' ";
		if (mysqli_query($dbc, $sql)) 
		{
			
		}
		header("location: konsultacija.php");
	}
	else{ die ("Klaida įrašant:" .mysqli_error($dbc));
	}
	}
		
		
		
	}
	else
	{
		echo "<h3><br> Jūsų kreditų kiekis nepakankamas  
							 <br> !</h3><h3> </h3>";
	}
?>
	<h2>Jūsų kreditų likutis :  </h2>
	<p> 1 kreditas - 1 klausimas </p>
	
	<table style="margin: 0px auto;" id="zinutes">
		<tr>
			<th>Kreditai</th>
		</tr>
	<?php
$dbc=mysqli_connect('localhost','stud', 'stud','it');
if(!$dbc){die ("Negaliu prisijungti prie MySQL:" .mysqli_error($dbc)); }
	
  $sql = "SELECT * FROM User WHERE id = '".$_SESSION["id"]."' ";
    $result = mysqli_query($dbc, $sql);  
while($row = mysqli_fetch_assoc($result))
 {
      echo "<tr><td>".$row['kreditai']."</td></tr>";
	$Kreditai = $row['kreditai'];
}
?>
	
	
	</table>
	
	<h2>Užduoti klausimą :  </h2><br>

	<div class="container">
  <form method='post'>
      <div class="form-group col-lg-4">
          <label for="kam" class="control-label">Kam skirta (įrašykite konsultanto numerį):</label>
          <input name='kam' type='text' class="form-control input-sm">
      </div>
      <div class="form-group col-lg-12">
          <label for="zinute" class="control-label">Žinutė:</label>
          <textarea name='zinute' class="form-control input-sm"></textarea>
      </div>
      <div class="form-group col-lg-2">
         <input type='submit' name='ok' value='siųsti' class="btnbtn-default">
      </div>
	  
  </form>
</div>
	  
	  
		<div>
	
	
		</div>
      



</body>
    </div>
    <p>

    </p>
</body>
</html>