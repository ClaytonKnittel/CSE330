<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Filesharing</title>
    </head>
<body>

<?php

// for tracking which user is signed in
session_start();

if (isset($_GET['usr'])) {
    // coming from the login page, usr is set in get variable
    $login = $_GET['usr'];
}
else if(isset($_SESSION['usr'])){
    // coming from anywhere else, user is set as session variable
    $login = $_SESSION['usr'];
}
else{
    // Should not be able to get here
    print('invalid redirect');
    exit(-1);
}



// see if this is a valid user
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
else {
    $_SESSION['usr'] = $login;
}


// open directory with all of this user's files
$path = dirname(dirname(dirname(__DIR__))) . "/secure/module2/users/" . $login . "/";

if (!is_dir($path)) {
    // if this is their first time logging in, create a directory for them
    mkdir($path);
}

// button which redirects to the upload page
echo('<form action="upload.php"> <input type="submit" value="Upload a File" /> </form>');

// list of all uploaded files
echo('Files that you have uploaded:<br>' );

echo('<table style = "width: 100%"> <tr> <th>Table of files!</th> <th> Delete a file!</th> </tr>');

$files = array_slice(scandir($path), 2);

foreach ($files as $file){
    printf('<tr> <td align="center"><a href="viewing.php?file_to_open=%s">%s</a></td> <td align="center"><a href="delete.php?file=%s">Delete!</a></td></tr>', urlencode($file), $file, urlencode($file));
}

echo('</table>');

// link to logout
echo('<a href="logout.php">Logout</a>');



?>

</body>
</html>