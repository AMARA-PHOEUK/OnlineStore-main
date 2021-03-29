<?php
require_once "control/ctrl-category.php";
require_once "control/ctrl-product.php";
require_once "model/product.php";
require_once "control/ctrl-user.php";
session_start();
$titrePage = "MARA STORE : Home";
$content = "<h3>Contenu specifique</h3>";
require "views/template.php";


// *******************TEST temporaire**************************************

function home() {
    require_once "views/view-vide-a-reutiliser.php";
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
            // **************************Categorie****************************** 
        case 'allCat':
            showAllCategories();
            break;
        case 'catId':
            $catId = $_POST['catId'];
            echo "hello tu recherche ", $catId;
        
            break;
        case 'updateCat':
            $catId = htmlspecialchars($_GET['id']);
            updateCat($catId);
            break;
        case 'updatedCatName':
            $catId = htmlspecialchars($_GET['id']);
            $catName = htmlspecialchars($_POST['newName']);
            updateCatName($catId, $catName);
            break;
        case 'deleteCat':
            $catId = htmlspecialchars($_GET['id']);
            deleteCat($catId);
            break;
        case 'newCat':
            newCat();
            break;
        case 'addNewCat':
            $catName = htmlspecialchars($_POST['newName']);
            addNewCat($catName);
            break;
            // **************************product******************************
        case 'allProducts':
            showAllProducts();
            break;

        case 'updateProductForm':
            $productId = htmlspecialchars($_GET['id']);
            updateProductForm($productId);
            break;
        case 'updateProduct':
            $productId = htmlspecialchars($_GET['id']);
            $productName = htmlspecialchars($_POST['name']);
            $productCategoryId = htmlspecialchars($_POST['category_id']);
            $productQuantity = htmlspecialchars($_POST['quantity']);
            $productUnitPrice = htmlspecialchars($_POST['unit_price']);
            $productDescription = htmlspecialchars($_POST['description']);
            $productPhoto = htmlspecialchars($_POST['photo']);
            updateProduct($productId, $productName,$productCategoryId, $productQuantity, $productUnitPrice, $productDescription, $productPhoto);
            break;    

        case 'deleteProduct':
            $productId = htmlspecialchars($_GET['id']);
            removeProduct($productId);
            break;
        case 'newProductForm':
            newProductForm();
                break;
        case 'createProduct':
            $productName = htmlspecialchars($_POST['name']);
            $productCategoryId = htmlspecialchars($_POST['category_id']);
            $productQuantity = htmlspecialchars($_POST['quantity']);
            $productUnitPrice = htmlspecialchars($_POST['unit_price']);
            $productDescription = htmlspecialchars($_POST['description']);
            $productPhoto = htmlspecialchars($_POST['photo']);
            addProduct($productName,$productCategoryId, $productQuantity,
             $productUnitPrice, $productDescription, $productPhoto);
            break;        
        // ************************************USER*****************************************************
        case 'allUsers':
            showAllUsers();
            break;
        case 'deleteUser':
            $id = htmlspecialchars($_GET['id']);
            removeUser($id);
            break;
        case 'newUserForm':
            newUserForm();
            break;
        case 'addNewUser':
            $name = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['motdepasse']);
            $statut_id = htmlspecialchars($_POST['statut_id']);
            addUser($name, $firstname, $email, $password, $statut_id);
            break;
        case 'updateUserForm':
            $id = htmlspecialchars($_GET['id']);
            updateUserForm($id);
            break;
        case'updateUser':
            $id = htmlspecialchars($_GET['id']);
            $name = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['motdepasse']);
            $statut_id = htmlspecialchars($_POST['statut_id']);
            modifyUser($id, $name, $firstname , $email, $password, $statut_id);            
            break;
        case 'loginForm':
            loginForm();
            break;
        case 'login':
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            login($email, $password);
            break;
        case 'logout':
            logout();
            break;
        default:
            home();
        }
    }
    else {
    home();
}