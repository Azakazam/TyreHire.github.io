<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>



<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->

		<title>Tyre Hire</title>
		<link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
	
	<script>
	function ShowBox() {
        var driver = document.getElementById("driver");
        var Client = document.getElementById("Client");
        newText.style.display = Client.checked ? "block" : "none";
    }
	</script>
	
	
	
	
<div class="container">
<div class="row">
	<div class="col-xs-12">
		<header> 
			<img class="img-responsive" src ="images/Logo.png" alt ="logo"/>
		</header>

			</div>
	</div>
				<?php
				
				
			require_once ("config.inc.php");

try
	{
	$conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);
	}

catch(PDOException $exception)
	{
	echo "Oh no, there was a problem" . $exception->getMessage();
	}
				
				

				
if(isset($_SESSION["username"]))
{
	echo "Welcome, you are now logged in as <b>".$_SESSION['username'] . "</b>,with the status:<b>". $_SESSION['occupation'] ." </b><img class='clientView' src='images/loginIcon.png' alt='client'>"; }
	else { 
	echo "You are currently not logged in";
	};
	?>
		
	<div class="row">
			<div class="col-xs-12">
			<br>

		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="main.php">Tyre Hire</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<!--
			 <li><a href="main.php"> Home <span class="glyphicon glyphicon-print"></span></a></li>
               <li><a href="search.php"> Search <span class="glyphicon glyphicon-print"></span></a></li>
	 <li><?php echo "<a href='all-jobs.php?user_id=" . $login->user_ID . "&occupation=". $login->occupation ."''> Current Jobs <span class='glyphicon glyphicon-print'></span></a>";?> </li>
			   <li><a href="interest.php"> Register Interest <span class="glyphicon glyphicon-print"></span></a></li>
			   <li><a href="logout.php"> Logout <span class="glyphicon glyphicon-print"></span></a></li>
			   -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="account.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="add.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
	</div>
	</div>
			<div class="row">
			<div class="col-xs-12">
	
		<div class="newHead">
			<h2><i class="fa fa-car" style="font-size:36px;"></i>&nbsp;Register your details</h2>
			</div>
				<div class="right">
			<p>Please enter your details to be able to fully access our site.</p>
			<p><b></b></p>
			
			<form class="formThree form-horizontal"  action="register.php" method="POST">
		<h3><u>Register </u></h3>
		

		<div class="form-group">
		<label class="control-label col-sm-2" for="name"> First Name: </label>
		<div class="col-sm-10">
		<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"  id="name" name="name">
		</div>
		<span class="error"> <?php 
		if (isset($nameErr)) {
		echo $nameErr;
		} 
		?></span>
		</div>
		</div>
	<br>
			<div class="form-group">
		<label class="control-label col-sm-2" for="surname"> Surname: </label>
		<div class="col-sm-10">
		<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input type="text" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : '' ?>" id="surname" name="surname">
		</div>
		<span class="error"> <?php 
		if (isset($surErr)) {
		echo $surErr;
		} 
		?></span>
		</div>
		</div>
			<br>
	
<div class="form-group">
		<label class="control-label col-sm-2" for="Username"> Username: </label>
		<div class="col-sm-10">
		<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"  id="Username" name="username">
		</div>
		<span class="error">

		<?php 
		if (isset($userErr)) {
		echo $userErr;
		} 
		?></span>
		</div>
</div>
		
			<br>

<div class="form-group">
		<label class="control-label col-sm-2" for="Password">Password: </label>
		<div class="col-sm-10">
		<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		<input type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"  id="Password" name="password">
		</div>
		<span class="error"> <?php 
		if (isset($passErr)) {
		echo $passErr;
		} 
		?></span>
</div>
</div>
		

		
	
		


 
 


<label>Occupation: </label> <span class="error"> <?php 
		if (isset($occupationErr)) {
			echo $occupationErr;
		} 
		?></span>


<div class="radio">
<label for="driver"><input type="radio" name="occupation" value="driver" id="driver" onclick="ShowBox()">Driver: </label>
</div>
<div class="radio">
<label for="Client"><input type="radio" name="occupation" value="Client" id="Client" onclick="ShowBox()">Client: </label>
</div>
<div id="newText" style="display: none">
    <label>Company Name: </label>
    <input type="text" id="txtBox" value="<?php echo isset($_POST['company']) ? $_POST['company'] : '' ?>"  name="company" />
</div>


<?php
if(isset($error))
{
   echo $error;
}
?>
<br>
<br>
<br>
<div class="form-group">
		<input class = "buttonA" type="submit" name="Register" value="register"/> 
		</div>
	
</form>
</div>
</div>	


		</div>	

		
			<div class="row">
		 <div class="col-xs-12">
		<footer>
		<img id="logoFoot" src ="images/Logo.png" alt ="logo"/>
			<p><b>Address: 5A twickenham road, london SJ5 7AE</b></p>
		</footer>
		</div>
		</div>
		</div>

	</body>
</html>