<?php
session_start();
if (! isset($_SESSION["login"]) || $_SESSION["login"] == [] || empty($_SESSION["login"])) {
    header("Location: /Extra/Biblioteca/telas/login.php");
    exit;
}
