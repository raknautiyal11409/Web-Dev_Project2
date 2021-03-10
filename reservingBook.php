<!DOCTYPE html>
<html lang="en">

<head>
	<title>Library | Reserved Books</title>
    <link rel="stylesheet" type="text/css" href="ASSETS\CSS\style1.css">
    <meta name="tourism ireland" content="Library Webiste with login and logout system. User can also register and view, search and reserve books. Made using php, mysql and css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <style type="text/css">
    	#RB_footer, #footer_search{
    		visibility: hidden;
    		display: none;
    	}
    </style>
</head>

<body>
<?php 
$check_reciver_page = $_GET['check_reciver_page'];

if ($check_reciver_page == 0) {
	require_once "ReserveBook.php";
}
else{
	require_once "SearchBook.php";
}


if ( isset($_POST['reserve']) && isset($_POST['ISBN']) )
{
	$ISBN = mysqli_real_escape_string($db, $_GET['ISBN']);
	$sql = "UPDATE books SET ReservationStatus='Y' WHERE ISBN ='$ISBN' ";
	mysqli_query($db, $sql);

	$username = $_SESSION['username'];
	$date = date('Y-m-d');
	$sql = "INSERT INTO reservedbooks (ISBN, Username, ReservedDate) VALUES ('$ISBN', '$username', '$date')";
	mysqli_query($db, $sql);
	if ($check_reciver_page == 0) {
		echo '<p class="success">Success -<a href="ReserveBook.php">Continue...</a></p>';
			$footer_correction = 1;
	}
	else{
		echo '<p class="success">Success -<a href="SearchBook.php">Continue...</a></p>';
			$footer_correction = 1;
	}
	return;
}
?>

	<div id="Confirm_reservation">
	<?php
	echo "<p>Confirm: Reserving</p>\n";
	echo('<form method="post"><input type="hidden" ');
	echo('name="ISBN" value="">');
	echo('<input type="submit" value="Reserve" name="reserve">');
	echo('<a href="index.php">   Cancel</a>');
	echo("\n</form>\n");
	?>
	</div>

	<?php include("footer.php"); ?>
    
</body>
</html>