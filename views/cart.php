<?php 
    $titrePage = "Votre panier";
    ob_start();
    ?>
    <table class="table table-dark">
            <thead>
                        <th scope="col">Nom</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>

                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
            </thead>
            <tbody>
                <td>
                <pre>
                <?php var_dump($_SESSION['cart']) ?>
                </pre>
                </td>
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