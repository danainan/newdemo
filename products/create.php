<?php

    if(isset($_POST["submit"])){

        require "../connect_db.php";
        require "ProductModel.php";  
       

        $productCode = $_POST["productCode"];
        $productName = $_POST["productName"];
        $productLine = $_POST["productLine"];
        $productScale = $_POST["productScale"];
        $productVendor = $_POST["productVendor"];
        $productDescription = $_POST["productDescription"];
        $quantityInStock = $_POST["quantityInStock"];
        $buyPrice = $_POST["buyPrice"];
        $MSRP = $_POST["MSRP"];

        $product = new ProductModel();
        $product->set_connection($conn);
        $product->set_data($productCode,$productName,$productLine,$productScale,$productVendor, $productDescription,$quantityInStock,$buyPrice,$MSRP);
        $result = $product->insert();

        

        if($result){
            header("Location: index.php");
        }else{
            var_dump($result);
        }
        exit();
    }

    

 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <form method="post">
         <div class="form-group">
             <label>productCode</label>
             <input type="text" name="productCode" class="form-control" placeholder="Enter ProductCode">
         </div>

         <div class="form-group">
             <label>productName</label>
             <input type="text" name="productName" class="form-control" placeholder="Enter productName">
         </div>

         <div class="form-group">
             <label>productLine</label>
             <input type="text" name="productLine" class="form-control" placeholder="Enter productLine">
         </div>

         <div class="form-group">
             <label>productScale</label>
             <input type="text" name="productScale" class="form-control" placeholder="Enter productScale">
         </div>

         <div class="form-group">
             <label>productVendor</label>
             <input type="text" name="productVendor" class="form-control" placeholder="Enter productVendor">
         </div>

         <div class="form-group">
             <label>productDescription</label>
             <input type="text" name="productDescription" class="form-control" placeholder="Enter productDescription">
         </div>

         <div class="form-group">
             <label>quantityInStock</label>
             <input type="text" name="quantityInStock" class="form-control" placeholder="Enter quantityInStock">
         </div>

         <div class="form-group">
             <label>buyPrice</label>
             <input type="text" name="buyPrice" class="form-control" placeholder="Enter buyPrice">
         </div>

         <div class="form-group">
             <label>MSRP</label>
             <input type="text" name="MSRP" class="form-control" placeholder="Enter MSRP">
         </div>

         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   
</body>
</html>