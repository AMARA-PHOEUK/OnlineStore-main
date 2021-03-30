<?php
    class Orderline extends DataBase{
        private $orderLineId;
        private $orderLineCommandId;
        private $orderLineProductId;
        private $orderLineQuantity;
        
        public function getOrderLineId() {
            return $this->orderLineId;
        }
        public function setOrderLineId($orderLineId) {
            $this->orderLineId = $orderLineId;
        }

        public function getOrderLineCommandId() {
            return $this->orderLineCommandId;
        }
        public function setOrderLineCommandId($orderLineCommandId) {
            $this->orderLineCommandId = $orderLineCommandId;
        }

        public function getOrderLineProductId() {
            return $this->orderLineProductId;
        }
        public function setOrderLineProductId($orderLineProductId) {
            $this->orderLineProductId = $orderLineProductId;
        }

        public function getOrderLineQuantity() {
            return $this->orderLineQuantity;
        }
        public function setOrderLineQuantity($orderLineQuantity) {
            $this->orderLineQuantity = $orderLineQuantity;
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
        $req =  $bdd->prepare("SELECT * FROM order_lines WHERE orderId = :id");
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

           // OBTENIR LA QUANTITE PAR ID
           public function getQteById($id){
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT 
            quantity
            FROM order_lines 
            WHERE id = :id ");
            $req->execute(['id'=>$id]);
            $order= $req->fetch();
            return $order;
         
        } 

        // OBTENIR LE TOTAL PAR PRODUIT
        public function getPriceByProductId($id){
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT unit_price,
            order_lines.quantity
            FROM products INNER JOIN
            order_lines 
            WHERE products.id_prod = order_lines.productId 
            AND id_prod = :id ");
            $req->execute(['id'=>$id]);
            $order= $req->fetch();
            return $order;
        } 


        public function getTotalByOrder(){
                
        }
}

?>