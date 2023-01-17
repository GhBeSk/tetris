<?php
	if(isset($_POST['user'])) {
		include 'registration.php';
		
		unset($_POST['firstName']);
		unset($_POST['lastName']);
		unset($_POST['display']);
		unset($_POST['user']);
		unset($_POST['password']);
		unset($_POST['confirmPassword']);
	}
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Index Page</title>
		
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

		</style>

	</head>

	<body>
		
		<?php
			include 'Common/header.php';
		?>

		<div class="main">
			<?php
				session_start();
				
				
				if(isset($_SESSION['registerErrorMessage'])) {
					header('location:register.php');
				} else {
					if(!isset($_SESSION['username'])) {
						include 'login.php';
						if(isset($_SESSION['loginErrorMessage'])) {
							$errorMessage = $_SESSION['loginErrorMessage'];
							unset($_SESSION['loginErrorMessage']);
							echo "<p> '$errorMessage' </p>";
						}
					} else {
						include 'home.php';
					}
				}
			?>
		</div>

	</body>
</html>
