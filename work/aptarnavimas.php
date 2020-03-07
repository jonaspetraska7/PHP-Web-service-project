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
        <h1>Klientų aptarnavimas </h1>
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
	<h2>Atsakyti i klausimus :  </h2><br>
		<p>(Eilės tvarka nuo paskutinio)</p>
	
		
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

$sql=""; ?>
	
	
	
	

		
		<center></center>
	<br>
	<br>
	<table style="margin: 0px auto;" id="zinutes">
		<tr>
			<th>Klientas</th>
			<th>Klausimas</th>
		</tr>
	<?php
$dbc=mysqli_connect('localhost','stud', 'stud','it');
if(!$dbc){die ("Negaliu prisijungti prie MySQL:" .mysqli_error($dbc)); }
		
		
		$sql = "SELECT MAX(id) AS PPP FROM Zinute WHERE fk_gavejas = '".$_SESSION["id"]."' AND atsakyta = '0'";
    $result = mysqli_query($dbc, $sql);  
while($row = mysqli_fetch_assoc($result))
 {
      $lastid=$row['PPP'];
		//echo $lastid; 
}
		
		
		
$sql = "SELECT * FROM Zinute WHERE fk_gavejas = '".$_SESSION["id"]."' AND atsakyta = '0'";
    $result = mysqli_query($dbc, $sql);  
while($row = mysqli_fetch_assoc($result))
 {
      echo "<tr><td>".$row['fk_siuntejas']."</td><td>".$row['tekstas']."</td></tr>";  }  
?>
	</table>
	<br>
	<br>
	
	<?php
$dbc=mysqli_connect('localhost','stud', 'stud','it');
if(!$dbc){
die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($dbc));
}
if($_POST !=null){
	$id = $_SESSION["id"];
	$kam = $_POST['kam'];
	$zinute = $_POST['zinute'];
	
	$sql = "UPDATE Zinute SET atsakymas = '".$zinute."', atsakyta = '1' WHERE fk_siuntejas = '".$kam."' AND atsakyta = '0' AND id = '".$lastid."'  ";
    if (mysqli_query($dbc, $sql)) 
	{	echo "Atsakymas užregistruotas";
		header("location: aptarnavimas.php");
	}
	else{ die ("Klaida įrašant:" .mysqli_error($dbc));
	}
	}
?>

	<div class="container">
  <form method='post'>
      <div class="form-group col-lg-4">
          <label for="kam" class="control-label">Kam skirta:</label>
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