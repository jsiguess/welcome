<?php
    $id = $_POST['idnum'];
    $pass = $_POST['pass'];

    $con = new mysqli("localhost","root","","user-data");

    if($con->connect_error){
        die("Failed to connect : " .$con->connect_error);
    } else{
        $stmt = $con->prepare("select * from data where eSIS = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['Password']=== $pass){
                echo "<h2>Login successfully</h2>";
            }else{ echo "<h2>Invalid eSIS number or Password! please try again.</h2>";}
        }else{
            echo "<h2>Invalid Email or Password</h2>";}
        


    }

    echo "You have logged in successfully!";
?>