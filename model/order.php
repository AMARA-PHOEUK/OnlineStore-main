<?php
    require_once "model/db.php";
    class Order extends DataBase{
        protected  $orderId;
        protected  $customerId;
        protected $orderDate;
        protected  $orderTotal;
        protected  $shipStatut;
        protected  $payStatut;

        public function getOrderId() {
            return $this->orderId;
        }
        public function setOrderId($orderId) {
            $this->orderId = $orderId;
        }

        public function getCustomerId() {
            return $this->customerId;
        }
        public function setCustomerIdId($customerId) {
            $this->customerId = $customerId;
        }

        public function getOrderDate(){
            return $this->orderDate;
        }
        public function setOrderDate($orderDate){
            $this->orderDate = $orderDate;
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
        }

 
    }
?>