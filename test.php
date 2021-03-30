<?php 
// *******************TEST temporaire**************************************
// CONNEXION FORCEE RAJOUTER LA FONCTION CONNEXION PLUS TARD
$_SESSION['statutId'] = 2;
require_once "control/ctrl-order.php";
require_once "model/order.php";
require_once "model/orderlines.php";
// erreur erase order voir plus tard

$order66 = new Orderline();
$req = $order66->getPriceByProductId(2);
var_dump($req);


// $order65 = new Order();
// $order65->getOrderById(2);
// calculer total dans le modele getTotalByProduct()
// get quantité update quantité INNERJOIN



// ********************************************************************
?>