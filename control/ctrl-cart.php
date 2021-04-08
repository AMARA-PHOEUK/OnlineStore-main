<?php 
    /**
     * Ajouter un produit dans le panier
     */
    function addToCart($id){
        // vérifier si le panier existe
        if (!isset($_SESSION['cart'])){
            echo "création panier, effacer ce commentaire lorsque tout sera operationnel";
            createCart();
        }
        // vérifier si le produit est en qte suffissante
        //$produit = new Product();
        //$quantite = $produit->getProductQteById($id);
        $cartLineId = searchProdInCart($id);
        if ($cartLineId === false){
            // Ajouter le produit dans le panier + mettre Qte = 1 
            array_push($_SESSION['cart'], ['prodid'=>$id, 'qte'=>1]);
        } else {
            // Augmenter la Qte du produit correspondant à $cartLineId
            $_SESSION['cart'][$cartLineId]['qte'] += 1;
        }
        echo"<pre>";
        var_dump($_SESSION['cart']);
        echo"</pre>";
    }
        // RETIRER UN ARTICLE DU PANIER
    function removeFromCart($id){
        $prodIndex = searchProdInCart($id);
        unset($cart[$prodIndex]);
        // rappeler la vue du panier
    }

    // VOIR LE PANIER
    function seeCart(){
       echo "vous avez cliqué sur le panier. on va l'afficher bientot";
       require "views/cart.php";
    }
    /**
     *  Creation du panier
     */
    function createCart(){
        $_SESSION['cart'] = [];
    }

    /**
     * Destruction du panier
     */
    function destroyCart(){
        unset($_SESSION['cart']);
    }

    /**
     * Rechercher un produit dans le panier
     */
    function searchProdInCart($idProd){
        $ret = false;
        $cart = $_SESSION['cart'];
        for($i = 0; $i < count($cart); $i++){
            if ($cart[$i]['prodid'] == $idProd){
                $ret = $i;
                break;
            } 
        }
        return $ret;
    }
?>

