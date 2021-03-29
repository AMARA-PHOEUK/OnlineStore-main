<form  action="./index.php?action=updateProduct&id=<?= $product->getProductId() ?>" class="form-group" method="POST">

    <table class="table table-dark">
            <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Description</th>
                    <th scope="col">Photo Url</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td>   </th>
                        <td> <input placeholder="<?= $product->getProductName() ?>" type="text" name="name"> </td>
                        <td>  <input placeholder="<?= $product->getCategory_id() ?>" type="number" name="category_id"></td>
                        <td>    <input placeholder="<?= $product->getQuantity() ?>" type="number" name="quantity"></td>
                        <td>    <input placeholder="<?= $product->getUnitPrice() ?>" type="number" name="unit_price"></th>
                        <td>  <textarea placeholder="<?= $product->getDescription() ?>" name="description"  cols="30" rows="10"></textarea></td>
                        <td>    <input placeholder="<?= $product->getPhoto() ?>" type="text" name="photo"><img src="<?= $product->getPhoto() ?>" heigth="20" width="100" alt=""></th>
                        <td><button type="submit">OK</button></td>
                    </tr>      

                
            </tbody>
        </table> 
</form>