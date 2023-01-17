<div class="login-box">
	<form action="validation.php" method="post">
		<h2>Login Here</h2>
		<div class="form-group">
			<label for="">UserName</label>
			<input type="text" name="user" class="form-control"  placeholder='username' required>
		</div>
		<div class="form-group">
			<label for="">Password </label>
			<input type="password" name="password" class="form-control" required>
		</div>
		<button type="submit" class="btn btn-primary"> Login </button>
		<p>Don't have a user account? <a href="register.php">Register now</a></p>
	</form>
</div>