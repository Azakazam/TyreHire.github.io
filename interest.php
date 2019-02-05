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
<div class="container">
		<header> 
	
			<img class="img-responsive" src ="images/Logo.png" alt ="logo"/>
	
		</header>
		
		
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
	}
	
			if(!isset($_SESSION["username"]))
{
	//user tried to access the page without logging in
	header( "Location: add.php" );

}



	$login = $_SESSION['user_ID'];

	$query = "SELECT * FROM user WHERE user_ID = :user_ID"; 
$term = $conn->prepare($query);
$term->bindValue(':user_ID', $login);
$term->execute();

$login = $term->fetch(PDO::FETCH_OBJ);
	//print_r($_SESSION);	
	
	
	
	
			
	if($login->occupation === "Client")
{
	header("Location:errorPage.php");
}

	
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

				 <li><a href="main.php"> Home <span class="glyphicon glyphicon-print"></span></a></li>
               <li><a href="search.php"> Search <span class="glyphicon glyphicon-print"></span></a></li>
			  <li><?php echo "<a href='all-jobs.php?user_id=" . $login->user_ID . "&occupation=". $login->occupation ."''> Current Jobs <span class='glyphicon glyphicon-print'></span></a>";?> </li>
			   <li><a href="interest.php"> Register Availability <span class="glyphicon glyphicon-print"></span></a></li>
			   <li><a href="profile.php"> My Profile <span class="glyphicon glyphicon-print"></span></a></li>
			   <li><a href="logout.php"> Logout <span class="glyphicon glyphicon-print"></span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="account.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="add.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
	<div class="newHead">
			<h2><i class="fa fa-car" style="font-size:36px;"></i>&nbsp;Register your Availability</h2>
			</div>
	</div>
 <div>
			<div class="row">
			<div class="col-sm-6">
		
	
			<div class="right">
			<h3> Create your Driver Profile </h3>
			<br>
			<img class="newrecruit img-responsive" src="images/greendriver.jpg" alt="driver">
			<br>
			<p>this is the registraiton page where drivers can add their details to the search engine for admins to find and allocate jobs to their account. </p>
			<p>To start receiving jobs, add your details as a driver and someone will keep you posted once a suitable job is available.
			All job requests you receive will appear on the current jobs page.</p>
<br>
			<b>Please note: you will only be able to register once, also ensure you fill in all required fields. </b>
			<br>
			<br>
			<br>
			</div>
			</div>
		
			
					<div class="col-sm-6">
		
	
			<div class="right">
			
			<form class="formThree form-horizontal"  action="add-interest.php" method="POST">
		<h3><u>Your Details</u></h3>
		

		 <div class="form-group">
 <!--<label class="control-label col-sm-2" for="search"> User ID</label> 	-->
  	<div class="col-sm-3">
	<!--
		<select class="form-control" name="user_ID" > 
		<option value="<? echo $term['user_ID'];?>"><?php echo $login->user_ID; ?></option>
		</select>
			-->
		<input type="hidden" value="<?php echo $login->user_ID; ?>" name="user_ID">
	
</div>
</div>


<div class="form-group">
		<label class="control-label col-sm-2" for="Email"> Email Address: </label>
		<div class="col-sm-10">
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input type="text" id="email" name="email_address" value="<?php echo isset($_POST['email_address']) ? $_POST['email_address'] : '' ?>">
		</div>
		<span class="error">

		<?php 
		if (isset($emailErr)) {
		echo $emailErr;
		} 
		?></span>
		</div>
</div>
		

<div class="form-group">
		<label class="control-label col-sm-2" for="contactNumber"> Contact Number: </label>
		<div class="col-sm-10">
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
		<input type="text" id="contactNumber" name="contactNumber" value="<?php echo isset($_POST['contactNumber']) ? $_POST['contactNumber'] : '' ?>"> 
		</div>
		<span class="error"> <?php 
		if (isset($numberErr)) {
		echo $numberErr;
		} 
		?></span>
	</div>
</div>	
		
			<div class="form-group">
		<label class="control-label col-sm-2" for="Date"> Date Of Birth: </label>
		<div class="col-sm-10">
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
  <input type="date" name="birthdate" value="<?php echo $birthdate;?>">
  </div>
  <span class="error"> <?php 
		if (isset($dateErr)) {
		echo $dateErr;
		} 
		?></span>
  </div>
</div>	


 <div class="form-group">
 <label class="control-label col-sm-2" for="search">License type:</label> 
  	<div class="col-sm-6">
		<select class="form-control"  value="" name="role" > 
		<option value="1">Class 2</option>
		<option value="2">Forklift</option>
		<option value="3">Cat A2</option>
		<option value="4">Cat B</option>
		<option value="5">D1</option>

		</select>
</div>
</div>
 

<label>Gender: </label> <span class="error"> <?php 
		if (isset($genderErr)) {
			echo $genderErr;
		} 
		?></span>
 

<div class="radio">
<label for="male"><input type="radio" name="gender" value="male" id="male">Male: </label>
</div>
<div class="radio">
<label for="female"><input type="radio" name="gender" value="female" id="female">Female: </label>
</div>



 <input class = "buttonA" type="submit" name="Register" value="Add Details"> 
 <div class="form-group">
 <label class="control-label col-sm-2" for="pic">Driving license:</label> <br><input type="file" name="pic" accept="image/*" ><span class="error">

 <?php 
		if (isset($picErr)) {
			echo $picErr;
		} 
		?></span>
 </div>

 <br>





<?php
if(isset($error))
{
   echo $error;
}
?>


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
		<script src=myjs.js></script>
	
	</body>
</html>