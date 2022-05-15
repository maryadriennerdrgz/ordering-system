<?php
session_start();
$con=mysqli_connect("localhost","root","","hutapey");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/hutapey/');
define('SITE_PATH','http://localhost/hutapey/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>