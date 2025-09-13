<?php
session_start();
session_destroy();
header('Location: /Extra/Biblioteca/telas/login.php');
exit();
