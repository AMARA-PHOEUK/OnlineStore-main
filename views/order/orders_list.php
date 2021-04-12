<?php 
    $titrePage = "Votre Panier";
    ob_start();
    ?>

    
    <table class="table table-dark">
            <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">date </th>
                        <th scope="col">statut livraison</th>
                        <th scope="col">statut paiement</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order){
                    $id = $order->getOrderId();
                ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $order->getDate()?></td>
                        <td><?= $order->getOrderShipStatut()?></td>
                        <td><?= $order->getOrderPayStatut()?></td>
                        <td><?php echo showTotal($id) ?></td>
                        <td><a class="btn btn-warning" href="./index.php?action=getOrderLine&id= <?= $id ?>" >voir détail</a></td>
                        <td><a class="btn btn-danger" href="./index.php?action=Product&id= <?= $id ?>" >Supprimer</a></td>
                    </tr>      
                <?php } ?>
            </tbody>
        </table> 
        
   <?php
    $content= ob_get_clean();
    require "views/template.php";
?>