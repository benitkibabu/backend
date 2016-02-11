<?php 
session_start();

include('');
$error ='';

if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        $error = 'Username or Password is invalid';
    }
    else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $_SESSION['login_user'] = $username;
    }
    
}

?>
