<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Filesharing</title>
    </head>
<body>

<?php

session_start();

if (isset($_GET['usr'])) {
    $login = $_GET['usr'];
}
else if(isset($_SESSION['usr'])){
    $login = $_SESSION['usr'];
}
else{
    print('invalid redirect');
    exit(-1);
}




$h = fopen(dirname(dirname(dirname(__DIR__))) . "/secure/module2/users.txt", "r");

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

else{
    $_SESSION['usr'] = $login;
}



$path = dirname(dirname(dirname(__DIR__))) . "/secure/module2/users/" . $login . "/";

if (!is_dir($path)) {
    mkdir($path);
}


echo('<form action="upload.php"> <input type="submit" value="Upload a File" /> </form>');

echo('Files that you have uploaded:<br>' );

echo('<table style = "width: 100%"> <tr> <th>Table of files!</th> <th> Delete a file!</th> </tr>');

$files = array_slice(scandir($path), 2);

foreach ($files as $file){
    printf('<tr> <td align="center"><a href="viewing.php?file_to_open=%s">%s</a></td> <td align="center"><a href="delete.php?file=%s">Delete!</a></td></tr>', urlencode($file), $file, urlencode($file));
}

echo('</table>');



?>

</body>
</html>