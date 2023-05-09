<?php
    $id = $_POST['idnum'];
    $pass = $_POST['pass'];
    $name = $_POST['dispname'];
    $con = new mysqli("localhost","root","","user-data");

    if($con->connect_error){
        die("Failed to connect : " .$con->connect_error);
    } else{
        $stmt = $con->prepare("insert into data (name, eSIS, Password)
                                values(?, ?, ?)");
        $stmt->bind_param("sis", $name, $id, $pass);
        $stmt->execute();
        echo "Successfully Registered!";
        $stmt->close();
        $con->close();

    }

?>