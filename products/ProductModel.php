<?php
class ProductModel {

    //attribute
    public $productCode;
    public $productName ;
    public $productLine;
    public $productScale;
    public $productVendor;
    public $productDescription ;
    public $quantityInStock ;
    public $buyPrice;
    public $MSRP;

    public $_conn;

    
    function set_data($productCode, $productName, $productLine, $productScale, $productVendor, $productDescription , $quantityInStock , $buyPrice, $MSRP){
        $this->productCode = $productCode;
        $this->productName = $productName;
        $this->productLine = $productLine;
        $this->productScale = $productScale;
        $this->productVendor = $productVendor;
        $this->productDescription = $productDescription;
        $this->quantityInStock = $quantityInStock;
        $this->buyPrice = $buyPrice;
        $this->MSRP = $MSRP;
    }

    //connect_db ปกติใช้ extend เข้ามา

    function set_connection($conn){
        $this->_conn = $conn ;
    }

    //search
    function search($product_name){
        $sql = "SELECT * FROM products where productName like '%".$product_name."%'";

        return $this->_conn->query($sql);
    }

    //insert
    function insert(){
        $sql = "INSERT INTO `products`(`productCode`, `productName`, `productLine`, `productScale`, `productVendor`, `productDescription`, `quantityInStock`, `buyPrice`, `MSRP`) 
        VALUES ('".$this->productCode."','".$this->productName."','".$this->productLine."','".$this->productScale."','".$this->productVendor."','".$this->productDescription."','".$this->quantityInStock."','".$this->buyPrice."','".$this->MSRP."')";
        
        return $this->_conn->query($sql);

        
    }

    //get_data
    function get_data($primary_key){
        $sql = "SELECT * FROM products where productCode = '".$primary_key."'";
        return $this->_conn->query($sql);
    }

    //update
    function update(){
        $sql = "UPDATE `products` SET `productName`='".$this->productName."',`productLine`='".$this->productLine."',`productScale`='".$this->productScale."',`productVendor`='".$this->productVendor."',`productDescription`='".$this->productDescription."',`quantityInStock`='".$this->quantityInStock."',`buyPrice`='".$this->buyPrice."',`MSRP`='".$this->MSRP."' WHERE `productCode`='".$this->productCode."'";
        return $this->_conn->query($sql);
    }

    //delete
    function delete($primary_key){
        $sql = "DELETE FROM `products` WHERE `productCode`='".$primary_key."'";
        return $this->_conn->query($sql);
    }

    

}
?>