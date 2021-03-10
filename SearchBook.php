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
	<title>Library | Search Books</title>
    <link rel="stylesheet" type="text/css" href="ASSETS\CSS\style1.css">
    <meta name="tourism ireland" content="Library Webiste with login and logout system. User can also register and view, search and reserve books. Made using php, mysql and css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <script type="text/javascript">
    	function hide_footer2(){
        document.getElementById('footer_search').style.cssText = 'visibility: hidden; display: none;';
    }
    </script>
</head>

<body>
	
	<?php include("header.php"); ?>

	<div id="search_main">
	    <!-- logged in user information -->
	    <?php  if (isset($_SESSION['username'])) : ?>
	    	<h3 id="search_title">Search Book by</h3>

	      	<div id="Search">
	      		<p id="BookTitle"><a href="#" onclick="change_css();">Book Title</a></p>
	      		<p id="BookAutor"><a href="#" onclick="change_css1();">Book Author</a></p>
	      		<p id="BookA&T" class="BookA_T"><a href="#" onclick="change_css2();">Author & Title</a></p>
	      		<p id="BookCategory" onclick="change_css3();"><a href="#">Category</a></p>
	      	</div>

	      	<div id="SearchOptions">
	      		<form method="post" action="SearchBook.php" id="option1">
	      			<label> Please ENTER Book Title</label>
	      			<input type="text" name="BTitle">
	      			<input type="submit" name="Option_1" onclick="hide_footer2();" >
	      		</form>

	      		<form method="post" action="SearchBook.php" id="option2">
	      			<label>Please ENTER Author Name</label>
	      			<input type="text" name="BAuthor">
	      			<input type="submit" name="Option_2"  onclick="hide_footer2();" >
	      		</form>

	      		<form method="post" action="SearchBook.php" id="option3">
	      			<label>Please ENTER Book Title</label>
	      			<input type="text" name="BT&A_1">
	      			<label>Please ENTER Author Name</label>
	      			<input type="text" name="BT&A_2">
	      			<input type="submit" name="Option_3" onclick="hide_footer2();" >
	      		</form>

	      		<?php  
	      		require_once ("db.php");
	      		$sql = "SELECT CategoryDescription FROM category";
				$result = mysqli_query($db, $sql);
	      		?>
	      		
	      		<form method="post" action="SearchBook.php" id="option4">
	      			<label>Please CHOOSE a Category</label>
	      			<select name="BCategory">
	      				<option value="error">Select</option>
	      				<?php  
		      			while ($row = mysqli_fetch_row($result)) {
		      				$value = $row[0];
		      				echo "<option value=$value> $value</option>"; 
		      			}
		      			?>
	      			</select>
	      			<input type="submit" name="Option_4" onclick="hide_footer2();" >
	      		</form>


	      		
	      	</div>

	      	<p> <a href="SearchBook.php" id="Another_opt">Choose another search option</a></p>

	      	<div>
			    <?php 
			    	include("SearchResults.php");
				endif 

			    ?>
		    </div>
	</div>

	<div id="footer_search">
	<?php include("footer.php"); ?>
	</div>

</body>
</html>