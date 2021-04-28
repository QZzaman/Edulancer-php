<?php

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire');
session_start();


$username = "";
$Email = "";
$City = "";
$University = "";
$Department = "";
$Phone = "";
$Gender = "";
$subject_code = "";
$errors = array();


// $user= 'root';
// $pass= '';
// $db='atik_pasha';
// $db= new mysqli('localhost',$user,$pass,$db) or die ("unable to connect");


$db = mysqli_connect('localhost', 'root', '', '011161254');


if (isset($_POST['register'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $Email = mysqli_real_escape_string($db, $_POST['Email']);


    $City = mysqli_real_escape_string($db, $_POST['City']);


    $University = mysqli_real_escape_string($db, $_POST['University']);


    $Department = mysqli_real_escape_string($db, $_POST['Department']);


    $Phone = mysqli_real_escape_string($db, $_POST['Phone']);


    $Gender = mysqli_real_escape_string($db, $_POST['Gender']);
    //$subject_code = mysqli_real_escape_string($db, $_POST['subject_code']);


    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($Email)) {
        array_push($errors, "Email is required");
    }

    if (empty($City)) {
        array_push($errors, "City is required");
    }
    if (empty($University)) {
        array_push($errors, "University is required");
    }
    if (empty($Department)) {
        array_push($errors, "Department is required");
    }
    if (empty($Phone)) {
        array_push($errors, "Phone is required");
    }

    if (empty($Gender)) {
        array_push($errors, "Gender is required");
    }


    //
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }


    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }


    if (count($errors) == 0) {
        $password = md5($password_1);

        $sql = "INSERT INTO learner (user_name_L, email, city,university,department,phone_number,gender,password) 
  	
  	VALUES('$username', '$Email', '$City', '$University',  '$Department', '$Phone','$Gender', '$password')";


        mysqli_query($db, $sql);


        $_SESSION['username'] = $username;

        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');


    }


}


if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {

        $password = md5($password); //encription password

        $query = "SELECT * from learner where user_name_L='$username' and password='$password' ";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1) {


            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');


        } else {


            array_push($errors, "username/password are wrong");


        }


    }


}


//logout er jonno
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');


}


?>





















