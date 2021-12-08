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


<?php include 'head.php' ?>
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