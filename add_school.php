<?php
    require "connection.php";

    $con  = new mysqli('localhost','root','','inventory_system');

    $school = $_POST['school'];
    $address = $_POST['address'];
    $pName = $_POST['pName'];

    $create_table = "CREATE TABLE $school (
        id int NOT NULL AUTO_INCREMENT,
        code varchar(255),
        article varchar(255),
        description varchar(255),
        date varchar(255),
        unitValue varchar(255),
        totalValue varchar(255),
        sourceOffFund varchar(255),
        PRIMARY KEY (id)
    )";

    $con->query($create_table);
    // echo $school." ".$address." ".$pName;
    // echo "hi";
?>
