<?php 
// *******************TEST temporaire**************************************
// CONNEXION FORCEE RAJOUTER LA FONCTION CONNEXION PLUS TARD
$_SESSION['statutId'] = 2;
require_once "control/ctrl-order.php";

// erreur erase order voir plus tard

$order66 = new Order();
$req = $order66->getPriceByProductId(3);
var_dump($req);
echo( $req->);


// calculer total dans le modele getTotalByProduct()
// get quantité update quantité INNERJOIN



// ********************************************************************
?>