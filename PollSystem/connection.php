<?php
    $server = "localhost:3306";
    $serverUser = "root";
    $serverPswd = "";
    $dbname = "pollsytem";
    $con = new mysqli($server,$serverUser,"");
    $db = mysqli_select_db($con,$dbname);
?>