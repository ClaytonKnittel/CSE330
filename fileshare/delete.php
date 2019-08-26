<?php

session_start();

if (!isset($_SESSION['usr'])) {
    header("Location: index.html");
    die();
}
else if (!isset($_GET['file'])) {
    header("Location: filesharing.php");
    die();
}

$login = $_SESSION['usr'];

$file_to_delete = $_GET['file'];

$path = dirname(dirname(dirname(__DIR__))) . "/secure/module2/users/" . $login . "/" .$file_to_delete;

if (file_exists($path)) {
    unlink($path);
}

header("Location: filesharing.php");
die();



?>