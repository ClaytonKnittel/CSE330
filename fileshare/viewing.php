<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Filesharing</title>
    </head>
<body>

<?php

session_start();
$username = $_SESSION['usr'];

$file_name = $_GET['file_to_open'];

$path = dirname(dirname(dirname(__DIR__))) . "/secure/module2/users/" . $username . "/" . $file_name;

$file = fopen($path, 'r');

// dump file contents
while( !feof($file) ){
    $user = trim(fgets($file));
	printf('%s<br>', $user);
}

?>
</body>
</html>