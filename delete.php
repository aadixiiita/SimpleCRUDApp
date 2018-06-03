<?php
  
    session_start();
    if(!isset($_SESSION['user'])){  
         echo '<script language="javascript">';
         echo 'alert("Please Login")';
         echo '</script>';   
         header("Refresh: 1; url=index.php"); 
         exit();
    }
    else{
      $email = $_SESSION['user'];
          
    }
?>


<?php
  
     require 'db.php' ;

    $id = $_GET['id'];
      $sql ='DELETE FROM student WHERE id=:id';
       $stmt = $connection->prepare($sql);

       if($stmt->execute([':id'=> $id])){
       		echo '<script>window.location.href = "ind.php";</script>';
       
       	}
      
  ?>