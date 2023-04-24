<?php

include_once "connect.php";
//Destroi a sessão e volta para index
session_start();
session_destroy();
header('location:../index.php');

?>
