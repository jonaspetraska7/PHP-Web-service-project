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
        <h1>DUK redagavimas</h1>
		<br>
		<br>
		<br>
		<div1 align=right>
			<a href="/it/admin/konsultanto_registracija.php" class="btn btn-danger">Konsultanto registravimas</a>
			<a href="/it/admin/konsultanto_salinimas.php" class="btn btn-danger">Konsultanto šalinimas</a>
			<a href="/it/admin/kreditai.php" class="btn btn-danger">Kreditų suteikimas / atėmimas</a>
			<a href="/it/admin/DUK.php" class="btn btn-danger">DUK redagavimas</a>
			<a href="/it/admin/Video.php" class="btn btn-danger">VIDEO įrašų keitimas</a>
			<a href="/it/logout.php" class="btn btn-danger">Atsijungti</a>
		</div1>
		
		<br>
		<br>
		
	<body>
	<div style="border-style: hidden;
				border-bottom: 8px solid red;
				background-color:rgba(0, 0, 0, 0.5);
				margin: 25px 260px 100px;
				color: white;
				font-weight: bold;">
	<br>
		<br>
	<h2>Redaguoti DUK : </h2><br>
	
		
<div>

			<?php

// configuration
$url = 'DUK.php';
$file = 'files/duk.txt';


	
	
// check if form has been submitted
if (isset($_POST['text']))
{
	echo " <b> Redagavimas Išsaugotas ! </b> ";
    // save the text contents
    file_put_contents($file, $_POST['text']);
	
	//$status = "Atlikta";
    // redirect to form again
	//echo "Redagavimas atliktas !";
    //header(sprintf('Location: %s', $url));
    printf('<a href="%s">  Peržiūrėti Pakeitimus DUK puslapyje  </a>.', 'http://localhost/it/about.php' );
	
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
		</div>
		<div>
<!-- HTML form -->
<form action="" method="post">
<textarea name="text" cols="70" rows="20"><?php echo htmlspecialchars($text);?></textarea><br>
	<input type="submit" name="Redaguoti" value="Redaguoti" >

</form>
	

	
	
	<script>
function my_button_click_handler()
{
	echo "Button clieck";
}
</script>
	
		</div>
      



</body>
    </div>
    <p>
        <a href="/it/logout.php" class="btn btn-danger">Atsijungti</a>
    </p>
</body>
</html>