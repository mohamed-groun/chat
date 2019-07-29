<?php
require 'autoload.php';
$cnxPDO = connexionPDO::getInstance();
$prod= new messages();
session_start();


$email=htmlentities($_POST['email']);
$date=date("Y-m-d");
$user=$_SESSION['user'];


$produits= $prod->addMessage($email,$date,$user);







	$destination = 'adminpage.php';

header("location:".$destination);