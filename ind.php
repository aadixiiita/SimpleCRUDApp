<?php require 'nav.php' ; ?>
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
      		$id = $_SESSION['id'];
		}
?>
<?php
	
    $id = $_SESSION['id'];
    require 'db.php' ;
    $message = "" ;
 if(isset($_POST['name']) &&  isset($_POST['college']) && isset($_POST['skill']) && isset($_POST['project']) && isset($_POST['email'])){
       
       $name = $_POST['name'] ;
       $college = $_POST['college'] ;
       $skill= $_POST['skill'] ;
       $project= $_POST['project'] ;
       $email = $_POST['email'] ;


       $sql ='INSERT INTO student(Name,College,Projects,Skills,Email,user_id) VALUES (:Name,:College,:Projects,:Skills,:Email,:user_id)' ;
       $stmt = $connection->prepare($sql);
       if($stmt->execute([':Name'=>  $name ,':College' => $college, ':Projects' => $project, ':Skills' => $skill , ':Email' => $email,':user_id' => $id])) {
       $message =  "Data entered Succesfully" ;
       }


   
 }

?>
<?php
	
	
    require 'db.php' ;
   
    $message = "" ;
 if(isset($_POST['newname']) &&  isset($_POST['college']) && isset($_POST['skill']) && isset($_POST['project']) && isset($_POST['email'])){
       
       $newname = $_POST['newname'] ;
       $college = $_POST['college'] ;
       $skill= $_POST['skill'] ;
       $project= $_POST['project'] ;
       $email = $_POST['email'] ;
       $id = $_POST['id'] ;

       $sql ='UPDATE student SET Name=:Name , College=:College , Projects=:Projects , Skills=:Skills ,Email=:Email WHERE id=:id' ;
       $stmt = $connection->prepare($sql);
       if($stmt->execute([':Name'=>  $newname ,':College' => $college, ':Projects' => $project, ':Skills' => $skill , ':Email' => $email,':id'=>$id])) {
       $message =  "Data Updated Succesfully" ;
       }


   
 }
 ?>
 <?php
	   require 'db.php' ;
	   $id = $_SESSION['id'];
	    $stmt = $connection->prepare("SELECT * FROM student WHERE user_id = :id");
          $stmt->execute(['id' => $id]);
          
       $stud = $stmt->fetchAll(PDO::FETCH_OBJ) ;

      
  ?>
<h3 align="center"><?php
echo $message;?></h3>
<style type="text/css">
	

h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: center;
  font-weight: 500;
  font-size: 15px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: center;
  vertical-align:middle;
  font-weight: 300;
  font-size: 15px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}



@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
 background: -webkit-linear-gradient(to right, #B06AB3, #4568DC);  
background: linear-gradient(to right, #B06AB3, #4568DC);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}
.button {
    
    border: none;
    color: white;
    padding: 6px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button4 {background-color: #00bfff; 
	border-radius: 12px;}
.button5 {
	background-color: #FF0000; border-radius: 12px;}


.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 30px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 30px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}




::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
</style>
<section>


  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Name</th>
          <th>College</th>
          <th>Skills</th>
          <th>Projects</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
 
        <?php foreach ($stud as $studs): ?> 
        	
        <tr>
          <td><?=$studs->Name;?></td>
          <td><?=$studs->College;?></td>
          <td><?=$studs->Skills;?></td>
          <td><?=$studs->Projects;?></td>
          <td><?=$studs->Email;?></td>
          <td><a href="update.php?id=<?=$studs->id;?>"><button class="button button4">Update</button></a>
          <a href="delete.php?id=<?=$studs->id;?>"><button class="button button5">Delete</button></a></td>
        </tr>
     <?php endforeach ; ?>
      </tbody>
    </table>
  </div>
</section>
<?php foreach ($stud as $student): ?>
	<h3><?php $student->Name; ?></h3>
<?php endforeach ?>

<!-- follow me template -->
<div class="made-with-love">
  Made with
  <i>♥</i> by
  <a target="_blank" href="https://codepen.io/aadixiiita">Adesh Shukla</a>
</div>
<?php require 'footer.php' ; ?>