<?php
    require_once "model/db.php";

    class Users extends DataBase{
        protected int $id;
        protected string $name;
        protected string $firstname;
        protected string $email;
        protected string $password;
        protected int $statut_id;
    
        /**
        * Getter pour l'id
        */
        public function getId() {
            return $this->id;
        }

        /**
        * Setter pour l'id
        */
        public function setId($id) {
            $this->id = $id;
        }

        // Getter name
        public function getName(){
            return $this->name;
        }
        // Setter Name
        public function setName($name){
            $this->name = $name;
        }

        // Getter firstName
        public function getFirstName(){
            return $this->firstName;
        }
        // Setter firstname
        public function setFirstName($firstName){
            $this->firstname = $firstName;
        }
        // Getter description
        public function getEmail(){
            return $this->email;
        }
        // Setter description
        public function setEmail($email){
            $this->email = $email;
        }
        // Getter password
        public function getPassword(){
            return $this->password;
        }
        // Setter password
        public function setQuantity($password){
            $this->password = $password;
        }
        // Getter statut Statut id
        public function getStatutId(){
            return $this->statutId;
        }
        // Setter unit Statut Id
        public function setStatutId($statutId){
            $this->statutId = $statutId;
        }
        // Create / Research/ Update / Delete
        // Afficher la liste de tout les user
        public function  getAllUsers(){      
            $bdd = $this->dbConnect();
            $users =  $bdd
                ->query("SELECT * FROM users ")
                ->fetchAll(PDO::FETCH_CLASS, 'users');
            return $users;
        }
        // Trouver un product par son ID
        public function  getUserById($id){      
            $bdd = $this->dbConnect();
            $req =  $bdd->prepare("SELECT * FROM users WHERE id = :id");
            $req->execute(['id'=>$id]);
            $req->setFetchMode(PDO::FETCH_CLASS, 'users');    
            $user= $req->fetch();
            return $user;
        }
    }

?>