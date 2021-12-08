<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		global $pName;
		$pName = "gallery";
	?>
    <meta charset="UTF-8">
    <title>Title</title>
  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <script type='text/javascript' src='uniteGallery/dist/js/unitegallery.min.js'></script>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
            crossorigin="anonymous"
    />
  <link rel='stylesheet' href='uniteGallery/dist/css/unite-gallery.css' type='text/css' />
  <script type='text/javascript' src='uniteGallery/dist/themes/default/ug-theme-default.js'></script>
  <link rel='stylesheet' href='uniteGallery/dist/themes/default/ug-theme-default.css' type='text/css' />
</head>

<body>
<?php include 'header.php' ?>
<h2>Photo Gallery</h2>
<div id="photoGallery" style="display:none;">

    <img src="../reports/img/faces/Egor.jpg"
         data-image="../reports/img/faces/Egor.jpg">

    <img src="../reports/img/faces/Sophie.jpg"
         data-image="../reports/img/faces/Sophie.jpg">

    <img src="../reports/img/faces/Oleksandr.jpg"
         data-image="../reports/img/faces/Oleksandr.jpg">

    <img src="../reports/img/faces/Maks.jpg"
         data-image="../reports/img/faces/Maks.jpg">

</div>
<br><br>
<h2>Video Gallery</h2>
<div id="videoGallery">

    <div data-type="youtube"
         data-image="../reports/img/faces/Egor.jpg"

         data-thumb="../reports/img/faces/Egor.jpg"
         data-videoid="AY7xZ1HvtJs"
         data-title="GoPro Demo"
         data-description="TUN TUN TUN TUN TUN"></div>

    <div data-type="youtube"
         data-image="../reports/img/faces/Maks.jpg"
         data-thumb="../reports/img/faces/Maks.jpg"
         data-videoid="JkDieSJRdyc"
         data-title="Solus"
         data-description="АРТУУУУУР ПИРОЖКООООВ"></div>

    <div data-type="youtube"
         data-image="../reports/img/faces/Oleksandr.jpg"
         data-thumb="../reports/img/faces/Oleksandr.jpg"
         data-videoid="GEfqFVGiDgg"
         data-title="Solus"
         data-description="МАМА Я ГУЛЬ"></div>

    <div data-type="youtube"
         data-image="../reports/img/faces/Sophie.jpg"
         data-thumb="../reports/img/faces/Sophie.jpg"
         data-videoid="UOxkGD8qRB4"
         data-title="Solus"
         data-description="LOL"></div>


</div>
<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery("#photoGallery").unitegallery();
    });

    jQuery(document).ready(function () {
        jQuery("#videoGallery").unitegallery();
    });
</script>
</body>
</html>