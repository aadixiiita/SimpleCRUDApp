<?php
if (isset($_POST['submit'])) {
		$type = $_POST['optradio'];
}
?>


<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans);
	@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
 background: -webkit-linear-gradient(to right, #B06AB3, #4568DC);  
background: linear-gradient(to right, #B06AB3, #4568DC);
  font-family: 'Roboto', sans-serif;
}
.search {
  width: 100%;
  position: relative
}

.searchTerm {
  float: left;
  width: 100%;
  border: 3px solid #00B4CC;
  padding: 5px;
  height: 40px;
  border-radius: 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  position: absolute;  
  right: -50px;
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);

}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<div class="wrap">
   <div class="search">
   <form action="result.php" method="post">
      <input type="text" class="searchTerm" placeholder="What are you looking for?" name="key">
      <input type="hidden" value="<?=$type;?>" name="type">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
     </form>
   </div>
</div>
</body>

</html>
