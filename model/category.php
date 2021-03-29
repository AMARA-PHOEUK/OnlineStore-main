<?php
    require_once('./model/db.php');
 

    class Category extends DataBase{
        protected int $id;
        protected string $name;
   
        /**
         * Getter pour l'id
         */
        public function getCatId() {
            return $this->id;
        }

        /**
         * Setter pour l'id
         */
        public function setCatId($id) {
            $this->id = $id;
        }

        /**
         * Getter nam
         */
        public function getCatName(){
            return $this->name;
        }

        /**
         * Setter pour le nom
         */
        public function setCatName($name){
            $this->name = $name;
        }

         // Création d'une catégorie
         public function createCategory($name){
            $bdd = $this-> dbConnect();
            $req = $bdd->prepare("INSERT INTO categories ( name) VALUES (:name) ");
            $req->execute(['name'=>$name]);
        }

        
        /**
         * Retourne toues les categories
         * 
         * IN: Rien
         * 
         * OUT: Tablerau contenant des classes category
         */
        public function  getAllCategories(){      
            $bdd = $this->dbConnect();
            $categories =  $bdd
                ->query("SELECT * FROM categories ")
                ->fetchAll(PDO::FETCH_CLASS, 'Category');
            return $categories;
        }

         // Recherche du nom category par id
         public function  getCatNameById($id){      
            $bdd = $this->dbConnect();
            $req =  $bdd->prepare("SELECT * FROM categories WHERE id = :id");
            $req->execute(['id'=>$id]);
            $req->setFetchMode(PDO::FETCH_CLASS, 'Category');    
            $reponse= $req->fetch();
            return $reponse->getCatName();
        }
        // Update / Modifier category
        public function updateCategory($id, $name){
            $bdd = $this->dbConnect();
            $req =  $bdd->prepare("UPDATE categories SET name=:name WHERE id = :id");
            $req->execute(['id'=>$id, 'name'=>$name]);
        }    

        // DELETE/Effacer catégorie
        public function deleteCategory($id){
            $bdd = $this-> dbConnect();
            $req = $bdd->prepare("DELETE FROM categories WHERE  id=:id ");
            $req->execute(['id'=>$id]);
        }
    }
?>
