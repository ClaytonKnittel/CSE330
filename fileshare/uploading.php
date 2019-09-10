<?php

session_start();
$username = $_SESSION['usr'];

// Get the filename
$filename = basename($_FILES['uploadedfile']['name']);

$full_path = sprintf(dirname(dirname(dirname(__DIR__))). "/secure/module2/users/%s/%s", $username, $filename);

if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
   
	header("Location: filesharing.php");
    die();

    
}else{
    echo("could not upload file: " . $full_path);
    echo("<br><a href=\"filesharing.php\">Back to main menu</a>");
}


?>