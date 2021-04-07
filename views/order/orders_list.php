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
                        <th scope="col">date </th>
                        <th scope="col">statut livraison</th>
                        <th scope="col">statut paiement</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order){
                    // echo '<pre>';
                    // var_dump($orders);
                    // echo '</pre>';
                    $id = $order->getOrderId();
                    
                ?>
                    <tr>
                        <td><?= $id?></td>
                        <td><?= $order->getDate()?></td>
                        <td><?= $order->getOrderShipStatut()?></td>
                        <td><?= $order->getOrderPayStatut()?></td>
                        <td><?php echo showTotal($id) ?></td>
                        <td><a class="btn btn-warning" href="./index.php?action=getOrderLine&id= <?= $id ?>" >voir détail</a></td>
                        <td><a class="btn btn-danger" href="./index.php?action=deleteProduct&id= <?= $id ?>" >Supprimer</a></td>
  
                    </tr>      
                <?php } ?>
            </tbody>
        </table> 
        
   <?php
    $content= ob_get_clean();
    require "views/template.php";
?>