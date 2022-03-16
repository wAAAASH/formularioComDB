<?php
session_start();
unset($_SESSION['id_usuario']);
header("Location: http://localhost/cursophp/index.php");


?>