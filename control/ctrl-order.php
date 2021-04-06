<?php 
    require_once "model/order.php";

    function showAllOrders(){
        $modelOrder = new Order();
        $orders = $modelOrder->getAllOrders();
        return $orders; // remplacer par View plus tard
    }

    function showOrderById($id){
        $modelOrder = new Order();
        $order = $modelOrder->getOrderById($id);
        return $order;// remplacer par view
    }

    function eraseOrder($id){
        $modelOrder = new Order();
        $order = $modelOrder->deleteOrder($id);
        // afficher à nouveau la note
    }

    function addOrder($customerId){
        $modelOrder = new Order();
        $orderId = $modelOrder->createOrder($customerId);
        $_SESSION['orderId'] = $orderId;
        // require_once "./views/order/orderlist.php"; AFFICHER PLUS TARD LA LISTE DES COMMANDES
    }

    function showTotal($id){
        $modelOrder = new Order();
        $stringTotal = $modelOrder->GetTotalByOrder($id);
        $total = (float)$stringTotal['total'];
        
    }

    // rajouter OrderLine
    function addOrderLine($orderLineCommandId, $orderLineProductId,$orderLineQuantity){ 
        $modelOl = new Orderline();
        $modelOl->createOrderLine($orderLineCommandId, $orderLineProductId,$orderLineQuantity );
        // afficher toutes les lignes ensuites;

    }

    function showAllOrderLineByOrder($orderId){
        $modelOrderLine = new Orderline();
        $orders = $modelOrderLine->getAllLinesByOrderId($orderId);
        require_once "./views/order/orderlines_list.php";
    }
// liste des méthodes
// getAllOrders();
// getOrderById($id);
// deleteOrder($id);
// updateOrder($id, $shipStatut, $payStatut);
// createOrder($customerId);
