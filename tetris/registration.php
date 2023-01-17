<?php

    session_start();

    // var_dump(function_exists('mysqli_connect'));
    $con = mysqli_connect('localhost', "root", "root") or die('not connecting');
    mysqli_select_db($con, 'tetris');

    $pass = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];
    
    if($pass != $confirmPass) {
        $_SESSION['registerErrorMessage'] = "Password doesn't matched.";
        //location('header:index.php');
    } else {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $name = $_POST['user'];

        $display = $_POST['display'];

        $s = "select * from Users where UserName = '$name'";

        $result = mysqli_query($con, $s);

        $num = mysqli_num_rows($result);

        if($num != 1) {
            $reg = "INSERT INTO Users VALUES ('$name', '$firstName', '$lastName', '$pass', '$display')";
            mysqli_query($con, $reg);
            //echo "Registration Ok.";
            $_SESSION['username'] = $name;
            //location('header:index.php');
        } else {
            $_SESSION['registerErrorMessage'] = "User: '$name', already exists.";
        }
    }

    //location('header:index.php');
?>
