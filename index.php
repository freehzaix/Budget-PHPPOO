<?php
session_start();
if(isset($_SESSION['username'])){
    //require 'autoloader.php'; 
    //Autoloader::register(); 

    header('Location: app/');
    
}else{
    header('Location: login/');
}
