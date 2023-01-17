<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Leaderboard</title>
		<?php
			include 'Common/BootStrap.txt';
		?>

		<style>
			.main {
				background-image: url("Images/tetris.png");
				background-size: 95% 100%;
				background-position: center center;
				background-repeat: no-repeat;
				background-attachment: fixed;
				
				height: 700px;
			}

			table {
				margin-left: auto;
  				margin-right: auto;
				border-spacing: 2px;
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width: 50%;
			}

			th {
				color: white;
				background-color: blue;
				text-align: center;
			}

			td {
				text-align: center;
			}

			tr:nth-child(even) {
				background-color: #dddddd;
			}
		</style>

	</head>

	<body>
		
		<?php
			include 'Common/header.php';
		?>

        <div class = "main">
			<div class="login-box">
				<?php
					include 'ShowLeaders.php';
				?>
			</div>
		</div>

	</body>
</html>
