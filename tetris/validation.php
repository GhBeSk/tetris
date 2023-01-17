<?php

    session_start();

    $con = mysqli_connect('localhost', "root", "root") or die('not connecting');

    mysqli_select_db($con, 'tetris');

    $name = $_POST['user'];
    $pass = $_POST['password'];

    $s = "select * from Users where UserName = '$name' && Password = '$pass'";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if($num == 1) {
        $_SESSION['username'] = $name;
    }
    else {
        $_SESSION['loginErrorMessage'] = "Login Failed!";
    }
    header('location:index.php');
?>
