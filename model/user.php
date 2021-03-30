<?php
    require_once "model/db.php";

    class User extends DataBase {
        protected int $id;
        protected string $name;
        protected string $firstname;
        protected string $email;
        protected string $password;
        protected int $statut_id;

        /**
        * Getter pour l'id
        */
        public function getUserId() {
            return $this->id;
        }

        /**
        * Setter pour l'id
        */
        public function setUserId($id) {
            $this->id = $id;
        }

        // Getter name
        public function getUserName(){
            return $this->name;
        }
        // Setter Name
        public function setUserName($name){
            $this->name = $name;
        }

        // Getter firstName
        public function getUserFirstName(){
            return $this->firstname;
        }
        // Setter firstname
        public function setUserFirstName($firstName){
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
        public function setPassword($password){
            $this->password = $password;
        }
        // Getter statut Statut id
        public function getStatutId(){
            return $this->statut_id;
        }
        // Setter unit Statut Id
        public function setStatutId($statutId){
            $this->statut_id = $statutId;
        }
        // Create / Research/ Update / Delete
        // Afficher la liste de tout les user
        public function  getAllUsers(){      
            $bdd = $this->dbConnect();
            $users =  $bdd
                ->query("SELECT * FROM users ")
                ->fetchAll(PDO::FETCH_CLASS, 'User');
            return $users;
        }
        // Trouver un product par son ID
        public function  getUserById($id){      
            $bdd = $this->dbConnect();
            $req =  $bdd->prepare("SELECT * FROM users WHERE id = :id");
            $req->execute(['id'=>$id]);
            $req->setFetchMode(PDO::FETCH_CLASS, 'User');    
            $user= $req->fetch();
            return $user;
        }
        // Effacer User
        public function deleteUser($id){
            $bdd = $this->      dbConnect();
            $req = $bdd->prepare("DELETE FROM users WHERE  id =:id ");
            $req->execute(['id'=>$id]);
            $req->closeCursor();
        }        
        // Ajouter user
        public function createUser($name, $firstname, $email, $password, $statutId){
            $reqSql = "INSERT INTO users
            (name, firstname, email, password, statut_id) VALUES (:name, :firstname, :email, :password, :statutid)";
            $bdd = $this->dbConnect();
            $sql = $bdd->prepare($reqSql);
            $sql-> execute(['name' => $name, 'firstname' => $firstname, 'email' =>$email, 'password' =>$password, 'statutid' => $statutId]);

        }
        // modifier user
        public function updateUser($id, $name, $firstname, $email, $password, $statutId){
            $reqSql = "UPDATE users SET name=:name, firstname=:firstname,
             email=:mail , password=:password, statut_id=statutId statut_id WHERE id= :id
             ";
            $bdd = $this->dbConnect();
            $sql = $bdd->prepare($reqSql);
            $sql-> execute(['id'=> $id , 'name' => $name, 'firstname' => $firstname, 'email' =>$email, 'password' =>$password, 'statutId' => $statutId]);

        }

        public function connectUser($email, $password) {      
                $bdd = $this->dbConnect();
                $req =  $bdd->prepare("SELECT * FROM users WHERE email = :email AND password =:password");
                $req->execute(['email'=>$email, 'password'=>$password]);
                $req->setFetchMode(PDO::FETCH_CLASS, 'User');    
                $user= $req->fetchAll();
                return $user;
        } 
    }

?>
<!-- cookie time  -->