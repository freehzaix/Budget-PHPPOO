<?php
session_start();
if(isset($_SESSION['username'])){
    require 'autoloader.php'; 
    Autoloader::register(); 

    $user = new Utilisateurs("admmin", "admin@dev.test");

    var_dump($user);
}else{
    header('Location: login/');
}
