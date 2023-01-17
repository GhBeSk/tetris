<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Tetris</title>
		<?php
			include 'Common/BootStrap.txt';
		?>

		<link rel="stylesheet" href="./Css/style.css"></link>

		<style>
			.main {
				background-image: url("Images/tetris.png");
				background-size: 95% 100%;
				background-position: center center;
				background-repeat: no-repeat;
				background-attachment: fixed;

				/* width:560px;  */
				height: 700px;
			}
		</style>
	</head>

	<body>
		
		<?php
			include 'Common/header.php';
		?>

		<div class="main">

			<div class="login-box">

				<div id = "tetris-bg"></div>
				<h3>Score:<span id="score">0</span></h3>

				<!-- <button id="start-button">Start/Pause</button> -->
				
				<audio controls autoplay loop>
				<source src="Audio/tetris-theme.mp3" type="audio/mpeg"/>
				<script src="JS/app.js" charset="utf-8"></script>

			</div>
			
		</div>    

	</body>
</html>
