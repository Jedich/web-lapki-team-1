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
		<div style="margin-right: 100px;">
			<form action="login_page.php" method="post">
				<h5><?=$str["register"]?></h5>
				<div class="form-group">
					<label for="name"><?=$str["name"]?></label>
					<input class="form-control" type="text" name="name" id="name" value="<?=($t) ? '' : $name?>" placeholder="Enter name">
				</div>
				<div class="form-group">
					<label for="email"><?=$str["surname"]?></label>
					<input class="form-control" type="text" name="sname" id="sname" value="<?=($t) ? '' : $sname?>" placeholder="Enter surname">
				</div>
				<div class="form-group">
					<label for="email"><?=$str["email"]?></label>
					<input type="email" class="form-control" name="email" id="email" value="<?=($t) ? '' : $email?>" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="pwd"><?=$str["password"]?></label>
					<input type="password" class="form-control" name="pwd" id="pwd" value="<?=($t) ? '' : $pwd?>" placeholder="Password">
				</div>
				<input name="isLogin" type="hidden" value="false">
				<br>
				<input type="submit" value="<?=$str["register"]?>" class="btn btn-success" name="reg_user"/>
			</form>
		</div>
		<div style="float: right;">
			<form action="login_page.php" method="post">
				<h5><?=$str["login"]?></h5>
				<div class="form-group">
					<label for="email"><?=$str["email"]?></label>
					<input type="email" class="form-control" name="email" id="email" value="<?=($t) ? $email : ''?>" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="pwd"><?=$str["password"]?></label>
					<input type="password" class="form-control" name="pwd" id="pwd" value="<?=($t) ? $pwd : ''?>" placeholder="Password">
				</div>
				<input name="isLogin" type="hidden" value="true">
				<br>
				<input type="submit" value="<?=$str["login"]?>" class="btn btn-success" name="reg_user"/>
			</form>
		</div>
		<?php  if (count($message) > 0) : ?>
			<div class="error" style="text-align: center;">
				<?php foreach ($message as $error) : ?>
					<?php echo $error ?>;<br>
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