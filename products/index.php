<?php

require "../connect_db.php";
require "ProductModel.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$name = "";
if(isset($_GET["search"])){
    $name = $_GET["search"];
}

$product = new ProductModel();
$product->set_connection($conn);
$result = $product->search($name);

if(isset($_GET["productCode"])){
    $productCode = $_GET["productCode"];
    $result = $product->delete($productCode);
}
 
$result = $product->search($name);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class ="row">
            <div class ="col-md-4">
            <form method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="ค้นหาด้วยชื่อสินค้า" value="<?php echo $name; ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">ค้นหา</button>
                            <a href="create.php" class="btn btn-outline-secondary" type="button">สร้าง</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div >
        <hr>
        จำนวนข้อมูล <?php echo $result->num_rows; ?> รายการ
        <table class="table table-striped table-bordered table-hover" >
                <thead class="bg-success fw-bolder" >
                <tr >
                    <td >productCode</td>
                    <td >productName </td>
                    <td >quantityInStock</td>
                    <td >buyPrice</td>
                  
                </tr>
                </thead>
                
                <tbody >
                    <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "
                                    <tr>
                                        <td>".$row["productCode"]."</td>
                                        <td>".$row["productName"]."</td>
                                        <td>".$row["quantityInStock"]."</td>
                                        <td>".$row["buyPrice"]."</td>
                                        <td><a href='update.php?productCode=".$row["productCode"]."' class='btn btn-warning'>Edit</a> <a href='index.php?productCode=".$row["productCode"]."' onclick='return confirm(\"Are you sure?\")' class='btn btn-danger'>Delete</a></td>
                                    </tr>
                                ";
                            }
                        } else 
                        {
                            echo "0 results";
                        }
                    ?>
                </tbody>
               
            </table>
    </div>
        
     
   
    
</body>
</html>
<script>

$(document).ready(function () {
    $('#customersData').DataTable();

});
</script>

<?php
    // disconnect
    $conn->close();
?>