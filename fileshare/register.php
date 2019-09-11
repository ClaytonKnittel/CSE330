<?php

if (!isset($_POST['new_usr']) || !isset($_POST['new_pswd'])){
    header("Location: index.html");
    die();
} 

$new_username = $_POST['new_usr'];
$new_password = password_hash($_POST['new_pswd'], PASSWORD_BCRYPT);

// now append this new username to users.txt so that they can be registered and login 

$users_txt = dirname(dirname(dirname(__DIR__))) . "/secure/module2/users.txt";
$u = fopen($users_txt, "a");
if (filesize($users_txt) > 0) {
    fwrite($u, "\n");
}
fwrite($u, $new_username);
fclose($u);

$passwords_txt = dirname(dirname(dirname(__DIR__))) . "/secure/module2/passwords.txt";
$p = fopen($passwords_txt, "a");
if (filesize($passwords_txt) > 0) {
    fwrite($p, "\n");
}
fwrite($p, $new_password);
fclose($p);

header("Location: index.html");
die();

?>