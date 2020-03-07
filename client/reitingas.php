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
        <h1>Reitingavimas</h1>
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
				border-bottom: 8px solid rgreen;
				background-color:rgba(0, 0, 0, 0.5);
				margin: 25px 260px 100px;
				color: white;
				font-weight: bold;">
	<br>
		<br>
	<h2>Suteikite reitingą jums patikusiam konsultantui !</h2><br>
	 Užpildykite formos Konsultanto numeris bei Įvertinimas <br><br>
<div class="form">
      <label for="kur">Konsultanto numeris: </label><input type="text" id="kur" class="kur">
	  <label for="kiek">Įvertinimas: </label><input type="text" id="kiek" class="kiek">
      <input type="submit" value="Vykdyti" class="spausk">
</div>
		<br>
		<div class="form">
	  
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
	let url = "http://localhost/it/client/kred_api.php";
	let ats,string_ats,x,txt;
	url+="/?kur="+kur+"&kiek="+kiek;                      			// prijungiam GET užklausai parametrus ?kur=abc&kiek=123
	document.getElementById("uzklausa").innerHTML="<br>";		// parodom kokia užklausa siunčiama

  fetch(url)
	  .then(response => {
    return response.json()
  })
  .then(data => {
    string_ats=JSON.stringify(data);							// objektą data paverciam JSON tekstu
	document.getElementById("jsonats").innerHTML="Įvertinimas užfiksuotas, Įvertintas konsultantas --> id: " + kur;    // parodom gautą atsakymą JSON formatu
    console.log(data);										 //derinimui
 	
	// formuojam rezultatą html lentele kintamajame txt
	 
   // document.getElementById("lentele").innerHTML=txt;          // parodom lentelę

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
        
    </p>
</body>
</html>