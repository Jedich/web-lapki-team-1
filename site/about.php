<?php
	global $pName;
	$pName = "about";
?>
<?php
    $strJsonFileContents = file_get_contents("./res/str.json");
    $json_data = json_decode($strJsonFileContents, true);
    $lang = "en";
    if ($lang == "en") {
        $str = $json_data["en"];
    } elseif ($lang == "de") {
        $str = $json_data["de"];
    } else {
        $str = $json_data["ua"];
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>UkrAbobus</title>
	<meta charset="utf-8" />
	<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
			crossorigin="anonymous"
	/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script src="js/digital_clock.js"></script>
</head>
<body>
	<?php include 'header.php' ?>
	<div class="center">
		<div style="float: left; margin: auto; margin-right: 10px;">
			<img id="img_about" src="img/desc_pic.jpg"  />
		</div>
		<div>
			<p><b><?php echo $str["ukrabobus"];?></b> – <?php echo $str["ukrabobus_is"];?> </p><?php echo $str["app_desc"];?>
			<p><?php echo $str["app_funct"];?></p>

		</div>
	</div>

</body>