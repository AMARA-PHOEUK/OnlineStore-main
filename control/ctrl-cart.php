<?php 
    /**
     * Ajouter un produit dans le panier
     */
    function addToCart($id){
        // vérifier si le panier existe
        if (!isset($_SESSION['cart'])){
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
        seeCart();
    }
        // RETIRER UN ARTICLE DU PANIER
    function removeFromCart($id){
        $prodIndex = searchProdInCart($id);
        unset($_SESSION['cart'][$prodIndex]);
        seeCart();
    }

    // VOIR LE PANIER
    function seeCart(){  
        if (!isset($_SESSION['cart'])){
            createCart();
        } else {    
              
            $product = new Product();    
            $cart = $_SESSION['cart'];
            $newCart = [];
            foreach ($cart as $cartLine){
                
                // pour chaques cartline utiliser  $['prodid'] 
                // pour obtenir le nom, prix
                $cartLineProduct = $product->getProductById($cartLine['prodid']);
                $productName = $cartLineProduct->getProductName();
                $productPrice = $cartLineProduct->getUnitPrice();
                $productPhoto = $cartLineProduct->getPhoto();

                array_push($newCart, ['prodid'=>$cartLine['prodid'],
                 'qte'=>$cartLine['qte'],'name'=>$productName,
                  'unit_price'=>$productPrice,
                   'photo'=>$productPhoto,
                   'total'=>floatval(floatval($productPrice)*$cartLine['qte'])
                   ]);


                
            }
            $_SESSION['cart']= $newCart;

        }
        require "views/cartview.php";
    }
        // est ce que le panier est vide??? OK
        // ===> oui afficher votre panier est vide  OK 
        // ===> non parcourir le panier et afficher les lignes 
        // construire un tableau avec : nom produit, quantité,
        //  prix total , prix unitaire, et prix total
        //  le controlleur construit la liste et envoie dans la vue.
    
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
    function modifyMinus($id){
        // vérifier si le panier existe
        if (!isset($_SESSION['cart'])){
            createCart();
        }
// retirer une unité, et vérifier si la qté est égale ou inférieure à zéro.
        $cartLineId = searchProdInCart($id);
        $_SESSION['cart'][$cartLineId]['qte'] -= 1;
        seeCart();
        if ($_SESSION['cart'][$cartLineId]['qte'] <= 0){
            removeFromCart($id);
        }
    }
?>

