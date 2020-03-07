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
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
		div1{  }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Sveiki, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Prisijungėte į Konsultanto posistemę</h1>
		<br>
		<br>
		<br>
		<div1 align=right>
			<a href="work/asmenine_info.php" class="btn btn-info">Asmeninės informacijos redagavimas</a>
			<a href="work/aptarnavimas.php" class="btn btn-info">Klientų aptarnavimas</a>
			<a href="work/statusas.php" class="btn btn-info">Keisti pasiekiamumo statusą</a>
			<a href="work/reitingas.php" class="btn btn-info">Reitingo peržiūra</a>

			<a href="logout.php" class="btn btn-info">Atsijungti</a>
		</div1>
    </div>
    <p>
        <a href="logout.php" class="btn btn-info">Atsijungti</a>
    </p>
</body>
</html>