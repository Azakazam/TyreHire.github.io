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
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
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
	
		
	
			$user	= $_SESSION["username"];
	$admin = $_SESSION["user_ID"];

$query = "SELECT *FROM user WHERE username = :username"; 

$term = $conn->prepare($query);
$term->bindValue(':username', $user);
$term->execute();

$user = $term->fetch(PDO::FETCH_OBJ);
	
	
	
	if($user->occupation === "driver")
{
	header("Location:errorPage.php");
}
	
			
			if(!isset($_SESSION["username"]))
{
	//user tried to access the page without logging in
	header( "Location: add.php" );

}

/*
	if (!isset($_GET['user_id']))
	{
	echo "You shouldn't have got to this page";
	
	return false;

	}
	*/

//$drived = $_GET['user_id']; //remove this

//$drive = $_SESSION["selected_driver"];
$user_ID = $_SESSION['user_id'];
$status = "Waiting to be accepted";

$company = $_SESSION["company"];
$driverf = $_SESSION['firstname'];
$drivers = $_SESSION['surname'];


$_SESSION['firstname'] = $driverf;
$_SESSION['surname'] = $drivers;
//print_r($_SESSION);

 $date = $_SESSION["date"];
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
		<li><?php echo "<a href='all-jobs.php?user_id=" . $user->user_ID . "&occupation=". $user->occupation ."''> Current Jobs <span class='glyphicon glyphicon-print'></span></a>";?> </li>
		
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
			<h2><i class="fa fa-car" style="font-size:36px;"></i>&nbsp;Add a job</h2>
			</div>

	</div>
	</div>
	
	
	
	
		<div class="row">
		
		<div class="col-sm-4">
		
	
			<div class="right">
			<h3> Assigning jobs to drivers</h3>
			<br>
			<br>
			<img class="newrecruit img-responsive" src="images/greendriver.jpg" alt="driver">
			<br>
			<br>
			<p>This is the registration page where you as the admin can allocate jobs to drivers selected from the search engine </p>
			<br>
			<br>
			<p>Once a job has been assigned to the driver, the driver will then receive your request within their job portal and
			have the option of declining or accepting the job</p>
<br>
<br>
<br>
			<b>Please note: You can assign as many jobs as you want to the driver.<br><br> Each job has an expiry date and will automatically delete when the date has passed. </b>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			</div>
			</div>
		
	<div class="col-sm-8">
			<div class="right">
	
		
		
					<form class="formThree form-horizontal"  action="jobs.php" method="POST">
		<h3><u>Job Details </u></h3>

			 <div class="form-group">
 <!--<label class="control-label col-sm-2" for="search"> User ID</label>  -->
  	<div class="col-sm-3">
	
	<!--<select class="form-control" name="user_ID" > 
		<option value="<? echo $user_ID['user_id'];?>"><?php echo $user_ID;?></option>
		</select> 	 -->
		
		<input type="hidden" value="<?php echo $user_ID;?>" name="user_id">
	
</div>
</div>
		
	 <div class="form-group">
	
 <!--<label class="control-label col-sm-2" for="search"> Admin ID</label> 	  -->
  	<div class="col-sm-3">
	
	<!--	<select class="form-control" name="admin_id" > 
		<option value="<? echo $admin['user_ID'];?>"><?php echo $admin;?></option>
		</select>  -->
		
		<input type="hidden" value="<?php echo $admin; ?>" name="admin_id">
	
</div>
</div>





 <?php // echo "<b>You are currently assigning a job to the Driver:</b>" . $driverf ." ". $drivers;	?>


	 <div class="form-group">
 <!--<label class="control-label col-sm-2" for="search"> Status</label> 	  -->
  	<div class="col-sm-3">
	
	<!--	<select class="form-control" name="status" > 
		<option value="<? echo $status;?>"><?php echo $status;?></option>
		</select>  -->
		
		<input type="hidden" value="<?php echo $status; ?>" name="status">
	
</div>
</div>
	
	
		<div class="form-group">
		<label class="control-label col-sm-2" for="jobtitle"> Driver Name </label>
		<div class="col-sm-4">
		
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
		<input type="text" value="<?php echo $driverf."".$drivers; ?>" id="driver" name="driver" readonly>
		</div>
	
		</div>
		</div>
	
	
	
		<div class="form-group">
		<label class="control-label col-sm-2" for="jobtitle"> Company Name </label>
		<div class="col-sm-4">
		&nbsp; &nbsp;
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
		<input type="text" value="<?php echo $company; ?>" id="company_name" name="company_name" readonly>
		</div>
	
		</div>
		</div>
	
	
	
	
	<!--
	
	 <div class="form-group">
 <label class="control-label col-sm-2" for="Companyname">Company Name: </label> &nbsp;	 
  	<div class="col-sm-4">
	 &nbsp; &nbsp;
	 
	<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
		<select class="form-control" name="company_name" > 
		<option value="<? echo $company;?>"><?php echo $company;?></option>
		</select> 
		</div>
		<input type="hidden" value="<?php echo $company; ?>" name="company_name" readonly>
	
</div>
</div>
		
		-->
		

	<br>
		
		<div class="form-group">
		<label class="control-label col-sm-2" for="jobtitle"> Job Title: </label>
		<div class="col-sm-10">
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
		<input type="text" value="<?php echo isset($_POST['jobTitle']) ? $_POST['jobTitle'] : '' ?>"  id="jobTitle" name="jobTitle">
		</div>
		<span class="error"> <?php 
		if (isset($titleErr)) {
		echo $titleErr;
		} 
		?></span>
		</div>
		</div>
				<br>
	
<div class="form-group">
		<label class="control-label col-sm-2" for="jobDescription"> Job Description: </label>
		<div class="col-sm-8">
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
	<textarea class="form-control" cols="50" name="jobDescription" rows="4" id="comment"><?php echo isset($_POST['jobDescription']) ? $_POST['jobDescription'] : '' ?></textarea>
	</div>
		<span class="error">

		<?php 
		if (isset($descErr)) {
		echo $descErr;
		} 
		?></span>
		</div>
</div>
		
		
			<br>

<div class="form-group">
		<label class="control-label col-sm-2" for="startDate">Date:</label>
		<div class="col-sm-10">
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
		 <input type="date" value="<?php echo $date;?>" name="startDate" readonly>
		 </div>
	</div>
</div>	
		
			<br>
<div class="form-group">
		<label class="control-label col-sm-2" for="startTime">Start time:</label>
		<div class="col-sm-10">
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
  <input type="time" name="startTime" value="<?php echo isset($_POST['startTime']) ? $_POST['startTime'] : '' ?>" >
  </div>
		<span class="error"> <?php 
		if (isset($timeErr)) {
		echo $timeErr;
		} 
		?></span>
</div>
</div>	
		<br>

<div class="form-group">
		<label class="control-label col-sm-2" for="endTime">End time:</label>
		<div class="col-sm-10">
		 	<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
  <input type="time" name="endTime" value="<?php echo isset($_POST['endTime']) ? $_POST['endTime'] : '' ?>" >
  </div>
		<span class="error"> <?php 
		if (isset($endErr)) {
		echo $endErr;
		} 
		?></span>
</div>
</div>	
 

		
		
		<div class="form-group">
		<label class="control-label col-sm-2" for="expire"> Job Expiry Date:</label>&nbsp;
		<div class="col-sm-10">
			
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
		 <input type="date" name="expire" value="<?php echo isset($_POST['expire']) ? $_POST['expire'] : '' ?>">
		 </div>
		 <input class = "buttonA" type="submit" name="Register" value="Post Job"/> 
		<span class="error"> <?php 
		if (isset($expireErr)) {
		echo $expireErr;
		} 
		?></span>
	</div>

</div>	
			<a href="javascript://" class="btn btn-primary" role="button" data-toggle="popover" title="Job Expiry Date" data-content="The Job will be automatically deleted when the expiry date passes">About Expiry date</a>
		<br>
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
	</body>
</html>