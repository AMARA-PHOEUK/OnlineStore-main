<?php
    require_once "model/db.php";
    class Order extends DataBase{
        protected int $orderId;
        protected int $customerId;
        protected $orderDate;
        protected string $orderTotal;
        protected bool $shipStatut;
        protected bool $payStatut;

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
        // ************************Trouver TOUTES LES COMMANDES**************************
        public function getAllOrders(){
            $bdd = $this->dbConnect();
            $orders = $bdd
            ->query("SELECT * FROM orders")
            ->fetchAll(PDO::FETCH_CLASS, 'Order');
            return $orders;
        }
        // *********************TROUVER Toutes les COMMANDS LINES pour une  *****************************
        public function getAllLinesByOrderId($id){
            $bdd = $this->dbConnect();
            $req =  $bdd->prepare("SELECT * FROM order_lines WHERE orderId = :id");
            $req->execute(['id'=>$id]);
            $req->setFetchMode(PDO::FETCH_CLASS, 'Order');    
            $orderLines= $req->fetchAll();
            return $orderLines;
        }


        // ***********************Trouver UNE COMMANDE PAR son ID***********************
        function showOrderById($id){
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
            $req = $bdd->prepare("DELETE FROM order WHERE  id=:id ");
            $req->execute(['id'=>$id]);
            $req->closeCursor();
        }
    }
?>