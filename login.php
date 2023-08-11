<?php

        $email = $_POST['email'];
        $password = $_POST['password'];
        $conn = new mysqli('localhost', 'root', '', 'co226');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            $stmt = $conn->prepare("SELECT * FROM user WHERE Email = ? and Password = ?");
            $stmt->bind_param("ss", $email, $password); // "s" indicates the parameter type is a string
            $stmt->execute();
            
            $result = $stmt->get_result();

            if ($result->num_rows == 1){
                session_start();
                $_SESSION['project'] = 'true';
                header('location:SignUp.php');
            }else{
                echo 'Wrong Email or Password';
            }
        }
    ?>