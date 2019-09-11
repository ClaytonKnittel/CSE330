<!doctype html>
<html lang="en-US">
<head>
    <title>Calculator</title>
</head>

<body>

<?php

if (isset($_GET['v1']) && isset($_GET['v2']) && isset($_GET['op'])) {
    $v1 = $_GET['v1'];
    $v2 = $_GET['v2'];
    $op = $_GET['op'];

    if (!is_numeric($v1) || !is_numeric($v2)) {
        echo("You must enter numbers!<br>");
    }
    else {
        switch($op) {
            case "+":
                $res = $v1 + $v2;
                break;
            case "-":
                $res = $v1 - $v2;
                break;
            case "*":
                $res = $v1 * $v2;
                break;
            case "/":
                if ($v2 == "0") {
                    if ($v1 == "0") {
                        $res = "NAN";
                    }
                    else {
                        $res = "INF";
                    }
                }
                else {
                    $res = $v1 / $v2;
                }
                break;
            default:
                $res = "undef";
                break;
        }

        echo("The result:<br>" . $v1 . " " . $op . " " . $v2 . " = " . $res);
        
    }
}

?>

<form>
    <table>
        <tr>
        <th>
            <input type="text" name="v1">
        </th>
        <th style="text-align: left;">
<?php
    $array = array(
        "+" => '<input type="radio" name="op" value="+">+<br>',
        "-" => '<input type="radio" name="op" value="-">-<br>',
        "*" => '<input type="radio" name="op" value="*">*<br>',
        "/" => '<input type="radio" name="op" value="/">/<br>'
    );
    if (isset($_GET["op"])) {
        $array[$_GET["op"]] = '<input type="radio" name="op" value="' . $_GET["op"] . '" checked>' . $_GET["op"] . '<br>';
    }
    foreach ($array as $opt) {
        echo($opt);
    }
?>
        </th>
        <th>
            <input type="text" name="v2">
        </th>
        <th>
            <input type="submit" value="=">
        </th>
        </tr>
    </table>
</form>

</body>
</html>