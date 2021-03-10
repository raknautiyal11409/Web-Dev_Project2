<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="ASSETS\CSS\style1.css">
	<script type="text/javascript">
    // Show related search bar when clicked on option 1
	function change_css(){
        document.getElementById('Search').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option2').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option3').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option4').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option1').style.cssText = 'visibility: visible; display: inline-block; height:460px; padding-top:100px; padding-bottom:none;';
        document.getElementById('Another_opt').style.cssText = 'display : inline-block; visibility: visible;';
        document.getElementById('search_title').style.cssText = 'visibility: hidden;';
        document.getElementById('error_main').style.cssText = 'visibility: hidden;';
        document.getElementById('Search_results_hide').style.cssText = 'visibility: hidden; display:none;';
    }

    // Show related search bar when clicked on option 2
    function change_css1(){
        document.getElementById('Search').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option1').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option3').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option4').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option2').style.cssText = 'visibility: visible; display: inline-block; height:460px; padding-top:100px; padding-bottom:none; ';
        document.getElementById('Another_opt').style.cssText = 'display : inline-block; visibility: visible;';
        document.getElementById('search_title').style.cssText = 'visibility: hidden;';
        document.getElementById('error_main').style.cssText = 'visibility: hidden;';
         document.getElementById('Search_results_hide').style.cssText = 'visibility: hidden; display:none;';
    }

    // Show related search bar when clicked on option 3
    function change_css2(){
        document.getElementById('Search').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option2').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option1').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option4').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option3').style.cssText = 'visibility: visible; display: inline-block; height:460px; padding-top:100px; padding-bottom:none;';
        document.getElementById('Another_opt').style.cssText = 'display : inline-block; visibility: visible;';
        document.getElementById('search_title').style.cssText = 'visibility: hidden;';
        document.getElementById('error_main').style.cssText = 'visibility: hidden; ';
         document.getElementById('Search_results_hide').style.cssText = 'visibility: hidden; display:none;';
    }

    // Show drop down menu when clicked on option 3
    function change_css3(){
        document.getElementById('Search').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option2').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option3').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option1').style.cssText = 'visibility: hidden; display: none;';
        document.getElementById('option4').style.cssText = 'visibility: visible; display: inline-block; height:460px; padding-top:100px; padding-bottom:none;';
        document.getElementById('Another_opt').style.cssText = 'display : inline-block; visibility: visible;';
        document.getElementById('search_title').style.cssText = 'visibility: hidden;';
        document.getElementById('error_main').style.cssText = 'visibility: hidden;';
        document.getElementById('Search_results_hide').style.cssText = 'visibility: hidden; display:none;';
    }

    
    </script>
</head>
<body>
	<div id="display_table1">
		<table>
			<?php
			include("db.php");
			$errors = array();
			$print_error_check = 0;
			$check_reciver_page = 1;

			// Search by author code
			if (isset($_POST['Option_1'])) {
			  	$BTitle = mysqli_real_escape_string($db, $_POST['BTitle']);

				if (empty($BTitle)) {
				    array_push($errors, "Book title is required");
				}

				if (count($errors) == 0) {
					$sql = "SELECT ISBN, BookTitle, Author, Edition, Year, CategoryDescription, ReservationStatus FROM books JOIN category ON Category = CategoryID WHERE BookTitle LIKE '%$BTitle%'";
					$result = mysqli_query($db, $sql);
					if(mysqli_num_rows($result) == 0){
						array_push($errors, "NO MATCHING BOOK TITLE");
					}
					else{
						$print_error_check = 1;
					}

				}
				
			}

			// Search by Book Title 
			if (isset($_POST['Option_2'])) {
			  	$BAuthor = mysqli_real_escape_string($db, $_POST['BAuthor']);

				if (empty($BAuthor)) {
				    array_push($errors, "Author Name is required");
				}

				if (count($errors) == 0) {
					$sql = "SELECT ISBN, Author, Author, Edition, Year, CategoryDescription, ReservationStatus FROM books JOIN category ON Category=CategoryID WHERE Author LIKE '%$BAuthor%'";
					$result = mysqli_query($db, $sql);
					if(mysqli_num_rows($result) == 0){
						array_push($errors, "NO MATCHING AUTHOR");
					}
					else{
						$print_error_check = 1;
					}

				}
				
			}

			// Search a book by Author and Book Title
			if (isset($_POST['Option_3'])) {
			  	$BTitle = mysqli_real_escape_string($db, $_POST['BT&A_1']);
			  	$BAuthor = mysqli_real_escape_string($db, $_POST['BT&A_2']);

				if (empty($BAuthor)) {
				    array_push($errors, "Book title is required");
				}

				if (empty($BAuthor)) {
				    array_push($errors, "Book Author is required");
				}

				if (count($errors) == 0) {
					$sql = "SELECT ISBN, BookTitle, Author, Edition, Year, CategoryDescription, ReservationStatus FROM books JOIN category ON Category=CategoryID WHERE BookTitle LIKE '%$BTitle%' AND Author LIKE '%$BAuthor%'";
					$result = mysqli_query($db, $sql);
					if(mysqli_num_rows($result) == 0){
						array_push($errors, "NO MATCHING BOOK TITLE AND AUTHOR");
					}
					else{
						$print_error_check = 1;
					}

				}
			}

			// Search by Book Category 
			if (isset($_POST['Option_4'])) {
			  	$BCategory = mysqli_real_escape_string($db, $_POST['BCategory']);

				if ($BCategory == 'error') {
				    array_push($errors, "Please select a category");
				}

				if (count($errors) == 0) {
					$sql = "SELECT ISBN, Author, Author, Edition, Year, CategoryDescription, ReservationStatus FROM books JOIN category ON Category=CategoryID WHERE CategoryDescription LIKE '%$BCategory%'";
					$result = mysqli_query($db, $sql);
					if(mysqli_num_rows($result) == 0){
						array_push($errors, "NO MATCHING CATEGORY");
					}
					else{
						$print_error_check = 1;
					}

				}
				
			}




			if ($print_error_check > 0) { 
			?>
					
					<tr width="100%">
			    	<th colspan="7">Result</th>
					</tr>

					<tr>
			    	<th>ISBN</th>
			    	<th>Book Title</th>
				    <th>Author</th>
					<th>Edition</th>
					<th>Year</th>
					<th>Category</th>
					<th>Status</th>
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
						if ($row[6] == 'Y') {
							echo('<p>Reserved</p>');
							"</td></tr>\n";
						}
						else{
							echo('<a href="reservingBook.php?ISBN='.htmlentities($row[0]).'&check_reciver_page='.$check_reciver_page.'">Reserve</a>');
							"</td></tr>\n";
						}
					}

				}
				else{
					include('error.php');

				}	
					?>
				</table>
		</div>

		
	</div>

</body>
</html>