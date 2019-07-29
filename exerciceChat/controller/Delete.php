<?php
require 'autoload.php';
$cnxPDO = connexionPDO::getInstance();
echo($_GET['id']);
if(isset($_GET['id']) ) {
    $id = $_GET['id'];
  $produit = new inscription();
  $produit->deleteProduit($id);
}
header('location:../index.php');

