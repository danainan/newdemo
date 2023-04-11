<?php
    $name = "";
    if (isset($_GET["number"])) {
        $name = $_GET["number"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <form method="get">
        <input type="number" name="number" >
        <input type="submit" value="Click"> 
    </form>
    
    <?php for ($i=1; $i <= 12 ; $i++) { ?>
        <h3><?php echo $name;?> x <?php echo $i;?> = <?php echo $name*$i; ?></h3>
    <?php } ?>

    <?php for ($i=1; $i <= 12 ; $i++) {
        echo "<h3>".$name." x ".$i." = ".($name*$i)."</h3>";
    } ?>
   

</body>
</html>