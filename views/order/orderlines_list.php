<?php 
    $titrePage = "Votre Panier";
    ob_start();
    ?>
    <p>Ref :<?= $_SESSION['orderId'] ?> </p>
    
    <table class="table table-dark">
            <thead>
                    <tr>
                        <?php if ($_SESSION['statutId'] === 2 ){ ?>
                            <th scope="col">Id</th>
                        <?php } ?>
                        <th scope="col">id</th>
                        <th scope="col">produit </th>
                        <th scope="col">quantité</th>
                        <th scope="col">total</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order){
                    // echo '<pre>';
                    // var_dump($order);
                    // echo '</pre>';
                    $id = $order->getOrderLineId();
                    
                ?>
                    <tr>
                        <td><?= $order->getOrderLineId($id)?></td>
                        <td><?= $order->getProductName()?></td>
                        <td><?= $order->getOrderLineQuantity($id)?></td>
                        <td><?php echo searchTotalByLine($id) ?></td>
                        <td><a class="btn btn-warning" href="./index.php?action=updateProductForm&id= <?= $order->getOrderLineId() ?>" >Modifier</a></td>
                        <td><a class="btn btn-danger" href="./index.php?action=deleteProduct&id= <?= $order->getOrderLineId() ?>" >Supprimer</a></td>
  
                    </tr>      
                <?php } ?>
            </tbody>
        </table> 
        
   <?php
    $content= ob_get_clean();
    require "views/template.php";
?>