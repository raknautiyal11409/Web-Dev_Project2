<style type="text/css">
	#ReservedB_footer {
		visibility: hidden;
		display: none;
	}
</style>

<?php 
require_once "ReservedBook.php";


if ( isset($_POST['remove']) && isset($_POST['ISBN']) )
{
	$ISBN = mysqli_real_escape_string($db, $_GET['ISBN']);
	$sql = "UPDATE books SET ReservationStatus='N' WHERE ISBN ='$ISBN' ";
	mysqli_query($db, $sql);

	$username = $_SESSION['username'];
	$sql = "DELETE FROM reservedbooks WHERE Username = '$username'  AND ISBN = '$ISBN'";
	mysqli_query($db, $sql);
	echo '<p class="success">Success -<a href="ReservedBook.php">Continue...</a></p>';;
	return;
}

echo '<div id="Confirm_reservation2">';
echo "<p>Confirm: Removing $row[1]</p>\n";
echo('<form method="post"><input type="hidden" ');
echo('name="ISBN" value="">');
echo('<input type="submit" value="Remove" name="remove">');
echo('<a href="index.php">   Cancel</a>');
echo("\n</form>\n");
echo "</div>";

include 'footer.php';
?>

