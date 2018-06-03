<?php
$dsn = 'mysql:host=localhost;dbname=CRUDAPP';
$username = 'root';
$pass = '';


try{
	$connection = new PDO($dsn , $username ,$pass) ;

	
}catch(PDOException $e){

}

?>