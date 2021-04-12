<?php 
    $titrePage = "Votre panier";
    ob_start();

?>
    <table class="table table-dark">
        <thead>
            <tr>

                <th scope="col"></th>
                <th scope="col">Produit</th>
                <th scope="col" colspan="3">Quantité</th>
                <th scope="col">Prix unitaire</th>
                <th scope="col">Prix total</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
        </thead>
<!-- pour chaque élément de $session  -->
        <tbody>
            <?php foreach ($_SESSION['cart'] as $cartline){ ?>

                <tr>
                    <td><img src="<?= $cartline['photo']?>" alt="<?= $cartline['name']?>" heigth="20" width="100"> </td>
                    <td><?= $cartline['name']?> </td>
                    <td><?= $cartline['qte']?> </td>
                    <td><a class="btn btn-primary" href="./index.php?action=addToCart&id= <?= $cartline['prodid'] ?>">+</a></td>
                    <td><a class="btn btn-primary" href="./index.php?action=modifyMinus&id= <?= $cartline['prodid'] ?>">-</a></td>
                    
                    <td><?= $cartline['unit_price']?> </td>
                    <td><?= $cartline['total']?> </td>

                    <td><a href="./index.php?action=removeFromCart&id= <?= $cartline['prodid'] ?>">SUPPRIMER DU PANIER</a></td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table> 
   <?php
   
    $content= ob_get_clean();
    require "views/template.php";
?>

<!-- afficher 1 tableau qui regroupe tout les éléments du $_SESSION['cart']
    foreach ($_SESSION['cart'] as element){
        chercher pour chaque éléments le nom 
        (voir avec le getproductName dans le model/ voire ajouter photo si on est en avance), et la quantité dans le panier (pas le stock)
        (calculer le total par ligne et au total tout en bas.)
    }
    A COTE DE CHAQUE LIGNES BOUTON +1 -1 SUR QUANTITE VOIRE [SUPPRIMER] TOUTE LA LIGNE PRODUIT ENTIERE

 -->