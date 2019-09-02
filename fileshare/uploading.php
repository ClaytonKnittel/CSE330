<?php

$file = $_FILES['uploadedfile'];
echo ('Uploading ' . $file['name'] . ':<br>'); 
echo ($file['tmp_name']);

?>