<?php 
session_start(); 

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<!-- Start HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Library | Home</title>
    <link rel="stylesheet" type="text/css" href="ASSETS\CSS\style1.css">
    <meta name="tourism ireland" content="Library Webiste with login and logout system. User can also register and view, search and reserve books. Made using php, mysql and css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>

    <?php include("header.php"); ?>

    <div class="content">
        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
        <div id="HomeLinks">
            <a href="SearchBook.php" class="home_buttons" id="HomeLink1">
                Search Books
            </a>

            <a href="ReserveBook.php" class="home_buttons" id="HomeLink2">
                Reserve Books
            </a>

            <a href="ReservedBook.php" class="home_buttons" id="HomeLink3">
              View Reserved Books
            </a>
        </div>
        

    </div>

    <?php include("footer.php"); ?>

    <?php endif ?>


</body>
</html>