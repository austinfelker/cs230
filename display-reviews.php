<?php

$servename = "localhost";
$DBuname = "phpmyadmin";
$DBPass = "tdafkkc7";
$DBname = "cs230";

$conn = mysqli_connect($servename, $DBuname, $DBPass, $DBname);

if (!$conn) {
    die("Connection failed...".mysqli_connect_error());
    # code...
}

//usually you would just use the DB handler to do all this above code. but it isnt working for some reason
//so we are basically making a new connection to the phpmyadmin database to use to communicate
$item = $_GET['id'];


$sql = "SELECT * FROM reviews WHERE itemid='$item'";
$result = mysqli_query($conn, $sql); //inputs the sql statement into the database

if (mysqli_num_rows($result) > 0) { //if there is any outputs from the database
    while ($row = mysqli_fetch_assoc($result)) {//while there is still an output to process,
        $uname = $row['uname'];
        $propic = "SELECT profpic FROM profiles WHERE uname='$uname';"; //looks in the other profile table to get the profile pic of the user that made that review
        $res = mysqli_query($conn, $propic);
        $picpath = mysqli_fetch_assoc($res);
        echo '<div class="card mx-auto" style="width: 30%; padding: 5px; margin-bottom: 10px;">
        <div class="media">
            <img class="mr-3" src="'.$picpath['profpic'].'" style="max-width: 75px; max-height: 75px; border-radius: 50%;" >
            <div class="media-body">
                <h4 class="mt-0">' .$row['uname']. '</h4>
                <h5 style="color: red">Rating:'.$row['ratingnum'].'</h5>
                <p>'.$row['revdate'].'</p>
                <p>'.$row['reviewtext'].'</p>
            </div>
        </div>
    </div>';
    }
}
else {
    echo '<h5 style="text-align: center;">There are no reviews yet!</h5>';
}
