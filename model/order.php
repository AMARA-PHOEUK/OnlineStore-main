<?php
    require_once "model/db.php";
    class Order extends DataBase{
        protected  $id;
        protected  $customerId;
        protected $date;
        protected  $total;
        protected  $shipStatut;
        protected  $payStatut;
        protected $unit_price;
        protected $quantity;
        protected $order_line;

        public function getOrderId() {
            return $this->id;
        }
        public function setOrderId($id) {
            $this->id = $id;
        }

        public function getCustomerId() {
            return $this->customerId;
        }
        public function setCustomerIdId($customerId) {
            $this->customerId = $customerId;
        }

        public function getDate(){
            return $this->date;
        }
        public function setDate($date){
            $this->date = $date;
        }

        public function getOrderShipStatut(){
            return $this->shipStatut;
        }
        public function setOrderShipStatut($shipStatut){
            $this->shipStatut = $shipStatut;
        }

        public function getOrderPayStatut(){
            return $this->payStatut;
        }
        public function setOrderPayStatut($payStatut){
            $this->payStatut = $payStatut;
        }

        // testons ça
        // Getter unit Price
        public function getUnitPrice(){
            return $this->unit_price;
        }
        // Setter unit Price
        public function setUnitPrice($unitPrice){
            $this->unit_price = $unitPrice;
        }

        // Getter quantity
        public function getQuantity(){
            return $this->quantity;
        }
        // Setter quantity
        public function setQuantity($quantity){
            $this->quantity = $quantity;
        }

        //*********************************METHODES COMMANDES*************************************** */

        // ************************Trouver TOUTES LES COMMANDES**************************
        public function getAllOrders(){
            $bdd = $this->dbConnect();
            $orders = $bdd
            ->query("SELECT * FROM orders")
            ->fetchAll(PDO::FETCH_CLASS, 'Order');
            return $orders;
        }
    
        
        // ***********************Trouver UNE COMMANDE PAR son ID***********************
        function getOrderById($id){
            $bdd = $this->dbConnect();
            $req =  $bdd->prepare("SELECT * FROM orders WHERE id = :id");
            $req->execute(['id'=>$id]);
            $req->setFetchMode(PDO::FETCH_CLASS, 'Order');    
            $order= $req->fetch();
            return $order;
        }

       // DELETE/Effacer COMMANDE 
        public function deleteOrder($id){
            $bdd = $this->      dbConnect();
            $lines = $bdd->prepare("DELETE FROM orders WHERE  id=:id ");
            $lines->execute(['id'=> $id]);
            $lines->closeCursor();
        }

 

        // Update / Modifier commande
        public function updateOrder($id, $shipStatut, $payStatut){
            $bdd = $this->dbConnect();
            $req =  $bdd->prepare("UPDATE orders SET
            shipStatut = :shipStatut,
            payStatut = :payStatut
            WHERE id = :id");
            $req->execute(['id'=>$id,
            'shipStatut'=> $shipStatut ,
            'payStatut'=> $payStatut]);
        }            
        
        // Créer commande
        public function createOrder($customerId ){
            $reqSql = "INSERT INTO orders 
                (customerId, date, shipStatut, payStatut) 
                VALUES ( :customerId, NOW(), 0, 0)";
            $bdd = $this->dbConnect();
            $sql = $bdd->prepare($reqSql);
            $sql->execute(['customerId'=> $customerId]);
            return $bdd->lastInsertId();
        }

        public function getTotalByOrderTEST($orderId){
            
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT products.unit_price ,
        products.quantity 
        FROM products 
        INNER JOIN order_lines
        WHERE products.id_prod = order_lines.productId
        AND  products.id_prod = :id ");
        $req->execute(['id'=>$orderId]);
        // $req->setFetchMode(PDO::FETCH_CLASS, 'OrderLine');
        $orders= $req->fetchAll();
        var_dump($orders);
        foreach ($orders as $order){
            $line = new Orderline;
            $line = $order->getTotalByOrderLines();
            var_dump($line);

        }
    }
        public function GetTotalByOrder($orderId){
            $sqlReq = "SELECT SUM(products.unit_price * order_lines.quantity) as total
            FROM order_lines
            INNER JOIN products ON order_lines.productId = products.id_prod
            WHERE orderId = :orderId";
            $bdd = $this->dbConnect();
            $req = $bdd->prepare($sqlReq);
            $req->execute(['orderId'=>$orderId]);
            $order= $req->fetch();
            return $order;
            // return (floatval($order['quantity']) * floatval($order['price']));
        } 
    }

class Orderline extends DataBase{
    private $id;
    private $orderId;
    private $productId;
    private $quantity;
    private $name;

    public function getOrderLineId() {
        return $this->id;
    }
    public function setid($id) {
        $this->id = $id;
    }

    public function getOrderLineOrderId() {
        return $this->orderId;
    }
    public function setOrderLineCommandId($orderId) {
        $this->orderId = $orderId;
    }

    public function getOrderLineProductId() {
        return $this->productId;
    }
    public function setOrderLineProductId($productId) {
        $this->productId = $productId;
    }

    public function getOrderLineQuantity() {
        return $this->quantity;
    }
    public function setOrderLineQuantity($quantity) {
        $this->quantity = $quantity;
    }

     // Getter name
     public function getProductName(){
        return $this->name;
    }

    // ****************METHODES ORDERlINES*********************
public function getAllLines(){
    $bdd = $this->dbConnect();
    $orderLines = $bdd
    ->query("SELECT * FROM order_lines")
    ->fetchAll(PDO::FETCH_CLASS, 'OrderLine');
     return $orderLines;
}    

public function getAllLinesByOrderId($id){
    $bdd = $this->dbConnect();
    $req =  $bdd->prepare("SELECT * FROM order_lines 
    INNER JOIN products 
    ON order_lines.productId = products.id_prod 
    WHERE orderId = :id");
    $req->execute(['id'=>$id]);
    $req->setFetchMode(PDO::FETCH_CLASS, 'OrderLine');    
    $orderLines= $req->fetchAll();
    return $orderLines;
}


function showLineById($id){
    $bdd = $this->dbConnect();
    $req =  $bdd->prepare("SELECT * FROM order_lines WHERE id = :id");
    $req->execute(['id'=>$id]);
    $req->setFetchMode(PDO::FETCH_CLASS, 'OrderLine');    
    $orderLines= $req->fetch();
    return $orderLines;
}



// Créer commande
function createOrderLine($orderLineCommandId, $orderLineProductId,$orderLineQuantity ){
    $reqSql = "INSERT INTO order_lines 
        (orderId, productId, quantity) 
        VALUES ( :orderId, :productId, :quantity )";
    $bdd = $this->dbConnect();
    $sql = $bdd->prepare($reqSql);
    $sql->execute(['orderId'=> $orderLineCommandId, 'productId'=>$orderLineProductId, 'quantity'=>$orderLineQuantity]);
}   
//  DELETE ORDERLINE AU SINGULIER 
public function deleteOrderLineById($id){
    $bdd = $this->dbConnect();
    $lines = $bdd->prepare("DELETE FROM order_lines WHERE  id=:id ");
    $lines->execute(['id'=> $id]);
    $lines->closeCursor();
}    

// TOTAL par ligne
    public function getTotalByLine($orderlineId){
        $sqlReq = "SELECT (products.unit_price * order_lines.quantity) as total , products.name
        FROM order_lines
        INNER JOIN products ON order_lines.productId = products.id_prod
        WHERE order_lines.id = :orderlineId";
        $bdd = $this->dbConnect();
        $req = $bdd->prepare($sqlReq);
        $req->execute(['orderlineId'=>$orderlineId]);
        $order= $req->fetch();
        return $order;
    }

}
