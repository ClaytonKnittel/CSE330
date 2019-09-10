<?php
// keep session alive
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Filesharing</title>
</head>

<body>

<form enctype="multipart/form-data" action="uploading.php" method="POST">
    <p>
        <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
        <label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
    </p>
    <p>
        <input type="submit" value="Upload File" />
    </p>
</form>

</body>
</html>