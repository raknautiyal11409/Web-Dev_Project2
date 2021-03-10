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
	<title>Library | Reserved Books</title>
    <link rel="stylesheet" type="text/css" href="ASSETS\CSS\style1.css">
    <meta name="tourism ireland" content="Library Webiste with login and logout system. User can also register and view, search and reserve books. Made using php, mysql and css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>

	<header id="home_header">
        <a href="index.php"><img src="ASSETS/image/house.png" alt="Home Icon"></a>
        <h2 id="Website_title">Library</h2>
        <h2>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h2>
    </header>

	<div id="RB_heading">
	  <h2>Reserved Books</h2>
	</div>

	<div class="content">
	    <?php 
	    include("db.php");
	    $username = $_SESSION['username'];
	    $sql = "SELECT ISBN, BookTitle, Author, Edition, Year, CategoryDescription FROM books JOIN reservedbooks USING (ISBN) JOIN category ON Category=CategoryID WHERE username = '$username'";
	    $result = mysqli_query($db, $sql);

	    if (mysqli_num_rows($result) != 0) {
	    
	    ?>
	    <div id="display_table" class="reserved_table">
		    <table>
			    <tr>
			    	<th>ISBN</th>
			    	<th>Book Title</th>
				    <th>Author</th>
					<th>Edition</th>
					<th>Year</th>
					<th>Category</th>
					<th>Remove</th>
				</tr>

			<?php
				//loop to show the table 
				while ($row = mysqli_fetch_row($result)) {
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
					echo('<a href="removeReservedBook.php?ISBN='.htmlentities($row[0]).'">Remove</a>');
					"</td></tr>\n";
				}


			?>
			</table>
		</div>
		<?php 
		}
		else{
			echo "<p id='No_RB'>No books reserved</p>";
		}
		?>
	</div>

	<div id="ReservedB_footer">
		<div id="space2">
			<p id="extra_option"><a href="SearchBook.php" >Search book</a></p>
		</div>
	<?php include("footer.php"); ?>
	</div>    
</body>
</html>