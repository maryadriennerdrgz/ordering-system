<?php
include('config/constants.php');
include('functions.php');
unset($_SESSION['username']);
unset($_SESSION['id']);
unset($_SESSION['cart']);
header('location:index.php');
die();
?>