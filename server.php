<?php
// Connect to the database
session_start();
unset($_SESSION["username"]);

include("db.php");
$username = "";
$errors = array();

// User Registeration
if(isset($_POST['register_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $FirstName = mysqli_real_escape_string($db, $_POST['FName']);
    $LastName = mysqli_real_escape_string($db, $_POST['LName']);
    $Address1 = mysqli_real_escape_string($db, $_POST['AddL1']);
    $Address2 = mysqli_real_escape_string($db, $_POST['AddL2']);
    $city = mysqli_real_escape_string($db, $_POST['City']);
    $Telephone = mysqli_real_escape_string($db, $_POST['Telephone']);
    $Mobile = mysqli_real_escape_string($db, $_POST['Mobile']);
    $pass1 = mysqli_real_escape_string($db, $_POST['password']);
    $pass2 = mysqli_real_escape_string($db, $_POST['password2']);

    $passLength = strlen($pass1);


    // Form validation
    if (empty($username)) {
        array_push($errors, "Username is required!");
    }
    if (empty($LastName)) {
        array_push($errors, "Last Name required!");
    }
    if (empty($Address1)) {
        array_push($errors, "Please fill in address!");
    }
    if (empty($Address2)) {
        array_push($errors, "Plaese fill in address!");
    }
    if (empty($city)) {
        array_push($errors, "Plaese fill in city name!");
    }
    if (empty($Telephone)) {
        array_push($errors, "Plaese fill in telephone number!");
    }
    if (empty($Mobile)) {
        array_push($errors, "Plaese fill in mobile number!");
    }
    else
    {
        if (!is_numeric($Mobile)) {
            array_push($errors, "Invalid input for mobile number! Please enter numbers only ");  
        }
        else{
            if (strlen($Mobile) != 10) {
                array_push($errors, "Incorrect Mobile Number. Please insure you have entered 10 digits.");
            }
        }
    }
    if (empty($pass1)) {
        array_push($errors, "Password is required!");
    }
    else{
        if($passLength < 7){
            array_push($errors, "Password too short. Please enter more than 6 characters.");
        }
    }
    if ($pass1 != $pass2) {
        array_push($errors, "The passwords do not match!");
    }

    // Check if the username dosent already exist in the database
    $check_user = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($db, $check_user);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
        if ($user['Username'] === $username) {
            array_push($errors,"Username is taken. Please use a different username");
        }
    }

    // If no errors, register the user.
    if (count($errors) == 0) {
        $sql = "INSERT INTO users (username, password, FirstName, Surname, AddressLine1, AddressLine2,City,Telephone,Mobile)
        VALUES ('$username', '$pass1', '$FirstName', '$LastName', '$Address1', '$Address2', '$City', '$Telephone', '$Mobile')";
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}




// User Login 
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['login_username']);
    $password = mysqli_real_escape_string($db, $_POST['login_password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) == 1) 
    {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }
    else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}


?>
