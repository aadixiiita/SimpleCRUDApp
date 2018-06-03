<?php 
    require 'db.php' ;
    session_start();
  
    
        if(isset($_POST['email']) && isset($_POST['password'])){
        	$pass = md5(htmlentities($_POST['password']));
        	$email = htmlentities($_POST['email']);
        }
        
       
        try {
        	
        
        	
        	$stmt = $connection->prepare('SELECT * FROM users WHERE email = :email AND pass = :password');
    		$stmt->execute(['email' => $email, 'password' => $pass]);
    		$user = $stmt->fetch(PDO::FETCH_ASSOC);
    		if($user == Null){
    			echo '<script language="javascript">';
    	      	echo 'alert("Invalid credentials! Try Again")';
    	      	echo '</script>';   
    	      	header("Refresh: 1; url=index.php"); 
    		}
    		else{		    
                $id = $user['id'];
                $_SESSION['user'] = $email;
                $_SESSION['id'] = $id;
                $_SESSION['isactive'] = true;
    	      	header("location: ind.php"); 
    	    }
        }
    	
    	catch(PDOException $e){
        		echo '<script language="javascript">';
          		echo '$sql . "<br>" . $e->getMessage();';
          		echo '</script>';   
          		header("Refresh: 1; url=index.php");
        	}
        $connection = null;
    
?>