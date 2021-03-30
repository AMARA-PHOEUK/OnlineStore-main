<?php 
    require_once "model/order.php";

    function showAllOrders(){
        $modelOrders = new Order();
        $orders = $modelOrders->getAllOrders();
        return $orders; // remplacer par View plus tard
    }

    function showOrderById($id){
        $modelOrders = new Order();
        $order = $modelOrders->getOrderById($id);
        return $order;// remplacer par view
    }

    function eraseOrder($id){
        $modelOrders = new Order();
        $order = $modelOrders->deleteOrder($id);
        // afficher à nouveau la note
    }

    function addOrder($customerId){
        $modelOrders = new Order();
        $modelOrders->createOrder($customerId);
        // ajouter une view ensuite
    }
// liste des méthodes
// getAllOrders();
// getOrderById($id);
// deleteOrder($id);
// updateOrder($id, $shipStatut, $payStatut);
// createOrder($customerId);


?>