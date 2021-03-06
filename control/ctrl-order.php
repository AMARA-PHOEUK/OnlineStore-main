<?php 
    require_once "model/order.php";
// *********************************COMMANDES******************************************************
    function showAllOrders(){
        $modelOrder = new Order();
        $orders = $modelOrder->getAllOrders();
        // remplacer par View plus tard
        require_once "./views/order/orders_list.php";
    }

    function showOrderById($id){
        $modelOrder = new Order();
        $order = $modelOrder->getOrderById($id);
        return $order;// remplacer par view
    }

    function eraseOrder($id){
        $modelOrder = new Order();
        $order = $modelOrder->deleteOrder($id);
        
    }

    // créer commande
    function addOrder($customerId){
        $modelOrder = new Order();
        $orderId = $modelOrder->createOrder($customerId);
        $_SESSION['orderId'] = $orderId;
        // showAllOrders($orderId); utiliser cette fonction pour aider à valider le panier
        
    }

    // montrer le total dans la commande
    function showTotal($id){
        $modelOrder = new Order();
        $stringTotal = $modelOrder->GetTotalByOrder($id);
        $total = (float)$stringTotal['total'];
    }


// **************************************ORDERLINE***************************************************************

    // rajouter OrderLine
    function addOrderLine($orderLineCommandId, $orderLineProductId,$orderLineQuantity){ 
        $modelOl = new Orderline();
        $modelOl->createOrderLine($orderLineCommandId, $orderLineProductId,$orderLineQuantity );
        showAllOrderLineByOrder($_SESSION['orderId']);
        // afficher toutes les lignes ensuites;

    }

    // montrer tout les lignes par commande
    function showAllOrderLineByOrder($orderId){
        $modelOrderLine = new Orderline();
        $orders = $modelOrderLine->getAllLinesByOrderId($orderId);
        require_once "./views/order/orderlines_list.php";
    }

    function searchTotalByLine($orderId){
        $modelOrderLine = new Orderline();
        $total = $modelOrderLine->getTotalByLine($orderId);
        return $total['total'];
    }

