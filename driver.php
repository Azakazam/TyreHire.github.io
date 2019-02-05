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
		<a href="main.php">
			<img class="img-responsive" src ="images/Logo.png" alt ="logo"/>
		</a>
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
	</div>
	</div>
		<div class="row">
	<div class="col-xs-12">
	
		<div class="newHead">
			<h2><i class="fa fa-car" style="font-size:36px;"></i>&nbsp;Driver's Profile</h2>
			</div>
				<div class="right">
			<p>One of the best sites to find the best qualified and skilled drivers in the UK.</p>
			<img class="recruit img-responsive" src="images/profile.png" alt="recruitment">
		
			<p>You are now displaying the user profile for the selected user:</p>
		<div class="info"><p>
	
			<?php


if (!isset($_GET['user_id']))
	{
	echo "You shouldn't have got to this page";
	exit;
	}

//$drive = $_GET['driver_id'];
$firstname = $_GET['firstname'];
$surname = $_GET['surname'];
$user_id = $_GET['user_id'];

//$_SESSION["selected_driver"]=$drive;
$_SESSION['firstname'] = $firstname;
$_SESSION['surname'] = $surname;
$_SESSION['user_id'] = $user_id;

//print_r($_SESSION);


$query = "SELECT * FROM driver INNER JOIN licence on licence.licence_id = driver.licence_id INNER JOIN user on driver.user_ID = user.user_ID WHERE driver.user_id = :driver"; 
//SELECT * FROM driver  INNER JOIN user on driver.user_ID = user.user_ID INNER JOIN licence on licence.licence_id = driver.licence_id
$term = $conn->prepare($query);
$term->bindValue(':driver', $user_id);
$term->execute();

if ($user_id = $term->fetch(PDO::FETCH_OBJ))
	{
			echo "<img class='imagetax' alt='Image not available' src='images/" . $user_id->picture . "'>";
		echo "<br>";
	echo "<div class=align>";

echo "<ul class='result' style= list-style-type:none>";


echo "<li><h3><u>" . $user_id->firstname ." ". $user_id->surname . "</u></h3></li>";
	

	//echo "<li><img id='imagetax' src='" . $drive->image . "'></li>";

	//echo "<img id='genreLogo' src='images/genrelogo.png' alt='genrelogo'>";

	echo "<br>";
	echo "<li><b>User id: </b>" . $user_id->user_ID . "</li>";
	echo "<li><b>Gender:</b>" . $user_id->gender . "</li>";
	echo "<li><b>Licence owned: </b>" . $user_id->licence_type. "</li>";
	//echo "<img id='platformLogo' src='images/platformlogo.png' alt='platformlogo'>";
	echo "<li><b>Email Address: </b>" .$user_id->email_address . "</li>";
	echo "<li><b>Contact Number: </b>" .$user_id->contact_number . "</li>";
//echo "<a href='add-job.php?driver_id=" . $drive->driver_id . " &user_id=". $drive->user_ID ."'>";
	echo "<br>";
	echo "<br>";
echo "<a href='add-job.php?user_id=" . $user_id->user_ID ." &firstname=". $user_id->firstname ." &surname=". $user_id->surname ."'>";

echo "<button style='margin-left:-30px' class='button' type='submit' name='jobs' value='7'>Add Job</button>";
echo "</a>";

echo "<a href='search.php'>";
echo "<button style='width:140px' class='button' type='submit' name='jobs' value='7'>New Search</button>";
echo "</a>";

	echo "</br>";
		echo "</br>";
	echo "</div>";
	echo "</ul>";

	}

$conn = NULL;
?>  

	</p></div>

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