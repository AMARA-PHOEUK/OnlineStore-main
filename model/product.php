<?php
    require_once "model/db.php";
    const DEC = 0;
    const INC = 1;
    class Product extends DataBase{
        protected int $id_prod;
        protected string $name;
        protected int $category_id;
        protected int $quantity;
        protected string $unit_price;
        protected string $description;
        protected string $photo;

        /**
        * Getter pour l'id
        */
        public function getProductId() {
            return $this->id_prod;
        }

        /**
        * Setter pour l'id
        */
        public function setProductId($id) {
            $this->id_prod = $id;
        }

        // Getter name
        public function getProductName(){
            return $this->name;
        }
        // Setter Name
        public function setProductName($name){
            $this->name = $name;
        }

        // Getter category_id
        public function getCategory_id(){
            return $this->category_id;
        }
        // Setter category_id
        public function setCategory_id($category_id){
            $this->category_id = $category_id;
        }

        // Getter quantity
        public function getQuantity(){
            return $this->quantity;
        }
        // Setter quantity
        public function setQuantity($quantity){
            $this->quantity = $quantity;
        }
        // Getter unit Price
        public function getUnitPrice(){
            return $this->unit_price;
        }
        // Setter unit Price
        public function setUnitPrice($unitPrice){
            $this->unit_price = $unitPrice;
        }
        // Getter description
        public function getDescription(){
            return $this->description;
        }
        // Setter description
        public function setdescription($description){
            $this->description = $description;
        }
        // Getter unit Price
        public function getPhoto(){
            return $this->photo;
        }
        // Setter unit Price
        public function setPhoto($photo){
            $this->photo = $photo;
        }

        // Création d'une produit
        function createProduct($productName,$category_id,
        $quantity, $unit_price, $description, $photo){
            $reqSql = "INSERT INTO products 
                (name, category_id , quantity, unit_price, description, photo) 
                VALUES ( :name, :category_id, :quantity, :unitPrice, :description, :photo )";
            $bdd = $this->dbConnect();
            $sql = $bdd->prepare($reqSql);
            $sql->execute(['name' => $productName,'category_id'=>$category_id,
            'quantity' => $quantity,'unitPrice' => $unit_price,
             'description' => $description,'photo' => $photo]);
        }
 
        // Update / Modifier category
        public function updateProduct($productId, $name,$categoryId, $quantity, $unitPrice, $description, $photo){
            $bdd = $this->dbConnect();
            $req =  $bdd->prepare("UPDATE products SET
             name=:name,
              category_id= :catid,
               quantity= :qte,
                unit_price= :unitPrice,
                 description= :descript,
                  photo= :image
                   WHERE id_prod = :id");
            $req->execute(['id'=>$productId,'name'=>$name, 'categoryId'=>$categoryId, 'quantity'=> $quantity,
             'unitPrice'=> $unitPrice ,
                'description'=> $description,
                 'photo' => $photo]);
        }    

        // Afficher tout les produits
        public function  getAllProducts(){      
            $bdd = $this->dbConnect();
            $products =  $bdd
                ->query("SELECT * FROM products ")
                ->fetchAll(PDO::FETCH_CLASS, 'product');
            return $products;
        }
        // Afficher tout les produits par catégorie
        public function  getAllProductsByCat($id){      
            $bdd = $this->dbConnect();
            $req =  $bdd->prepare("SELECT * FROM products WHERE category_id = :id");
            $req->execute(['id'=>$id]);
            $req->setFetchMode(PDO::FETCH_CLASS, 'Product');    
            $products= $req->fetch();
            return $products;
        }
        // Trouver un product par son ID
        public function  getProductById($id){      
            $bdd = $this->dbConnect();
            $req =  $bdd->prepare("SELECT * FROM products WHERE id_prod = :id");
            $req->execute(['id'=>$id]);
            $req->setFetchMode(PDO::FETCH_CLASS, 'Product');    
            $reponse= $req->fetch();
            return $reponse;
        }

            // DELETE/Effacer 
        public function deleteProduct($id){
            $bdd = $this->      dbConnect();
            $req = $bdd->prepare("DELETE FROM products WHERE  id_prod =:id ");
            $req->execute(['id'=>$id]);
            $req->closeCursor();
        }

           // OBTENIR LA QUANTITE PAR ID
    public function getProductQteById($id): int{
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT 
        quantity
        FROM products
        WHERE id_prod = :id ");
        $req->execute(['id'=>$id]);
        $rep= $req->fetch();
        return $rep['quantity'];
    } 

    public function updateProductQteById($id, $newQte, $operation){
         // 1°) Récupere la qte ens tock du produit
        $qte = $this->getProductQteById($id);
        $bdd = $this->dbConnect();
        $req =  $bdd->prepare("UPDATE products SET
        quantity = :newQte
        WHERE id_prod = :id");

        // 2°) Calculer la nouvelle Qte (+ ou -) en fonction de operation (INC / DEC)
        if ($operation == DEC){
            $qte -= $newQte;
        } else {
            $qte += $newQte;
        };
        $req->execute(['id'=>$id,
        'newQte'=> $qte]);        
    }
}

 
