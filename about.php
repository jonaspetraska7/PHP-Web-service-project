<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
	<h2>  Dažniausiai užduodami klausimai </h2> <br> <br>
	<p>
		<?php

// configuration
$file = 'admin/files/video.txt';

// read the textfile
$text = file_get_contents($file);
		echo ('<iframe width="1280" height="720" src="');
		echo $text;
		echo ('"> </iframe>');

?>
</p>
	<br>
	<p>
		<?php

// configuration
$file = 'admin/files/duk.txt';

// read the textfile
$text = file_get_contents($file);
		echo $text;

?>
</p>
	
</div>

<?php include("includes/footer.php");?>

</body>
</html>