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
			
	$login = $_SESSION['user_ID'];
	
	$query = "SELECT * FROM login WHERE user_ID = :user_ID"; 
$term = $conn->prepare($query);
$term->bindValue(':user_ID', $login);
$term->execute();

$login = $term->fetch(PDO::FETCH_OBJ);		
	$job = $_GET['job_id'];
//$_SESSION["job_number"]=$job;
//print_r($_SESSION);	


$status = "Waiting to be accepted";
$status2 = "Accept Job";
$status3 = "Decline Job";
				
if(isset($_SESSION["username"]))
{
	echo "Welcome, you are now logged in as <b>".$_SESSION['username']."</b> <img class='clientView' src='images/loginIcon.png' alt='client'>"; }
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
		<div class="right">
			<h2>Current Jobs</h2>
			<p>One of the best sites to find the best qualified and skilled drivers in the UK.</p>
		
		

		
		
		
		
						<form class="form-horizontal formApply"  action="status.php" method="POST">
		<h2><u>Job Details </u></h2>
		
	<div class="form-group">
		
<?php
echo "<h3>Name of Driver :".$worker->firstname." ".$worker->surname. "</h3>";
	echo "<h3>Job role :".$worker->jobTitle."</h3>";

echo "<ul>";
echo "<h3> About the role </h3>";
echo "<li><b>Company Name:</b>".$worker->company."</li>";
echo "<li><b>test:</b>".$job->firstname."</li>";
echo "<li><b>Job Description:</b>".$worker->jobDescription."</li>";
echo "<h3>shift pattern</h3>";
echo "<li><b>Start Time: </b>".$worker-> startTime."</li>";
echo "<li><b>End Time: </b>".$worker-> endTime."</li>";
echo "<br />";
echo "<li><b>start Date:</b>".$worker->startDate."</li>";
echo "<li><b>Job Expiry Date:</b>".$worker->expiry."</li>";
echo "<b><h4>Current Status: </b>".$worker->status."</h4>";
echo "</ul>";


if($_SESSION["occupation"]==="driver"){



?>


 <div class="form-group">
 <label class="control-label col-sm-2" for="search">Change status here: </label>
  	<div class="col-sm-3">
	
		<select class="form-control" value="" name="status" > 
		<option value="waiting to be accepted">Waiting to be accepted</option>
		<option value="Job has been accepted">Accept</option>
		<option value="Job has been declined">Decline</option>
		</select> 
		
		<input class="buttonA" type="submit" value="Update" />
	<br>
	<br>
	<br>
	<?php 
		if (isset($statusErr)) {
		echo $statusErr;
		} 
		?>
</div>
</div>

<?php
}
?>




	 <div class="form-group">
 <!--<label class="control-label col-sm-2" for="search"></label> 	  -->
  	<div class="col-sm-3">
	
	<!--	<select class="form-control" name="status" > 
		<option value="<? echo $job;?>"><?php echo $job;?></option>
		</select>  -->
		
		<input type="hidden" value="<?php echo $job; ?>" name="job_id">
	
</div>
</div>



<!-- <input class = "buttonA" type="submit" name="Apply" value="Change status"/> -->
		</div>			
		

		
	

		
	
</form>
		
		</div>	
		
		
		</div>
		</div>
		

		
		
		<div class="row">
		 <div class="col-xs-12">
		<div id="BottomArea">
		<h4> Recruitment Agencies </h4> 
		<div class="row">
		 <div class="col-xs-3">
		<img class="FxPic img-responsive" src="images/fxpic.png" alt="fx-logo">
		</div>
		 <div class="col-xs-3">
		<img class="driverhire img-responsive"  src="images/driverhire.jpg" alt="driverhire">
		</div>
		 <div class="col-xs-3">
		<img class="logi img-responsive" src="images/logi.png" alt="logi-logo">
		</div>
		 <div class="col-xs-3">
		<img class="pebble img-responsive" src="images/noel.png" alt="pebbles">
		</div>
		</div>
	
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
		
		<script src=myjs.js></script>
	</div>
	</body>
</html>