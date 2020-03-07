<?php
// Initialize the session
session_start();

if($_SESSION["type"]!=1)
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
        <h1>Sveiki, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Prisijungėte į Administratoriaus posistemę</h1>
		<br>
		<br>
		<br>
		<div1 align=right>
			<a href="admin/konsultanto_registracija.php" class="btn btn-danger">Konsultanto registravimas</a>
			<a href="admin/konsultanto_salinimas.php" class="btn btn-danger">Konsultanto šalinimas</a>
			<a href="admin/kreditai.php" class="btn btn-danger">Kreditų suteikimas / atėmimas</a>
			<a href="admin/DUK.php" class="btn btn-danger">DUK keitimas</a>
			<a href="admin/Video.php" class="btn btn-danger">VIDEO įrašų keitimas</a>
			<a href="logout.php" class="btn btn-danger">Atsijungti</a>
		</div1>
    </div>
    <p>
        <a href="logout.php" class="btn btn-danger">Atsijungti</a>
    </p>
</body>
</html>