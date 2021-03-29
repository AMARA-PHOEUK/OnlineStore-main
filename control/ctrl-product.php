<?php
    require_once "./model/product.php";

    function showAllProducts(){
        $modelProduct = new Product();
        $products = $modelProduct->getAllProducts();
        require_once "views/products/listproducts.php";
    }
    function showProductById($id){
        $modelProduct = new Product();
        $product = $modelProduct->getProductById($id);
        return $product;
    }
    function updateProductForm($productId){
        $product = showProductById($productId);
        $_POST['name']=$product->getProductName();
        $_POST['category_id']= $product->getProductName() ;
        $_POST['quantity']=$product->getQuantity();
        $_POST['unit_price']=$product->getUnitPrice();
        $_POST['description']=$product->getUnitPrice();
        $_POST['photo']=$product->getPhoto();
        require_once "views/products/form_update_prod.php";
    }
    function updateProduct($productId, $productName,$productCategoryId,
     $productQuantity, $productUnitPrice, $productDescription, $productPhoto){
        $modelProduct = new Product();
        $product = $modelProduct->updateProduct($productId, $productName,$productCategoryId, $productQuantity, $productUnitPrice, $productDescription, $productPhoto);
        header( "location: index.php?action=allProducts");
    }
    function removeProduct($productId){
        $product = new Product();
        $product->deleteProduct($productId);
        header( "location: index.php?action=allProducts");
    }

    function newProductForm(){
        require_once "views/products/form_new_product.php";
    }
    function addProduct($productName,$productCategoryId,
     $productQuantity, $productUnitPrice, $productDescription, $productPhoto){ 
        $product = new Product();
        $product->createProduct($productName,$productCategoryId,
        $productQuantity, $productUnitPrice, $productDescription, $productPhoto);
        header( "location: index.php?action=allProducts");
    }

?>
<!--  function deleteCat($catId){
        $modelCategory = new Category();
        $modelCategory->deleteCategory($catId);
        header("location: index.php?action=allCat");
    } -->