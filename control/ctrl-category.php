<?php
    require_once "./model/category.php";

    function showAllCategories(){
        $modelCategory = new Category();        
        $allCats = $modelCategory->getAllCategories();
        // Appeler la vue qui va afficher le contenu de allCats
        require "views/category/listcategories.php";
    }
    function showCategoryById($catId){
        $modelCategory = new Category();        
        $allCats = $modelCategory->getCatNameById($catId);
        // Appeler la vue qui va afficher le contenu de allCats
        require "views/category/listcategories.php";
    }
    function updateCat($id){
        require_once "views/category/form_update_cat.php";
    }
    function updateCatName($id,$catName) {
        $modelCategory = new Category();
        $modelCategory->updateCategory($id, $catName);
        header("location: index.php?action=allCat");
    }

    function deleteCat($catId){ 
        $modelCategory = new Category();
        $modelCategory->deleteCategory($catId);
        header("location: index.php?action=allCat");
    }

    function newCat(){
        require_once "views/category/form_new_cat.php";
    }

    function addNewCat($catName){
        $modelCategory = new Category();
        $modelCategory->createCategory($catName);
        header("location: index.php?action=allCat");
    }

    
    ?>
