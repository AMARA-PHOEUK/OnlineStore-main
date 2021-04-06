<h1>Mara Store</h1>
<?php 
if (isset($_SESSION['statutId']) AND ($_SESSION['statutId'] !=0)){
     
    echo " <a href='./index.php?action=showuser= {$_SESSION['statutId']}' >Bonjour {$_SESSION['firstName']} {$_SESSION['name']}  </a>";
}
?>
    <nav>
        <ul>
            <li><a href="index.php">Retour menu</a></li>
            <li><a href="./index.php?action=allCat">Categories</a></li>
            <li><a href="./index.php?action=allProducts">Produits</a></li>
            <?php if (isset($_SESSION['statutId']) AND ($_SESSION['statutId'] != 0)) { ?>
                <?php if ($_SESSION['statutId'] ===2 ){ ?>
                    <li><a href="./index.php?action=allUsers">Utilisateurs</a></li>
            <?php } ?>
                    <li><a href="./index.php?action=logout">Déconnexion</a></li>

            <?php } else {?>
          
                <li><a href="./index.php?action=loginForm">Connexion à votre compte</a></li>
            <?php } ?>
        </ul>
    </nav>
