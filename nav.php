	<style> body, html
		{
			padding: 0;
			margin: 0px;
			font-family: verdana,sans-serif;
		}
		main
		{
			width: 100%;
			display: inline-block;
		}
		.navbar
		{
			width: 100%;
			background: #4568DC;  
background: -webkit-linear-gradient(to right, #B06AB3, #4568DC);  
background: linear-gradient(to right, #B06AB3, #4568DC); 

border-bottom: 2px solid linear-gradient(to right, #B06AB3, #4568DC);
	box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.7);
			margin: 0px;

		}
		.navbar > ul
		{
			margin: 0px;
			padding: 0px;
			text-align: center;
		}
			.navbar > ul li
			{
				display: inline-block;
			}
			.navbar > ul li a
			{
				text-decoration: none;
				color: #fff;
				width: 120px;
				display: inline-block;
				text-align: center;
				padding: 20px 0;
				font-weight: bold;
				position: relative;
			}
			.navbar > ul li a::before {
    background: #fff none repeat scroll 0 0;
    bottom: -2px;
    content: "";
    height: 3px;
    left: 0;
    position: absolute;
    width: 0%;
    transition: 0.5s;
}
	.navbar > ul li a:hover::before
	{
		width: 100%;
	}
.option{
	font-size: 20px;
}
#search{
	display: none;
}
</style>
<body>
	<main>
				<!-- navbar -->
				<nav class="navbar">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="create.php">Add Student</a></li>
						<li><a href="#!" onclick="ShowDiv()">Search By</a></li>
						<li><a href="https://github.com/aadixiiita/SimpleCRUDApp">Source Code</a></li>
						<li><a href="logout.php">LogOut</a></li>
					</ul>
				</nav>
				<br>
		
			<div align="center" id="search" >
				<form class="option" action="search.php" method="post">
    <label class="radio-inline">
      <input type="radio" name="optradio" value="Name">Name
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="College">College
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="Skills">Skills
    </label>
      <label class="radio-inline">
      <input type="radio" name="optradio" value="Projects">Projects
      </label>
      <label class="radio-inline">
      <input type="radio" name="optradio" value="Email">Email
    </label>
    <button type="submit" class="btn btn-info" name="submit">GO</button>
  </form>
  </div>
	<script type="text/javascript">
function ShowDiv() {
    document.getElementById("search").style.display = "block";
}
</script>			<!-- navbar -->
		</main>
</body>
