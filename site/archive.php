
<?php
	global $pName;
	$pName = "archive";
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
        <h2>Курси валют:</h2>
        <div id="minfin-informer-m1Fn-currency">Загружаем <a href="https://minfin.com.ua/currency/" target="_blank">курсы валют</a> от minfin.com.ua</a></div><script>var iframe = '<ifra'+'me width="282" height="120" fram'+'eborder="0" src="https://informer.minfin.com.ua/gen/course/?color=grey" vspace="0" scrolling="no" hspace="0" allowtransparency="true"style="width:282px;height:120px;ove'+'rflow:hidden;"></iframe>';var cl = 'minfin-informer-m1Fn-currency';document.getElementById(cl).innerHTML = iframe; </script><noscript><img src="https://informer.minfin.com.ua/gen/img.png" width="1" height="1" alt="minfin.com.ua: курсы валют" title="Курс валют" border="0" /></noscript>

        <h2>Погода:</h2>
        <div id="m-booked-custom-widget-82587"> <div class="weather-customize" style="width:250px;"> <div class="booked-weather-custom-160 color-009fde" style="width:250px;" id="width3"> <div class="booked-weather-custom-160-date">Погода, 10 Листопад</div> <div class="booked-weather-custom-160-main"> <a target="_blank" href="https://hotelmix.com.ua/weather/kiev-18881" class="booked-weather-custom-160-city"> Погода в Києві </a> <div class="booked-weather-custom-160-degree booked-weather-custom-C wmd06"><span><span class="plus">+</span>3</span></div> <div class="booked-weather-custom-details"> <p><span>Макс.: <strong><span class="plus">+</span>6<sup>°</sup></strong></span><span> Мін.: <strong>-1<sup>°</sup></strong></span></p> <p>Вологість: <strong>45%</strong></p> <p>Вітер: <strong>S - 13 KPH</strong></p> </div> </div> <div class="booked-weather-custom-160-main"> <a target="_blank" href="https://hotelmix.com.ua/weather/lviv-4436" class="booked-weather-custom-160-city"> Погода в Львові </a> <div class="booked-weather-custom-160-degree booked-weather-custom-C wmd03"><span><span class="plus">+</span>8</span></div> <div class="booked-weather-custom-details"> <p><span>Макс.: <strong><span class="plus">+</span>10<sup>°</sup></strong></span><span> Мін.: <strong>-1<sup>°</sup></strong></span></p> <p>Вологість: <strong>54%</strong></p> <p>Вітер: <strong>SSE - 18 KPH</strong></p> </div> </div> <div class="booked-weather-custom-160-main"> <a target="_blank" href="https://hotelmix.com.ua/weather/kharkiv-19227" class="booked-weather-custom-160-city"> Погода в Харкові </a> <div class="booked-weather-custom-160-degree booked-weather-custom-C wmd01"><span><span class="plus">+</span>1</span></div> <div class="booked-weather-custom-details"> <p><span>Макс.: <strong><span class="plus">+</span>2<sup>°</sup></strong></span><span> Мін.: <strong>-2<sup>°</sup></strong></span></p> <p>Вологість: <strong>45%</strong></p> <p>Вітер: <strong>N - 21 KPH</strong></p> </div> </div> <div class="booked-weather-custom-160-main"> <a target="_blank" href="https://hotelmix.com.ua/weather/odessa-7764" class="booked-weather-custom-160-city"> Погода в Одесі </a> <div class="booked-weather-custom-160-degree booked-weather-custom-C wmd01"><span><span class="plus">+</span>4</span></div> <div class="booked-weather-custom-details"> <p><span>Макс.: <strong><span class="plus">+</span>6<sup>°</sup></strong></span><span> Мін.: <strong><span class="plus">+</span>1<sup>°</sup></strong></span></p> <p>Вологість: <strong>50%</strong></p> <p>Вітер: <strong>N - 29 KPH</strong></p> </div> </div> </div> </div> </div><script type="text/javascript"> var css_file=document.createElement("link"); var widgetUrl = location.href; css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/weather.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData_82587(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-custom-widget-82587'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } var widgetSrc = "https://widgets.booked.net/weather/info?action=get_weather_info;ver=7;cityID=18881,4436,19227,7764;type=2;scode=124;ltid=3540;domid=;anc_id=16205;countday=undefined;cmetric=1;wlangID=29;color=009fde;wwidth=250;header_color=ffffff;text_color=333333;link_color=08488D;border_form=1;footer_color=ffffff;footer_text_color=333333;transparent=0;v=0.0.1";widgetSrc += ';ref=' + widgetUrl;widgetSrc += ';rand_id=82587';var weatherBookedScript = document.createElement("script"); weatherBookedScript.setAttribute("type", "text/javascript"); weatherBookedScript.src = widgetSrc; document.body.appendChild(weatherBookedScript) </script>

		<h2>Кубік:</h2>
		<section>
			<img class="gifplayer" src="media/dick.png" />
		</section>


		<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="jquery.gifplayer.js"></script>
		<script>
			$(document).ready( function(){
				$('.gifplayer').gifplayer();
			});
		</script>
	</div>
    </div>
</body>