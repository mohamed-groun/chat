<?php
require 'autoload.php';
$cnxPDO = connexionPDO::getInstance();
$prod= new inscription();

session_start();


$email=htmlentities($_POST['email']);
$mdp=((htmlentities($_POST['mdp'])));
$produits= $prod->selectByemail($email,$mdp);
echo $mdp ;





if (!empty($produits)) {
	$_SESSION['user'] = $email;
	
	$destination = 'adminpage.php';
} else {
	$_SESSION['error'] = "LOGIN OU MOT DE PASSE D ADMINISTRATEUR INCORRECT";
	$destination = '../index.php';
}
header("location:".$destination);

/* if( empty($email) || empty($mdp)  )
{
    echo " <b>You did not fill out the required fields </b>";
}
else {
	$_SESSION['user']=$email;
    $produits= new inscription();
    $produits->selectByemail($email,$mdp);
    $row = mysql_fetch_row($produits);
    
header('location:../index.php');

}*/
?>