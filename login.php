<?php include('server.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Library | LOGIN</title>
    <link rel="stylesheet" type="text/css" href="ASSETS\CSS\style1.css">
    <meta name="tourism ireland" content="Library Webiste with login and logout system. User can also register and view, search and reserve books. Made using php, mysql and css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body id="login_Page"> 
    <header id="Website_title_login">
        <h2 >Library</h2>
    </header>

    <div id="LoginForm">
        <h3>Login</h3>

        <form method="post" action="login.php">

            <?php include('error.php'); ?> 

            <div>
                <label>Username</label>
                <input type="text" name="login_username">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="login_password">
            </div>

            <div>
                <button type="submit" name="login">Login</button>
            </div>

            <p>Have you registered? <a href="register.php">REGISTER HERE</a></p>
        </form>
    </div>

</body>
</html>