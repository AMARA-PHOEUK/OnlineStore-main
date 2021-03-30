<?php 
// *******************TEST temporaire**************************************
// CONNEXION FORCEE RAJOUTER LA FONCTION CONNEXION PLUS TARD
$_SESSION['statutId'] = 2;
// *********************
// test order 
// $commande = new Order();
// $com = $commande->showOrderById(2);
// var_dump($com);
$commande = new Order();
$com = $commande->getAllLinesByOrderId(2);
var_dump($com);



// ********************************************************************
?>