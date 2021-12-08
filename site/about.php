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
			<p><b>UkrAbobus</b> – <i>створений нами застосунок</i>, який дозволяє максимально спростити вашу подорож. Користувач в змозі обрати зручний для нього засіб пересування, комфортний час та маршрут. 
			Перевага нашого застосунку полягає в комфортності та універсальності. </p>Даний WEB-додаток дозволяє користувачам придбати квитки на зручний їм транспорт для здійснення подорожі по Україні. На вибір користувача є три транспорти: потяг, літак та автобус. На одному сайті Ви можете подивитись розклад для всіх цих типів транспортів та обрати найзручніший саме Вам.
			<p>Застосунок має наступний функціонал: перегляд розкладу потягів, автобусів та літаків придбання квитків</p>
			<div class="list"> 
				<ul>
					<li class="list1">Перегляд розкладу:</li>
					<ol>
						<li>Потягів</li>
						<li>Літаків</li>
						<li>Автобусів</li>
					</ol>
					<li class="list1">Придбання квитків:</li>
					<ol>
						<li>На потяг</li>
						<li>На літак</li>
						<li>На автобус</li>
					</ol>
				</ul>
			</div>
		</div>
	</div>
	<footer>
		<div class="about_us">
			<h3>
				<a href="mailto:support@ukrabobus.com">Напишіть нам!</a>
			</h3>
		</div>
	</footer>
</body>