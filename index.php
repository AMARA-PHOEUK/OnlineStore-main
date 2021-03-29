<?php
require_once "control/ctrl-category.php";
require_once "control/ctrl-product.php";
require_once "model/product.php";

$titrePage = "MARA STORE : Home";
$content = "<h3>Contenu specifique</h3>";

require "views/template.php";

// *******************TEST PRODUCT**************************************


require_once " model/user.php";
$test = new Users();
$req = $test->getAllUsers();
var_dump($req);

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
            $productName =htmlspecialchars($_POST['name']);
            $productCategoryId =htmlspecialchars($_POST['category_id']);
            $productQuantity =htmlspecialchars($_POST['quantity']);
            $productUnitPrice =htmlspecialchars($_POST['unit_price']);
            $productDescription =htmlspecialchars($_POST['description']);
            $productPhoto =htmlspecialchars($_POST['photo']);
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
            $productName =htmlspecialchars($_POST['name']);
            $productCategoryId =htmlspecialchars($_POST['category_id']);
            $productQuantity =htmlspecialchars($_POST['quantity']);
            $productUnitPrice =htmlspecialchars($_POST['unit_price']);
            $productDescription =htmlspecialchars($_POST['description']);
            $productPhoto =htmlspecialchars($_POST['photo']);
            addProduct($productName,$productCategoryId, $productQuantity,
             $productUnitPrice, $productDescription, $productPhoto);
            break;        

    }
}
