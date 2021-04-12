<?php 
    $titrePage = "Tout les produits";
    ob_start();
    ?>
    <a href="./index.php?action=newProductForm" class="btn btn-success">Ajouter une catégorie</a>
 
    <table class="table table-dark">
            <thead>
                    <tr>
                        <?php if ($_SESSION['statutId'] === 2 ){ ?>
                            <th scope="col">Id</th>
                        <?php } ?>
                        <th scope="col">Nom</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Description</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product){
                ?>
                    <tr>
                        <?php if ($_SESSION['statutId'] === 2 ){ ?>
                            <td><?= $product->getProductId() ?></th>
                        <?php } ?>
                        <td><?= $product->getProductName() ?></td>
                        <td><?= $product->getCategory_id() ?></td>
                        <td><?= $product->getQuantity() ?></td>
                        <td><?= $product->getUnitPrice() ?></th>
                        <td><?= $product->getDescription() ?></td>
                        <td><img src="<?= $product->getPhoto() ?>" heigth="20" width="100" alt="<?= $product->getProductName() ?>"></th>
                        <?php if ($_SESSION['statutId'] === 2 ){ ?>
                            <td><a class="btn btn-warning" href="./index.php?action=updateProductForm&id= <?= $product->getProductId() ?>" >Modifier</a></td>
                            <td><a class="btn btn-danger" href="./index.php?action=deleteProduct&id= <?= $product->getProductId() ?>" >Supprimer</a></td>
                        <?php } ?>
                        <td><a href="./index.php?action=addToCart&id= <?= $product->getProductId() ?>">AJOUTER AU PANIER</a></td>
                    </tr>      
                <?php } ?>
            </tbody>
        </table> 
   <?php
    
    $content= ob_get_clean();
    require "views/template.php";
?>