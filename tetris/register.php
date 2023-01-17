<!DOCTYPE html>
<html>

	<head>
		<title>Register</title>
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

		<div class = "main">
			<div class="login-box">
				<form action="index.php" method="post">
					<h2>Register Here</h2>
					<div class="form-group">
						<label for="">First Name</label>
						<input type="text" name="firstName" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="">Last name</label>
						<input type="text" name="lastName" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="user" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" class="form-control" required placeholder="Password">
					</div>

					<div class="form-group">
						<label for="">Confirm Password</label>
						<input type="password" name="confirmPassword" class="form-control" required placeholder="Confirm Password">
					</div>

					<p>Display Scores on leaderboard</p>
					
					<input type="radio" id="yes" name="display" value="1" checked>
					<label for="yes">Yes</label><br>
					
					<input type="radio" id="no" name="display" value="0">
					<label for="no">No</label><br>

					<button type="submit" class="btn btn-primary"> Register </button>

					<p>Already have an user account? <a href="index.php">Login Now</a></p>
				</form>

				<?php
					session_start();

					if(isset($_SESSION['registerErrorMessage'])) {
						$errorMessage = $_SESSION['registerErrorMessage'];
						unset($_SESSION['registerErrorMessage']);
						echo "<p> '$errorMessage' </p>";
					}
				?>
			</div>
		</div>

	</body>
</html>
