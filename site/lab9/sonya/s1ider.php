<!doctype html>
<html>
    <head>
        <title>Upload and delete image file with jQuery and AJAX</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <br>        
        <div id="photoGallery" style="display:none;">
</div>
        
        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery("#photoGallery").unitegallery();
            });

        </script>
</body>
</html>