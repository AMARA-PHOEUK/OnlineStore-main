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
        <?php foreach ($_SESSION['cart'] as $cartline) {
            $productInfo = showProductById($cartline['prodid']);


        ?>

            <tr>
                <td><img src="<?= $cartline['photo'] ?>" alt="<?= $cartline['name'] ?>" heigth="20" width="100"> </td>
                <td><?= $cartline['name'] ?> </td>
                <td><a id="<?= $cartline['prodid'] ?>Moins" class="btn btn-primary" href="./index.php?action=modifyMinus&id= <?= $cartline['prodid'] ?>">-</a></td>
                <td><?= $cartline['qte'] ?> </td>
                <td style="<?= ($_SESSION['cart'][$cartLine]['qte'] >= $productInfo->getQuantity()) ? 'display: none;' : '' ?>"><a id="<?= $cartline['prodid'] ?>Plus" class="btn btn-primary" href="./index.php?action=modifyPlus&id= <?= $cartline['prodid'] ?>">+</a></td>
                <td><?= $cartline['unit_price'] ?> </td>
                <td><?= $cartline['total'] ?> </td>
                <td><a href="./index.php?action=removeFromCart&id= <?= $cartline['prodid'] ?>">SUPPRIMER DU PANIER</a></td>

            </tr>
        <?php } ?>
    </tbody>
</table>
<?php

$cartContent = count($_SESSION['cart']);
if ($cartContent === 0) {
    echo "<h3>Votre Panier est vide </h3>";
} else {
    echo "<h3><a href='./index.php?action=validateCart'>Valider votre Panier</a></h3>";
}
$content = ob_get_clean();
require "views/template.php";
?>