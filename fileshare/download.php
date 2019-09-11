<?php

session_start();

if(!isset($_SESSION['usr']) || !isset($_GET['file'])){
    header("Location: index.html");
    die();
}

$login = $_SESSION['usr'];

$file = $_GET['file'];

$loc = dirname(dirname(dirname(__DIR__))) . "/secure/module2/users/" . $login . "/" . $file;

// https://stackoverflow.com/questions/38180690/how-to-force-download-different-type-of-extension-file-php
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');

header('Content-Disposition: attachment; filename="' . $file . '"');

readfile($loc);

?>