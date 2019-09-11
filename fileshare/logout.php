<?php

session_start();

$_SESSION = array();
// logs user out
session_destroy();

// back to login page
header("Location: index.html");
die();

?>