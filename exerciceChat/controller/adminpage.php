
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:Accueil.php");}
else {
	echo 'Bienvenu '.$_SESSION['user'];
	echo("<br><br>");
 require 'autoload.php';
 $cnxPDO = connexionPDO::getInstance();
 $prod= new messages();
 $produits= $prod->select();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <meta charset="utf-8" />
 <title>Accueil</title>
 </head>
 <body class="container">

 
 <form action="/exerciceChat/controller/action2.php" method="post">
				Message <input type="text" name="email" placeholder="Username" id="username" required>
				<input type="submit">
				
				<br><br>
 <table class="table">

 <?php foreach($produits as $produit) { ?>
 
 
   <tbody>
     <tr>
       <th scope="row"></th>
       <td> le <?=$produit->date_msg?></td>
       <td><?=$produit->pseudo_utilisateur ?> a ecrit </td>
       <td><?=$produit->message	 ?></td>
     
        <td><a href="/exerciceMVC/controller/Delete.php?id=<?=$produit->id ?>"> Delete </a></td>
     </tr>
    
   </tbody>
   <?php } ?>
 </table>
 <div>
 <a href="deconnexion.php">deconnexion </a> 
 </div>
 </body>
 </html>
 <?php } ?>

