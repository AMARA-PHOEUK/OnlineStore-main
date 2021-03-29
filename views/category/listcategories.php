<?php 
    $titrePage = "Toutes les catégories";
    ob_start();
?>
 <a href="./index.php?action=newCat" class="btn btn-success">Ajouter une catégorie</a>

    <table class="table table-dark">
        <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">catégorie</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
        </thead>
        <tbody>
            <?php foreach ($allCats as $cat){  ?>
                <tr>
                    <td><?= $cat->getCatId() ?></th>
                    <td><?= $cat->getCatName() ?></td>
                    <td><a class="btn btn-warning" href="./index.php?action=updateCat&id= <?= $cat->getCatId() ?>" >Modifier</a></td>
                    <td><a class="btn btn-danger" href="./index.php?action=deleteCat&id= <?= $cat->getCatId() ?>" >Supprimer</a></td>
                </tr>      
            <?php } ?>
        </tbody>
      </table> 
    <form action="./index.php?action=catId">
    <input class="btn btn-alert" placeholder="Rechercher une catégorie"  name="catId">
    <button type="submit" name="catId">go</button>
    </form>
   <?php

    $content= ob_get_clean();
    require "views/template.php";
?>