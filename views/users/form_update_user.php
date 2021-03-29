<form action="./index.php?action=updateUser<?= $user->getUserId() ?>" method="POST">
    <table class="table table-dark">
                <thead>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Statut id</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $user->getUserName() ?></td>
                        <td><?= $user->getUserFirstName() ?></td>
                        <td><?= $user->getEmail() ?></td>
                        <td></td>
                        <td><?= $user->getStatutId() ?></th>
                    </tr>      
                    <tr>
                        <td>    <input type="text" placeholder="<?= $user->getUserName() ?>" name="name"  > </td>
                        <td>    <input type="text" placeholder="<?= $user->getUserFirstName() ?>" name="firstname" ></td>
                        <td>    <input type="text" placeholder="<?= $user->getEmail() ?>" name="email" ></td>
                        <td>    <input type="passeword"  name="motdepasse" ></th>
                        <td>    <input type="number" placeholder="<?= $user->getStatutId() ?>" name="statut_id" ></th>
                        <td><button type="submit">OK</button></td>
                    </tr>      
                </tbody>
            </table> 
</form>