<?php include('./register.php') ?>
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
<?php $t = ($isLogin == 'true') ? true : false; ?>
<body>
	<?php require './header.php' ?>
	<div class="center">
		<div style="float: right;">
			<form action="login_page.php" method="post">
				<h5>Зареєеструйтесь</h5>
				Ім'я: <input style="margin-bottom: 10px" type="text" name="name" value="<?=($t) ? '' : $name?>">
				<br>Прізвище: <input type="text" name="surname" value="<?=($t) ? '' : $sname?>">
				<br>Електронна пошта: <input name="email" type="email" value="<?=($t) ? '' : $email?>">
				<br>Пароль: <input name="pwd" type="password" value="<?=($t) ? '' : $pwd?>">
				<input name="isLogin" type="hidden" value="false">
				<input type="submit" value="Зареєструватися" class="btn btn-success" name="reg_user"/>
			</form>
		</div>

		<div style="float: right;">
			<form action="login_page.php" method="post">
				<h5>Увійдіть</h5>
				<br>Електронна пошта: <input name="email" type="email" value="<?=($t) ? $email : ''?>">
				<br>Пароль: <input name="pwd" type="password" value="<?=($t) ? $pwd : ''?>">
				<input name="isLogin" type="hidden" value="true">
				<input type="submit" value="Увійти" class="btn btn-success" name="reg_user"/>
			</form>
		</div>
		<?php  if (count($message) > 0) : ?>
			<div class="error">
				<?php foreach ($message as $error) : ?>
					<?php echo $error ?>;
				<?php endforeach ?>
			</div>
		<?php  endif ?>
	</div>
	<footer>
		<div class="about_us">
			<h3>
				<a href="mailto:support@ukrabobus.com">Напишіть нам!</a>

			</h3>
		</div>
	</footer>
</body>