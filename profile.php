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
	
			if(!isset($_SESSION["username"]))
{
	//user tried to access the page without logging in
	header( "Location: add.php" );

}		
			
if(isset($_SESSION["username"]))
{
	echo "Welcome, you are now logged in as <b>".$_SESSION['username'] . "</b>,with the status:<b>". $_SESSION['occupation'] ." </b><img class='clientView' src='images/loginIcon.png' alt='client'>"; }
	else { 
	echo "You are currently not logged in";
	}
	$login = $_SESSION['user_ID'];
	
	$query = "SELECT * FROM user WHERE user_ID = :user_ID"; 
$term = $conn->prepare($query);
$term->bindValue(':user_ID', $login);
$term->execute();

$login = $term->fetch(PDO::FETCH_OBJ);		
			
			

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
			<h2><i class="fa fa-car" style="font-size:36px;"></i>&nbsp;My Profile</h2>
			</div>
	</div>
	</div>
		<div class="row">
		
		
	<div class="col-sm-6">
	
				<div class="right">
				<br>
			<i>One of the best sites to find the best qualified and skilled drivers in the UK.</i>
			<br><br>
		 <p>Your profile is a record of your personal information that defines who you are. The record includes your name and affiliation. If you
		 wish to update your profile details, fill in the form below.</p>
			<br />
			<div class="info"><p>
			
			<?php
			$user	= $_SESSION["username"];

$query = "SELECT * FROM user WHERE username = :username"; 

$term = $conn->prepare($query);
$term->bindValue(':username', $user);
$term->execute();

if ($user = $term->fetch(PDO::FETCH_OBJ))
	{
		echo "<img class='recruit img-responsive' src='images/profile.png' alt='recruitment'>";

		echo "<h2>Your Details:</h2>";
		echo "<h3><b>Full name:</b> " . $user->firstname . " " . $user->surname ."</h3>";
echo "<h4><b>Username:</b> " . $user->username ."</h4>"; 
//echo "<h4><b>Contact Number:</b> ". $user->contact_number . "</h4>";
echo "<h4><b>Current Rank:</b> " . $user->occupation ."</h4>";
echo "<h4><b>Company Name:</b> " . $user->company ."</h4>";
echo "<br>";
	};		
			?>
	</div>		
		</div>
		</div>	
		<div class="col-sm-6">
		<div class="right">
		<h5>Made a mistake when registering your details on the site? update your details below! </h5>
	
<b> Please note, you must fill in all fields when attempting to update your details. </b> <br><br>
<b> You will also be logged out automatically and will need to log in again with the username and password you have entered. </b>
		
		<br>
		<br>
		
			<form class="form-horizontal"  action="update.php" method="POST">
		<h3><u>Update Profile </u></h3>
		
<br>
		<div class="form-group">
		
		<label class="control-label col-sm-2" for="name">FirstName: </label>
		<div class="col-sm-10">
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<input type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" id="name" name="name">
	
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
		<input type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" id="Username" name="username">
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
		<input type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" id="Password" name="password">
		</div>
		<span class="error"> <?php 
		if (isset($passErr)) {
		echo $passErr;
		} 
		?></span>
</div>
	<input class = "buttonA" type="submit" name="Update" value="Update"/> 
</div>


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
		 <div class="col-sm-12">
		<footer>
		<img id="logoFoot" src ="images/Logo.png" alt ="logo"/>
			<p><b>Address: 5A twickenham road, london SJ5 7AE</b></p>
		</footer>
		</div>
		</div>
		

	</div>
	</body>
</html>