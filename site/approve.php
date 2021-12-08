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
?>
<div class="main-content">
    <form action="timetable.php" method="post">
        <input type="hidden" name="transport_type" value=$trip>
        <h5>Особисті дані</h5>
        Ім'я: <input style="margin-bottom: 10px" type="text" name="name"> Прізвище: <input type="text" name="surname">
        <br>Електронна пошта: <input id="email" type="email"
                                        title="На введену пошту буде відправлен електронний квиток">
        <h5>Тип документу</h5>
        Виберіть тип документу
        <select name="document_type" id="document_type">
            <option selected="selected">Дорослий</option>
            <option>Студентський</option>
            <option>Дитячий</option>
            <option>Пільговий</option>
        </select>

        <h5>Маршрут</h5>
        Оберіть місто відправлення
        <select name="departure" id="departure">
            <option selected="selected">Київ</option>
            <option>Львів</option>
            <option>Луцьк</option>
            <option>Харків</option>
        </select>

        Оберіть місто прибуття
        <select name="arrival" id="arrival">
            <option selected="selected">Київ</option>
            <option>Львів</option>
            <option>Луцьк</option>
            <option>Харків</option>
        </select>

        <h5>Оберіть клас</h5>
        <input type="radio" name="class_type" id="econom" value="econom">Економ
        <input type="radio" name="class_type" id="standart" value="standart">Стандарт
        <input type="radio" name="class_type" id="comfort" value="comfort">Комфорт
        <br>
        <h5>Опис класів</h5>
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Економ</a></li>
                <li><a href="#tabs-2">Стандарт</a></li>
                <li><a href="#tabs-3">Комфорт</a></li>
            </ul>
            <div id="tabs-1">
                <p>
                    У купе чотири роздільні місця (2 нижніх/2 верхніх). Центральне
                    кондиціювання. Гарячий сніданок. Мінеральна вода, чай та кава
                    без обмежень. Дорожній набір, капці. Преса на вибір. Цифрове
                    ТБ, бездротовий Інтернет. Розетка 220V для кожного пасажира.
                    Купується місце у купе (у купе 4 місця).
                </p>
            </div>
            <div id="tabs-2">
                <p>
                    У купе два роздільні нижні місця. Центральне кондиціювання,
                    шафа для одягу. Гарячий сніданок. Мінеральна вода, чай та
                    кава без обмежень. Дорожній набір, капці. Преса на вибір.
                    Цифрове ТБ, бездротовий Інтернет. Розетка 220V для кожного
                    пасажира. Купується місце у купе (у купе 2 місця).
                </p>
            </div>
            <div id="tabs-3">
                <p>
                    Клас комфорт є справжнім готелем на колесах, який облаштований
                    кухнею, великою залою та просторим спальним купе. Кухня обладнана
                    холодильником, мікрохвильовою піччю та електроплитою. Велику залу
                    облаштовано м’яким куточком, комп’ютером, аудіо- та відеотехнікою. У
                    спальному купе розташовано ліжко, письмовий стіл, шафа, кондиціонер,
                    ванна кімната. Кількість спальних місць становить від 5 до 11 (у
                    залежності від конструкції вагону). Також вагони класу комфорт
                    облаштовані спеціальними купе для охорони та службового персоналу.
                </p>
            </div>
        </div>
        <div class="sub-menu">
            <div>
                     <label for="numbers_of_passangers">Оберіть кількість пасажирів</label>
  <select name="numbers_of_passangers" id="numbers_of_passangers">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
  </select>
            </div>
            <div>
                <h5>Оберіть дату</h5>
                Date: <input type="text" name="date" id="datepicker">
            </div>
        </div>
        <input type="submit" value="Підтвердити!" class="btn btn-success"/>
    </form>
</div>

</body>
</html>
