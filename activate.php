
<?php
session_start();
include('layout/header.php');
if(isset($_GET['token'])) {
    $token = $_GET['token'];
    $updatequery = " update register set status='active' where token='$token' ";

    $query = mysqli_query($conn, $updatequery);

    if($query){
            if(isset($_SESSION['msg'])){
                $_SESSION['msg'] = "Account Update Successfully";
                header('location:login.php');
            } else {
                $_SESSION['msg'] = "Your are logged out";
                header('location:login.php');
            }

    } else {
        $_SESSION['msg'] = "Account not updated";
            header('location:signup.php');
    }

}


?>

    