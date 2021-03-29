<form action="./index.php?action=addNewUser" method="POST">
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

                            <td>    <input type="text" name="name" required required> </td>
                            <td>    <input type="text" name="firstname" required></td>
                            <td>    <input type="text" name="email" required></td>
                            <td>    <input type="passeword" name="motdepasse" required></th>
                            <td>    <input type="number" name="statut_id" required></th>
                            <td><button type="submit">OK</button></td>
                        </tr>      
                </tbody>
            </table> 
</form>