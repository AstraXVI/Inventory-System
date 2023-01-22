<?php

    function connect(){

       $sql = new mysqli('localhost', 'root', '', 'inventory_system');

       return $sql;

    }

    $conn = connect()

    

?>