<?php
class DataBase{
    protected function dbConnect(){

        $bdd = new PDO(
            'mysql:host=localhost;dbname=ma_boutique;charset=utf8',
            'root',
            '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        return $bdd;
    }
    // Getter unit Price
    public function getUnitPrice(){
        return $this->unit_price;
    }
    // Setter unit Price
    public function setUnitPrice($unitPrice){
        $this->unit_price = $unitPrice;
    }
}

?>