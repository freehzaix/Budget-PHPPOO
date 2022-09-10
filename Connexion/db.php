<?php
	
	$serverdb = "localhost";
	$username = "jeanluc";
	$password = "edyrodal";
	
	try{
		$pdo = new PDO("mysql:host=$serverdb;dbname=budget_db", $username, $password);
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	}catch(PDOException $e){
	    echo "Connection failed: " . $e->getMessage();
	}
	