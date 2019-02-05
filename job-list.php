<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 



define( "DB_DATA_SOURCE", "mysql:host=localhost;dbname=u1451397" );
define( "DB_USERNAME", "u1451397" );
define( "DB_PASSWORD", "17apr96" );


try{
   $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);
}
catch (PDOException $exception) 
{
echo "Oh no, there was a problem" . $exception->getMessage();
}


		
	$login = $_SESSION['user_ID'];
	
	$query = "SELECT * FROM user WHERE user_ID = :user_ID"; 
$term = $conn->prepare($query);
$term->bindValue(':user_ID', $login);
$term->execute();

$login = $term->fetch(PDO::FETCH_OBJ);		
	$job = $_GET['job_id'];
//$_SESSION["job_number"]=$job;
//print_r($_GET);	


$status = "Waiting to be accepted by driver";
$status2 = "Accept Job";
$status3 = "Decline Job";


if(isset($_GET['job_id']))
{
	$job_id = $_GET['job_id'];
	$query = "SELECT * FROM job INNER JOIN user ON job.user_ID=user.user_ID WHERE job_id=:job_id";
	$stmt = $conn->prepare($query);
	$stmt->bindValue(':job_id',$job_id);
	$stmt->setFetchMode(PDO::FETCH_OBJ);
	$stmt->execute();
	$worker=$stmt->fetch();

}else{
 	echo "There are no details to display for this user";
}

$newQuery = "SELECT * FROM job WHERE job.job_id=job_id";
$newterm = $conn->prepare($newQuery);
$newterm->bindValue(':job_id', $job_id);
$newterm->execute();

$job_id = $newterm->fetch(PDO::FETCH_OBJ);	
//print_r($job_id);



$conn=NULL;
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
				
if(isset($_SESSION["username"]))
{
	echo "Welcome, you are now logged in as <b>".$_SESSION['username'] . "</b>,with the status:<b>". $_SESSION['occupation'] ." </b><img class='clientView' src='images/loginIcon.png' alt='client'>"; }
	else { 
	echo "You are currently not logged in";
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
		<h2><i class="fa fa-car" style="font-size:36px;"></i>&nbsp;Job Details</h2>
		</div>
	</div>
	</div>
		<div class="row">
	<div class="col-xs-12">
		<div class="right">
		
						<form class="form-horizontal formApply"  action="status.php" method="POST">

		
	<div class="form-group">

<?php
echo "<h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name of Driver :".$worker->firstname." ".$worker->surname. "</h3>";
	echo "<h3> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Job role: ".$worker->job_title."</h3><br>";
echo "<img class='driverImage img-responsive' src='images/driveradd.jpg' alt='driver'>";
echo "<ul style= 'list-style-type:none'>";
//echo "<h3> About the role </h3>";
echo "<li><h3>Company Name: ".$worker->company_name."</h3></li>";

echo "<li><b><h3>Job Description:</h3></b> <p>".$worker->job_description."</p></li>";
echo "<h3>shift pattern</h3> ";
echo "<li><b>Start Time: </b>".$worker-> start_time."</li>";
echo "<li><b>End Time: </b>".$worker-> end_time."</li>";
echo "<br />";
echo "<li><b>Start Date:</b>".$worker->start_date."</li>";
echo "<li><b>Job Expiry Date:</b>".$worker->expiry."</li>";

echo "</ul>";
echo "<h4>Why accept jobs from companies on Tyre Hire?</h4>

<p> &nbsp; We value the people who work for us as true professionals. We offer an attractive package, with competitive pay rates. You may also be offered training opportunities, uniforms and a range of other staff benefits.

Looking for a permanent job?
Many people who come to Tyre Hire are ultimately looking for help in finding a permanent job. If that’s you, we’ll be delighted to help. </p>";

if($_SESSION["occupation"]==="driver"){



?>


 <div class="form-group">
 <label class="control-label col-sm-2" for="search">Change status here: </label>
  	<div class="col-sm-3">
	
		<select class="form-control" value="" name="status" > 
		<option value="Waiting to be accepted by driver">Waiting to be accepted</option>
		<option value="Job has been accepted by driver">Accept</option>
		<option value="Job has been declined by driver">Decline</option>
		</select> 
		<br>
		<input class="buttonA" type="submit" value="Update" />
	<br>
	<br>
<br>

</div>
</div>

<?php
}
echo "<b><h4>Current Status: </b>".$worker->status."</h4>";
echo "<br>";
echo "<a a class=button href='all-jobs.php?user_id=" . $login->user_ID . "&occupation=". $login->occupation ."''> Back to Jobs</a>";
?>

<br>
<br>


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
		<footer>
		<img id="logoFoot" src ="images/Logo.png" alt ="logo"/>
			<p><b>Address: 5A twickenham road, london SJ5 7AE</b></p>
		</footer>
		</div>
		</div>

	</div>
	</body>
</html>