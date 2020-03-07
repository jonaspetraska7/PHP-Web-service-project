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
		input{  color: black}
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
        <h1>Kreditų valdymas</h1>
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
	<h2>Vartotojų kreditų kiekio redagavimas</h2><br>
	 Užpildykite formos laukus ID : <b>Vartotojo ID</b> bei Kreditų kiekis : <b>nustatomas kreditų kiekis vartotojui</b> <br><br>
<div class="form">
      <label for="kur">ID: </label><input type="text" id="kur" class="kur">
	  <label for="kiek">Kreditų kiekis: </label><input type="text" id="kiek" class="kiek">
      <input type="submit" value="Vykdyti" class="spausk">
</div>
		<br>
		<div class="form">
	  <input type="submit" value="Konsultantų lentelė" class="spausk2">
</div>
	<br><b></b><br><p id="uzklausa"></p>
	<b> </b><br><p id="jsonats"></p>
	<b> </b><br><p id="lentele"></p>

<script>
const lspausk = document.querySelector('.spausk');    //mygtukas Vykdyti
const lkur = document.querySelector('.kur');          // formos laukai
const lkiek = document.querySelector('.kiek');
lkur.value=''; lkiek.value='';						  // kas juose įrašyta
lkur.focus();
lspausk.addEventListener('click', ieskok);            //paspaude Vykdyti
	
	lkur.focus(); 
	const lspausk2 = document.querySelector('.spausk2');//mygtukas Vykdyti
	lspausk2.addEventListener('click', rodyk);//paspaude Vykdyti
	
	function rodyk() {
	let url = "http://localhost/it/admin/lentele_api.php";
	let ats,string_ats,x,txt;
	//url+="/?kur="+kur;                      			// prijungiam GET užklausai parametrus ?kur=abc&kiek=123
	document.getElementById("uzklausa").innerHTML="<br>";		// parodom kokia užklausa siunčiama

  fetch(url)
	  .then(response => {
    return response.json()
  })
  .then(data => {
    string_ats=JSON.stringify(data);							// objektą data paverciam JSON tekstu
	document.getElementById("jsonats").innerHTML="Pateikiamas sąrašas";
    console.log(data);										 //derinimui
 	
	// formuojam rezultatą html lentele kintamajame txt
	txt=	'<table border="1" width="50%" class="table table-striped" id="lentele">'+
		'<tr><th> id </th><th> username </th><th> password </th><th> kreditai </th></tr>';
    for (x in data) {
		txt += 
			"<tr><td>" + data[x].id + "</td><td>" + data[x].usr + 
			"</td><td>" + data[x].pass +"</td><td>" + data[x].kreditai +"</td></tr>";
    }
    txt += "</table>"    
    document.getElementById("lentele").innerHTML=txt;          // parodom lentelę

  })
  .catch(err => {
   document.getElementById("lentele").innerHTML+="Klaida:"+err;
   console.log(err);
  })
	}
	
	
		
function ieskok() {
	if( lkur.value == '' || lkiek.value == '' ) 
	{
		document.getElementById("jsonats").innerHTML="Klaidingai ivesti duomenys, prašome bandyti dar kart";
	}
	else{
	let kur = lkur.value;
	let kiek = lkiek.value;
	let url = "http://localhost/it/admin/kred_api.php";
	let ats,string_ats,x,txt;
	url+="/?kur="+kur+"&kiek="+kiek;                      			// prijungiam GET užklausai parametrus ?kur=abc&kiek=123
	document.getElementById("uzklausa").innerHTML="<br>";		// parodom kokia užklausa siunčiama

  fetch(url)
	  .then(response => {
    return response.json()
  })
  .then(data => {
    string_ats=JSON.stringify(data);							// objektą data paverciam JSON tekstu
	document.getElementById("jsonats").innerHTML="Redagavimas atliktas, Redaguotas vartotojas --> id: " + kur;    // parodom gautą atsakymą JSON formatu
    console.log(data);										 //derinimui
 	
	// formuojam rezultatą html lentele kintamajame txt
	txt=	'<table border="1" width="50%" class="table table-striped" id="lentele">'+
		'<tr><th> id </th><th> username </th><th> password </th><th> kreditai </th></tr>';
    for (x in data) {
		txt += 
			"<tr><td>" + data[x].id + "</td><td>" + data[x].usr + 
			"</td><td>" + data[x].pass +"</td><td>" + data[x].kreditai +"</td></tr>";
    }
    txt += "</table>"    
    document.getElementById("lentele").innerHTML=txt;          // parodom lentelę

  })
  .catch(err => {
   document.getElementById("lentele").innerHTML+="Klaida:"+err;
   console.log(err);
  })
	}
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