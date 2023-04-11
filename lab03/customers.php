<?php


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

require "connect_db.php";

$name = "";
if(isset($_GET["search"])){
    $name = $_GET["search"];
}

$sql = "SELECT * FROM customers where customerName like '%".$name."%'";
echo $sql;
$result = $conn->query($sql);




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
                <form action="" method="get">
                    <input type="text" class="form-control" name="search" placeholder="ค้นหาด้วยชื่อลูกค้า" value="<?php echo $name;?>">
                    <input type="submit" class="btn" value="ค้นหา">
                </form>
            </div>
        </div>
    </div>

    <div >
        <hr>
        จำนวนข้อมูล <?php echo $result->num_rows; ?> รายการ
        <table class="table table-striped table-bordered border-success table-hover" >
                <thead class="table bg-success " >
                <tr >
                    <th >customerNumber</th>
                    <th >customerName</th>
                    <th >contactLastName</th>
                    <th >contactFirstName</th>
                    <th >phone</th>
                    <th >addressLine1</th>
                    <th >addressLine2</th>
                    <th >city</th>
                    <th >state</th>
                    <th >postalCode</th>
                    <th >country</th>
                    <th >salesRepEmployeeNumber</th>
                    <th >creditLimit</th>
                </tr>
                </thead>
                
                <tbody class="font-italic">
                    <?php
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "
                                    <tr>
                                        <th>".$row["customerNumber"]."</th>
                                        <th>".$row["customerName"]."</th>
                                        <th>".$row["contactLastName"]."</th>
                                        <th>".$row["contactFirstName"]."</th>
                                        <th>".$row["phone"]."</th>
                                        <th>".$row["addressLine1"]."</th>
                                        <th>".$row["addressLine2"]."</th>
                                        <th>".$row["city"]."</th>
                                        <th>".$row["state"]."</th>
                                        <th>".$row["postalCode"]."</th>
                                        <th>".$row["country"]."</th>
                                        <th>".$row["salesRepEmployeeNumber"]."</th>
                                        <th>".$row["creditLimit"]."</th>
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