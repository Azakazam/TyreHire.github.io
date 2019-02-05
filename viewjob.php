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
<script src="†ttps://ajax.googleapis.com/ajax/libs[jquery/3.2.1/jquery.min.js"></script>

<!-- Lates— compiled JavaScript -->
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
	$login = $_GET['user_id'];	
$rank =	$_GET['occupation'];
//print_r($_SESSION);

		//print_r($_SESSION);		
if(isset($_SESSION["username"]))
{
	echo "Welcome, you are now logged in as <b>".$_SESSION['username'] . "</b>,with the status:<b>". $_SESSION['occupation'] ." </b><img class='clientView' src='images/loginIcon.png' alt='client'>"; }
	else { 
	echo "You are currently not logged in";
	};
	
	
//$login = $_SESSION['user_ID'];

	
	$query = "SELECT * FROM user WHERE user_ID = :user_ID"; 
$term = $conn->prepare($query);
$term->bindValue(':user_ID', $login);
$term->execute();

$login = $term->fetch(PDO::FETCH_OBJ);		

	
			


//print_r($_GET);
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
			<h2><i class="fa fa-car" style="font-size:36px;"></i>&nbsp;Current Jobs</h2>
			</div>
	</div>
	</div>
		<div class="row">
	<div class="col-xs-12">
	
		
				<div class="right">
			<p>All job requests created by the admin will appear here, you will have the option of accepting or declining a job offer </p>
		

		
						<form class="form-horizontal"  action="" method="POST">
		<h3><u>Job Details </u></h3>
		
		
		
	<div class="form-group">

	<?php
	if(count($workers)>0){
		echo "<p>  Select a job below to view its details  	</p>";
	}
	else {
		
		echo "<p> You currently have no jobs to view </p>";
	}
if (isset($_SESSION['message'])) {
	print $_SESSION['message'];
$_SESSION['message'] = null;
}
else {
	$_SESSION['message'] = "";
}
	
foreach($workers as $worker)
{
    echo "<ul>";
	/*echo "<input class = buttonA type=submit name=Apply value=Apply>"; */
	
    echo "<li class='joblist'><a href='job-list.php?job_id=".$worker->job_id."'></a>";
	echo "<a href='job-list.php?job_id=".$worker->job_id."' class='buttonApply'>View</a>";
	// echo "<li class='joblist'>";
	// echo "<a href='job-details.php?job_id=".$worker->job_id."' class='buttonApply'>View</a>";
    echo "<b> Job Role: </b>" .$worker->job_title;
	echo "<br>";
	echo "<b> Expiry Date: </b>" .$worker->expiry;
	echo "</li>";
    echo "</ul>";
	//echo $test;
	//<a class="button" href="all-jobs-delete.php">Delete a job</a>
	//echo $error;
}
echo "</br>";

if(isset($pass))
{
   echo $pass;
}
echo "</br>";


if($_SESSION["occupation"]==="Client"){
echo "<a class=button href='all-jobs-delete.php?user_id=".$login->user_ID."'> Delete a job</a>";
	echo "<br>";
	//if ($workers === "") {
		//$test = "<p>this failed</p>";
	//}
	
	}
?>	




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