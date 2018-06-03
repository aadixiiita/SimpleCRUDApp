<?php
   session_start();
   if(!isset($_SESSION['user'])){  
	  	echo '<script language="javascript">';
      	echo 'alert("Login Please")';
      	echo '</script>';   
       	header("Refresh: 1; url=index.php"); 
      	exit();
	}
	else{
	   session_unset();
	   session_destroy();
	   header("location: index.php");
	}
?>