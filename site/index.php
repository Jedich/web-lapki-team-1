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
	<h3 style="text-align: center; margin: 20px">Оберіть тип транспорту!</h3>
	<form action="./approve.php">
		<table style="margin: auto; margin-bottom: 10px">
			<tr>
				<th>Тип</th>
				<th>Зображення</th>
				<th>Обрати</th>
			</tr>
			<tr>
				<td>Потяг</td>
				<td>
					<img src="img/train.png" style="width: 700px" />
				</td>
				<td>
					<input type="radio" id="html" name="trip" value="a" />
				</td>
			</tr>
			<tr>
				<td>Автобус</td>
				<td>
					<img src="img/bus.jpg" style="width: 700px" />
				</td>
				<td>
					<input type="radio" id="html" name="trip" value="b" />
				</td>
			</tr>
			<tr>
				<td>Літак</td>
				<td>
					<img src="img/plane.jpg" style="width: 700px" />
				</td>
				<td>
					<input type="radio" id="html" name="trip" value="c" />
				</td>
			</tr>
		</table>
		<input
		type="submit"
		value="Обрати!"
		class="btn btn-success"
		style="font-size: 30px;display: block;margin: 0 auto 10px;width: 885px;"
		/>
	</form>
	<footer style="text-align: center; margin-bottom: 10px;">
		<div>
			<div style="text-align:center;">Ми у соц мережах:</div>
			<ul class="social-icons">
			  <li><a class="social-icon-twitter" href="https://twitter.com/UkrAbobus" title="Офіційна сторінка в Twitter" target="_blank" rel="noopener"></a></li>
			  <li><a class="social-icon-fb" href="https://www.facebook.com/UkrAbobus.ru" title="Офіційна сторінка в Facebook" target="_blank" rel="noopener"></a></li>
			  <li><a class="social-icon-telegram" href="https://t.me/UkrAbobus" title="Офіційна сторінка в Telegram" target="_blank" rel="noopener"></a></li>
			  <li><a class="social-icon-youtube" href="https://www.youtube.com/channel/UkrAbobus" title="Офіційна сторінка на Youtube" target="_blank" rel="noopener"></a></li>
			</ul>
		  </div>
		<hr>
		<i>©Copyright team1 IA-02 Inc. <a href="../reports/lab1.html">Посилання на звіт</a></i>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
	</footer>
</body>
</html>
