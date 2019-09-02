<!doctype html>
<header>
    <title>Calculator</title>
</header>

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
    <input type="text" name="v1">
    <select name="op">
<?php
    $array = array(
        "+" => '<option value="+">+</option>',
        "-" => '<option value="-">-</option>',
        "*" => '<option value="*">*</option>',
        "/" => '<option value="/">/</option>'
    );
    if (isset($_GET["op"])) {
        $array[$_GET["op"]] = '<option value="' . $_GET["op"] . '" selected>' . $_GET["op"] . '</option>';
    }
    foreach ($array as $opt) {
        echo($opt);
    }
?>
    </select>
    <input type="text" name="v2">
    <input type="submit" value="=">
</form>

</body>
</html>