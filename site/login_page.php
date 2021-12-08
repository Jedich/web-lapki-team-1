<?php require './head.php' ?>
<?php include('./register.php') ?>
<body>
	<?php require './header.php' ?>
	<div class="center">
		<div style="float: right;">
			<form action="login_page.php" method="post">
				<h5>Зареєеструйтесь</h5>
				Ім'я: <input style="margin-bottom: 10px" type="text" name="name">
				<br>Прізвище: <input type="text" name="surname">
				<br>Електронна пошта: <input name="email" type="email">
				<br>Пароль: <input name="pwd" type="password">
				<input name="isLogin" type="hidden" value="false">
				<input type="submit" value="Зареєструватися" class="btn btn-success"/>
			</form>
		</div>

		<div style="float: right;">
			<form action="register.php" method="post">
				<h5>Увійдіть</h5>
				<br>Електронна пошта: <input name="email" type="email">
				<br>Пароль: <input name="pwd" type="password">
				<input name="isLogin" type="hidden" value="true">
				<input type="submit" value="Увійти" class="btn btn-success"/>
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