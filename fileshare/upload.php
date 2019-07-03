<?php

if (!isset($_GET['usr'])) {
    exit(-1);
}

$login = $_GET['usr'];

$h = fopen("/home/ClaytonKnittel/secure/module2/users.txt", "r");

$is_user = FALSE;

while( !feof($h) ){
    $user = trim(fgets($h));
	if ($user == $login) {
        $is_user = TRUE;
        break;
    }
}

fclose($h);

if (!$is_user) {
    echo("you are not a user");
    exit(-2);
}

$path = "/home/ClaytonKnittel/secure/module2/users/" . $login . "/";

if (!is_dir($path)) {
    mkdir($path);
}



?>