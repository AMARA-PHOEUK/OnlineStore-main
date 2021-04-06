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
        require_once "view/users/listuser.php";
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
        $user = $modeleUser->connectUser($email,$password);
        if (!empty($user)) {
                
                $_SESSION['statutId'] = $user->getStatutId();
                $_SESSION['curUserId'] = $user->getUserId();
                $_SESSION['name'] = $user->getUserName();
                $_SESSION['firstName'] = $user->getUserFirstName();

                echo "<p> Connexion réussi. </p>";
                header( "location: index.php?action=showUserById");
                      
        } else {
             echo "<p>Email ou Mot de passe incorrect pas trouvé</p>";
            }
 
        
        // 3°) Si OK alors init $_SESSION
            // $_SESSION['statutId'];
            // $_SESSION['curuserId'];
            
        // 4°) Redirection sur home
    }

    function logout() {
        unset($_SESSION['statutId']);
        unset($_SESSION['curuserId']);
        setcookie("PHPSESSID", '', time()-3600);
        header( "location: index.php");
    }
?>

