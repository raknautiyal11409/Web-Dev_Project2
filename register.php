<?php include('server.php') ?>

<!DOCTYPE html>

<head lang="en">
	<title>Library | Register</title>
    <link rel="stylesheet" type="text/css" href="ASSETS\CSS\style1.css">
    <meta name="tourism ireland" content="Library Webiste with login and logout system. User can also register and view, search and reserve books. Made using php, mysql and css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body id="login_Page">
	<header id="Website_title_login">
        <h2 >Library</h2>
    </header>

    <section id="LoginForm">
    	<h3>Register</h3>

		<form method="post" action="register.php">
			<?php  include('error.php')?>

			<div>
				<label>Username</label>
				<input type="text" name="username" value="">
			</div>

			<div>
				<label>First Name</label>
				<input type="Text" name="FName" value="">
			</div>

			<div>
				<label>Last Name</label>
				<input type="text" name="LName" value="">
			</div>

			<div>
				<label>Address Line 1</label>
				<input type="text" name="AddL1" value="">
			</div>

			<div>
				<label>Address Line 2</label>
				<input type="text" name="AddL2" value="">
			</div>

			<div>
				<label>City</label>
				<input type="text" name="City" value="">
			</div>

			<div>
				<label>Telephone</label>
				<input type="text" name="Telephone" value="">
			</div>

			<div>
				<label>Mobile</label>
				<input type="text" name="Mobile" value="">
			</div>

			<div>
				<label>Password</label>
				<input type="password" name="password" value="">
			</div>

			<div>
				<label>Confirm Password</label>
				<input type="password" name="password2" value="">
			</div>

			<div>
				<button type="submit" class="" name="register_user">Register</button>
			</div>
			<p>Already a memeber? <a href="login.php">SIGN IN</a></p>
		</form>

	</section>

</body>
</html>