<?php

    $strJsonFileContents = file_get_contents("./res/str.json");
    $json_data = json_decode($strJsonFileContents, true);
    $lang = htmlspecialchars($_COOKIE["lang"]);
    if ($lang == "en") {
        $str = $json_data["en"];
    } elseif ($lang == "de") {
        $str = $json_data["de"];
    } else {
        $str = $json_data["ua"];
    }
	error_reporting(E_ERROR | E_PARSE);
	session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
	<div class="container-fluid">
		<a class="navbar-brand" style="padding: 0" href="#">
			<img
				src="logo.svg"
				alt=""
				width="160"
				class="d-inline-block align-text-top"
			/>
		</a>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<a class="nav-item nav-link <?= ($pName == 'about') ? 'active' : ''; ?>" style="font-size: 18pt;" href="about.php"><?php echo $str["about_us"];?></a>
				<a class="nav-item nav-link <?= ($pName == 'index') ? 'active' : ''; ?>" style="font-size: 18pt;" href="index.php"><?php echo $str["buy_ticket"];?></a>
				<a class="nav-item nav-link <?= ($pName == 'archive') ? 'active' : ''; ?>" style="font-size: 18pt;" href="archive.php"><?php echo $str["arch"];?></a>
				<a class="nav-item nav-link <?= ($pName == 'gallery') ? 'active' : ''; ?>" style="font-size: 18pt;" href="gallery.php"><?php echo $str["gallery"];?></a>
				<a class="nav-item nav-link" style="font-size: 18pt;" href="#"><?php echo isset($_SESSION['user']) ? $_SESSION['user']['name'] : 'Guest' ;?></a>
				<?php if(isset($_SESSION['user'])): ?>
					<a href='logout.php'>Logout</a>
				<?php endif ?>
			</ul>
			 <button onclick="setUa()">UA</button>
			  <button onclick="setEn()">EN</button>
			   <button onclick="setDe()">DE</button>
			   <script>
               function setDe() { document.cookie = "lang=de"; document.location.reload(); }
               function setEn() { document.cookie = "lang=en"; document.location.reload(); }
               function setUa() { document.cookie = "lang=ua"; document.location.reload(); }
               </script>

			<div class="time"></div>
		</div>
	</div>
</nav>