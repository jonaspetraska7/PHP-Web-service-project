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
        <h1>Sveiki, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Prisijungėte į Kliento posistemę</h1>
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
    </div>
    <p>
        <a href="logout.php" class="btn btn-success">Atsijungti</a>
    </p>
</body>
</html>