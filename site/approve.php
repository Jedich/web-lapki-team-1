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
    <meta charset="utf-8"/>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
            crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $(document).ready(function () {
            $("#tabs").tabs();
            $("#slider").slider({
                step: 1, max: 5, slide: function (event, ui) {
                    $("#value").html(ui.value);
                }
            });
            $("#datepicker").datepicker();
            $(document).tooltip();
            $("#type").selectmenu();
            $("#menu").menu();
            $(".input").checkboxradio({
                icon: false
            });
        });
    </script>
    <script>
        $( function() {
    var select = $( "#numbers_of_passangers" );
    var slider = $( "<div id='slider'></div>" ).insertAfter( select ).slider({
      min: 1,
      max: 5,
      range: "min",
      value: select[ 0 ].selectedIndex + 1,
      slide: function( event, ui ) {
        select[ 0 ].selectedIndex = ui.value - 1;
      }
    });
    $( "#numbers_of_passangers" ).on( "change", function() {
      slider.slider( "value", this.selectedIndex + 1 );
    });
  } );
    </script>


    <style>
        label {
            display: inline-block;
            width: 5em;
        }
    </style>
</head>

<body>
<?php include 'header.php' ?>
<?php
$trip = $_GET["trip"]; 
echo $trip?>
<div class="main-content">
    <form action="timetable.php" method="post">
        <input type="hidden" name="trip" value="<?php echo $trip ?>">
        <h5><?php echo $str["user_data"];?></h5>
        <?php echo $str["name"];?>: <input style="margin-bottom: 10px" type="text" name="name"> <?php echo $str["surname"];?>: <input type="text" name="surname">
        <br><?php echo $str["email"];?>: <input id="email" type="email">
        <h5><?php echo $str["doc_type"];?></h5>
        <?php echo $str["choose_doc_type"];?>
        <select name="document_type" id="document_type">
            <option selected="selected"><?php echo $str["adult"];?></option>
            <option><?php echo $str["student"];?></option>
            <option><?php echo $str["chind"];?></option>
            <option><?php echo $str["pilgo"];?></option>
        </select>

        <h5><?php echo $str["route"];?></h5>
        <?php echo $str["choose_departure"];?>
        <select name="departure" id="departure">
            <option selected="selected">Київ</option>
            <option>Львів</option>
            <option>Луцьк</option>
            <option>Харків</option>
        </select>

        <?php echo $str["choose_arrive"];?>
        <select name="arrival" id="arrival">
            <option selected="selected">Київ</option>
            <option>Львів</option>
            <option>Луцьк</option>
            <option>Харків</option>
        </select>

        <h5><?php echo $str["choose_class"];?></h5>
        <input type="radio" name="class_type" id="econom" value="1"><?php echo $str["econom"];?>
        <input type="radio" name="class_type" id="standart" value="2"><?php echo $str["standart"];?>
        <input type="radio" name="class_type" id="comfort" value="3"><?php echo $str["comfort"];?>
        <br>
        <h5><?php echo $str["class_desc"];?></h5>
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1"><?php echo $str["econom"];?></a></li>
                <li><a href="#tabs-2"><?php echo $str["standart"];?></a></li>
                <li><a href="#tabs-3"><?php echo $str["comfort"];?></a></li>
            </ul>
            <div id="tabs-1">
                <p>
                    <?php echo $str["econom_d"];?>
                </p>
            </div>
            <div id="tabs-2">
                <p>
                    <?php echo $str["standart_d"];?>
                </p>
            </div>
            <div id="tabs-3">
                <p>
                    <?php echo $str["comfort_d"];?>
                </p>
            </div>
        </div>
        <div class="sub-menu">
            <div>
                     <label for="numbers_of_passangers"><?php echo $str["choose_pas_num"];?></label>
  <select name="numbers_of_passangers" id="numbers_of_passangers">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
  </select>
            </div>
            <div>
                <h5><?php echo $str["choose_date"];?></h5>
                <?php echo $str["data"];?>: <input type="text" name="date" id="datepicker">
            </div>
        </div>
        <input type="submit" value="<?php echo $str["confirm"];?>!" class="btn btn-success"/>
    </form>
</div>

</body>
</html>
