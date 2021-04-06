<?php 
    $titrePage = "Liste des Utilisateurs";
    ob_start();
    ?>
    <a href="./index.php?action=newUserForm" class="btn btn-success">Ajouter </a>
 
    <table class="table table-dark">
            <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Statut id</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
            </thead>
            <tbody>
                    <tr>
                        <td><?= $user->getUserId() ?></th>
                        <td><?= $user->getUserName() ?></td>
                        <td><?= $user->getUserFirstName() ?></td>
                        <td><?= $user->getEmail() ?></td>
                        <td><?= $user->getPassword() ?></td>
                        <td><?= $user->getStatutId() ?></th>
                        <td><a class="btn btn-warning" href="./index.php?action=updateUserForm&id= <?= $user->getUserId() ?>" >Modifier</a></td>
                        <td><a class="btn btn-danger" href="./index.php?action=deleteUser&id= <?= $user->getUserId() ?>" >Supprimer</a></td>
                    </tr>      
            </tbody>
        </table> 
   <?php
    
    $content= ob_get_clean();
    require "views/template.php";
?>