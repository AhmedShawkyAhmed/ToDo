<?php

    $host = "localhost";
    $dbname = "todo";
    $user = "root";
    $password = "";

    $connection = mysqli_connect($host,$user,$password);
    $db=mysqli_select_db($connection,$dbname);

    if(empty($db)){
        $dbcreate="create database $dbname";
        $check=mysqli_query($connection,$dbcreate);
        if(!$check){
            echo "database error";
        }
    }

    $table="select * from tasks";
    $tcheck=mysqli_query($connection,$table);
    if(!$tcheck){
        $tcreate="CREATE TABLE tasks ( id INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        name VARCHAR(200) NOT NULL , created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
        mysqli_query($connection,$tcreate);
    }

    $conn = new PDO ("mysql:host=$host;dbname=$dbname",$user,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    