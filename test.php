<?php 
// *******************TEST temporaire**************************************
// CONNEXION FORCEE RAJOUTER LA FONCTION CONNEXION PLUS TARD
if (empty($_SESSION['statutId'])){
    $_SESSION['statutId'] = 0;
}
require_once "control/ctrl-order.php";
require_once "model/order.php";



// ********************************************************************
?>