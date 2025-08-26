<?php

    // Host
    define("HOST", "localhost");

    // DB Name
    define("DBNAME", "PaymentPaypal");

    // User
    define("USER", "root");

    // Password
    define("PASS", "");


    $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";", USER, PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($conn == true){
    //     echo "Connection succesfully";
    // } else {
    //     echo "Error, Failed to connect";
    // }