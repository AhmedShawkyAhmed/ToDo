<?php
    require "connection.php";

    if(isset($_POST['submit'])){
        $task = $_POST['mytask'];
        $insert = $conn->prepare("insert into tasks(name) values(:name)");
        $insert->execute([':name' => $task]);
        header("location: index.php");
    }
?>