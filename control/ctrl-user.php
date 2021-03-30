<?php 
    require_once "model/user.php";

    function showAllUsers(){
        $modelUsers = new User();
        // $user = aray(User);
        $users = $modelUsers->getAllUsers();
        require_once "views/users/listusers.php";
}

    function showUserById($id){
        $modelUser = new User();
        $user = $modelUser->getUserById($id);
        return $user;
    }

    function removeUser($id){
        $modeleUser = new User();
        $modeleUser->deleteUser($id);
        header( "location: index.php?action=allUsers");
    }

    function newUserForm(){
        require_once "views/users/form_new_user.php";
    }
    function addUser($name, $firstname, $email, $password, $statut){
        $modeleUser = new User();
        $modeleUser->createUser($name, $firstname, $email, $password, $statut);
        header( "location: index.php?action=allUsers");
    }

    function updateUserForm($id){
        $user = showUserById($id);
        require_once "views/users/form_update_user.php";
    }

    function modifyUser($id, $name, $firstname , $email, $password, $statut_id){
        $modeleUser = new User();
        $modeleUser-> updateUser($id, $name, $firstname , $email, $password, $statut_id);
        header( "location: index.php?action=allUsers");
    }
    
    function loginForm(){
        require_once "views/users/login.php";
    }

    function login($email, $password){
        
        $modeleUser = new User();
        // 1°) $modelUser->getUserByemail()
            $req = $modeleUser->connectUser($email,$password);
        
        // 2°) Comparer paswword du Form averc pasword de la base
        
        // 3°) Si OK alors init $_SESSION
            $_SESSION['statutId'];
            $_SESSION['curuserId'];
            
        // 4°) Redirection sur home
    }

    function logout() {
        unset($_SESSION['statutId']);
        unset($_SESSION['curuserId']);
        setcookie("PHPSESSID", '', time()-3600);
        
    }
?>

