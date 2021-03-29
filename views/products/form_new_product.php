<form  action="./index.php?action=createProduct" class="form-group" method="POST">

    <table class="table table-dark">
            <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Description</th>
                    <th scope="col">Photo</th>

                    </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td>   </th>
                        <td> <input type="text" name="name" required> </td>
                        <td>  <input type="number" name="category_id" required></td>
                        <td>    <input type="number" name="quantity" required></td>
                        <td>    <input type="number" name="unit_price" required></th>
                        <td>   <textarea name="description" cols="30" rows="10">
                        </textarea> </td>
                        <td>    <input type="text" name="photo"></th>
                        <td><button type="submit">OK</button></td>
                    </tr>      
            </tbody>
        </table> 
</form>