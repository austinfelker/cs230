<?php

require 'dbhandler.php';
session_start();

define('KB', 1024); //variable used to designat the file size
define('MB', 1048576);

if (isset($_POST['prof-submit'])) { //taken from profile.php
    echo "awoidjaid";

    $uname = $_SESSION['uname']; //taken from the login helper
    $file = $_FILES['prof-image']; //taken from the profile.php. anytime we use the global variabel with [] we are typing in 'theNameOfTheVariable'
    $file_name = $file['name'];
    $file_tmp_name = $file['tmp_name'];
    $file_error = $file['error'];
    $file_size = $file['size'];

    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $allowed = array('jpg', 'jpeg', 'png', 'svg');

    if ($file_error !== 0) { //if there is a file error
        header("Location ../profile.php?error=UploadError");
        exit();
    }
    if (!in_array($ext, $allowed)) { //if not in array
        header("Location ../profile.php?error=InvalidType");
        exit();
    }
    if ($file_size > 4*MB) { //if file size > 4 MB
        header("Location ../profile.php?error=FileSizeExceeded");
        exit();
    }

        $new_name = uniqid('',true).".".$ext; //creates the name of the profile pic and appends 10 random chars at the end of it to add uniqueness
        $destination = '..profiles/'.$new_name; //variable for the location of the prof pic to the profiles folder
        $sql = "UPDATE profiles SET profpic='$destination' WHERE uname='$uname'"; //updates the profile in mysql
        mysqli_query($conn, $sql);
        move_uploaded_file($file_tmp_name, $destination);

        header("Location ../profile.php?success=UploadWin");
        exit();

}
else {
    echo "FAIL";
    header("Location ../profile.php");
    exit();

}

?>