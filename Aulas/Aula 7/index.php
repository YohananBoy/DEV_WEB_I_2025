<?php
    // define('pi', 3.14);
    // echo pi;

    //print_r(get_defined_functions());

    // $a = 5;

    // if($a > 2) :
    //     echo "maior que 2<br/>";
    //     echo "oi<br/>";
    // elseif ($a < 2) :
    //     echo "oi2<br/>";
    // endif;

    // switch($a) :
    //     case 2: echo "a";
    //     case 5: echo "aa";
    //     break;
    //     default: "aaaaaaaaaaaaaaaaaaaaaaaaa";
    // endswitch;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asJDHAUSHD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <label>Num 1:</label>
        <input type="number" name="num1" id="num1">
        <label>Num 2:</label>
        <input type="number" name="num2" id="num2">
        <label>Op:</label>
        <select name="op" id="op">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <button type="submit">=</button>
    </form>

    <a href="login.php">login</a>
    <?php
    if(isset($_POST["num1"]) && isset($_POST["num2"])) {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $op = $_POST["op"];

        $resultado;

        switch($op) : 
            case "+" : $resultado = $num1 + $num2;
            break;
            case "-" : $resultado = $num1 - $num2;
            break;
            case "*" : $resultado = $num1 * $num2;
            break;
            case "/" : $resultado = $num1 / $num2;
        endswitch;

        echo $resultado;
    }
    ?>
</body>
</html>