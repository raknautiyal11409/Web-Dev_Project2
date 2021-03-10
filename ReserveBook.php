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

<!DOCTYPE html>
<html lang="en">

<head>
  	<title>Library | Reserve Book</title>
    <link rel="stylesheet" type="text/css" href="ASSETS\CSS\style1.css">
    <meta name="tourism ireland" content="Library Webiste with login and logout system. User can also register and view, search and reserve books. Made using php, mysql and css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <script type="text/javascript">
    	function hide_footer(){
        document.getElementById('RB_footer').style.cssText = 'visibility: hidden; display: none;';
    }
    </script>
</head>

<body>
	<?php include("header.php") ?>


	<div id="reserve_book_hd">
	  <h2 >Available Books for Reservation</h2>
	</div>

	<div id="reserve_book_home">

	    <?php 
	    include("db.php");
	    $check_reciver_page = 0;
	    $sql = "SELECT ISBN, BookTitle, Author, Edition, Year, CategoryDescription FROM books JOIN category ON Category=CategoryID WHERE ReservationStatus = 'N' ";
	    $result = mysqli_query($db, $sql);
	    ?>
	    <div id="display_table">
		    <table>
			    <tr>
			    	<th>ISBN</th>
			    	<th>Book Title</th>
				    <th>Author</th>
					<th>Edition</th>
					<th>Year</th>
					<th>Category</th>
					<th>Reserve</th>
				</tr>

			<?php
				//loop to show the table 
				// while ($row = mysqli_fetch_row($result)) {
			while($row = mysqli_fetch_array($result)){
					# Printing the table out from the database
					echo "<tr><td>";
					echo "$row[0]";
					echo "</td><td>";
					echo "$row[1]";
					echo "</td><td>";
					echo "$row[2]";
					echo "</td><td>";
					echo "$row[3]";
					echo "</td><td>";
					echo "$row[4]";
					echo "</td><td>";
					echo "$row[5]";
					echo("</td><td>\n");
					echo('<a href="reservingBook.php?ISBN='.htmlentities($row[0]).'&check_reciver_page='.$check_reciver_page.'";" onclick="hide_footer();" >Reserve</a>' );
				}
			?>
			</td></tr>
		</table>

		</div>

		
	</div>

	<div id="RB_footer">
		<div id="space">
			
		</div>
	<?php include("footer.php");?>
    </div>
</body>
</html>