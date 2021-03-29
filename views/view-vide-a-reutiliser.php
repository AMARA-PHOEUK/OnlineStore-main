<?php
$titrePage = "Home Page";
ob_start();
?>




<?php
echo "<h3>Bienvenue dans ma Boutique</h3>";

$content= ob_get_clean();
require "template.php";
?>