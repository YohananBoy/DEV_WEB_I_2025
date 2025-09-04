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
    <div class="login">
        <a href="login.php">Login</a> <a href="logout.php">Logout</a> <a href="damas.php">Damas</a>
    </div>

    </a>
    <br/>
    <?php 
    session_start();
    if(isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
        echo "Bem vindo(a) " . $_SESSION["login"]["user"] . "!";
    } else {
        header('Location: login.php');
        exit;
    }
    ?>
    <br/>
    <form action="" method="post">
        <label>Num 1:</label>
        <input type="number" name="num1" id="num1" required>
        <label>Num 2:</label>
        <input type="number" name="num2" id="num2" required>
        <label>Op:</label>
        <select name="op" id="op">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <button type="submit">=</button>
    </form>

    <?php
    if(isset($_POST["num1"]) && isset($_POST["num2"])) {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $op = $_POST["op"];

        $resultado;

        function soma($num1, $num2) {
            return $num1 + $num2;
        }

        function sub($num1, $num2) {
            return $num1 - $num2;
        }

        function mult($num1, $num2) {
            return $num1 * $num2;
        }

        function div($num1, $num2) {
            return $num1 / $num2;
        }

        switch($op) : 
            case "+" : $resultado = soma($num1,$num2);
            break;
            case "-" : $resultado = sub($num1,$num2);
            break;
            case "*" : $resultado = mult($num1,$num2);
            break;
            case "/" : $resultado = div($num1, $num2);
        endswitch;

        echo $resultado;
    }
    ?>
</body>
</html>