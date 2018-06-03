<?php 
    require 'db.php' ;
   
        if(isset($_POST['email']) && isset($_POST['password'])){
            $pass = md5(htmlentities($_POST['password']));
            $email = htmlentities($_POST['email']);
        }
        else{
                    echo '<script language="javascript">';
                    echo 'alert("Fill all values. Try Again!")';
                    echo '</script>';   
                    header("Refresh: 2; url=register.php");
                }
        
        try {
           
        
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $connection->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if($user != Null){
                echo '<script language="javascript">';
                echo 'alert("Email Already exists")';
                echo '</script>';   
                header("Refresh: 2; url=register.php"); 
            }
            else{
                $sql = $connection->prepare("INSERT INTO users (email,pass) VALUES (:email,:pass)");
                $do = $sql->execute(['email' => $email,'pass' => $pass]);
                if($do){
                    echo '<script language="javascript">';
                    echo 'alert("Registered Successfully. You can Login ")';
                    echo '</script>';   
                    header("Refresh: 1; url=index.php"); 
                }
                  
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Error")';
                    echo '</script>';   
                    header("Refresh: 1; url=index.php");
                }
                
            }
        }
        
        
        catch(PDOException $e){
                echo '<script language="javascript">';
                echo '$sql . "<br>" . $e->getMessage();';
                echo '</script>';   
                header("Refresh: 2; url=register.php");
            }
        $connection = null;
    
?>