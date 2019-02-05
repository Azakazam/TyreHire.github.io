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
			

			$user = $_SESSION["username"];

$query = "SELECT * FROM user WHERE username = :username"; 

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

		
	
if(isset($_SESSION["username"]))
{
	echo "Welcome, you are now logged in as <b>".$_SESSION['username'] . "</b>,with the status:<b>". $_SESSION['occupation'] ." </b><img class='clientView' src='images/loginIcon.png' alt='client'>";
	}
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
			<h2><i class="fa fa-car" style="font-size:36px;"></i>&nbsp; Find A Driver</h2>
			</div>
</div>
</div>
	<div class="row">
	<div class="col-sm-6">
	
	
	
				<div class="right">
				<h3> Search for drivers </h3>
				
		<img src="images/wheel.png" class="wheel" alt="wheel">	<p>To Find a driver suitable for the role you need filling, just select the licence type required
				and a list of drivers suitable for the position will appear. You also need to make use of the date field to see if the driver is available that day</p>
<img class="newrecruit img-responsive" src="images/recruit.jpg" alt="recruitment">
<br>

</div>
</div>

	<div class="col-sm-6">
				<div class="right">
		<form class="form-horizontal" name="Search" action="search.php" method="POST">
		    
    
		<h3><u>Search Engine </u></h3>
	 <div class="form-group">
	 	

		 <label class="control-label col-sm-2 searchP" for="search">Licence type:</label>
		
		 	<div class="col-xs-8">
		 <select class="selectJob form-control"  name="role" > 
		<option value="1">Class 2</option>
		<option value="3">Cat A2</option>
		<option value="2">Forklift</option>
		<option value="4">Cat B</option>
		<option value="5">D1</option>
		</select>
		</div>
		 <img class="search" src="images/search.png" alt="search">
		</div>
		
		<div class="form-group">
		<label class="control-label col-sm-2 searchP" for="Date"> Date Available:</label>
		<div class="col-sm-7"> &nbsp; 
		<div class="input-group">
     &nbsp; &nbsp;<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span> 
		<input type="date" name="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : '' ?>" > 
		 </div>
		<span class="error"> <?php 
		//$dateErr = "*Please ensure you select a date and its valid";
		
		if (isset($dateErr)) {
		echo $dateErr;
		} 
		
		?></span>
	</div>
</div>	
		<br>
		<br>
		<input class = "button" type="submit" value="submit"/> 
		</form>
	
		</div>
		</div>	
	</div>
	<div class="row">
	<div class="col-sm-12">
	
<div class="right">
	
	<h4> Your Results: </h4>

	
	<?php


/* here is my sql query */

if (isset($_REQUEST['role']) && !empty($_REQUEST['role']))
	{
	$search = $_REQUEST["role"];
	//$newDate = $_REQUEST["date"];

		$startDate = $_REQUEST["date"];
	 $_SESSION["date"] = $startDate;
$newDate = strtotime($startDate) ;
	

	//print_r($_SESSION);
	//print_r($_REQUEST);

	
	
	$page = "1";
	if (isset($_GET['page']))
		{

		

		$page = $_GET['page'];
		}

		
		
		if ($newDate < time()) {
echo $dateErr = "<span class='searcherror'> &nbsp; &nbsp;*Please select a valid date</span>";
  false;
 // return null;
   
	//include("search.php");
		//return false;
}
else
{
		
	$sql = "SELECT * FROM driver";
	$query = $conn->query($sql);

	// count all messages

	$num = $conn->prepare("SELECT COUNT(*) AS 'total' FROM driver WHERE license_type LIKE :role");
	$num->bindValue(':role', '%' . $search . '%');
	$num->execute();
	$row = $num->fetch();
	$num = $row['total'];
	$query->execute();


	
$newQuery = " SELECT * FROM licence WHERE licence_id = :licence_type";

	$testQuery = $conn->prepare($newQuery);
	$testQuery->bindValue(':licence_type', $search);
		
$testQuery->execute();
$row = $testQuery->fetch(PDO::FETCH_OBJ);

//echo $row -> licence_type;
	
$dateQuery = "SELECT * FROM driver INNER JOIN user on driver.user_ID = user.user_ID WHERE driver.licence_id=:role AND driver.user_ID NOT IN
 (SELECT driver.user_ID FROM job INNER JOIN driver on job.user_ID=driver.user_ID WHERE job.start_date=:startDate)";
 //NOT IN  ( SELECT FROM licence INNER JOIN driver on licence.licence_id = driver.licence_id INNER JOIN user on driver.user_ID = user.user_id WHERE licence.licence_type = :role)

	$newTerm = $conn->prepare($dateQuery);
	$newTerm->bindValue(':role', $search);
		$newTerm->bindValue(':startDate', $startDate);
$newTerm->execute();
$first = true;
//$row = $newTerm->fetch(PDO::FETCH_OBJ);
	//print_r($newTerm);
	
	while ($drive = $newTerm->fetch(PDO::FETCH_OBJ))
	//	while ($drive = $term->fetch(PDO::FETCH_OBJ) && $date = $newTerm->fetch(PDO::FETCH_OBJ))
		{
		if ($first)
			{
			$first = false;
			//echo "<div class=result><br>You have <b>$num</b> results!</div></br>";
			echo "<div class=result><h4><b>Current results for the selected date:". $startDate. " and licence type:". $row->licence_type. "</b></h4></div>";
			}

		echo "<ul class=result style = list-style-type:none>";
		echo "<li><a href='driver.php?driver_id=" . $drive->firstname . "'></a></li>";
		echo "<h4>";
		echo "<img class='clientView' src='images/loginIcon.png' alt='client'>   <a href='driver.php?firstname=". $drive->firstname ." &surname=". $drive->surname ." &user_id=". $drive->user_ID ." '>";

		
		echo $drive->firstname ." ".  $drive-> surname; 
		echo "</h4>";
		echo "</a>";
		echo "</ul>";
		}

		
		
		
	if ($first)
		{
		echo "<p><b> There are currently no drivers with the licence type: ". $row->licence_type. ", available on the selected date: ". $startDate. " , please try again.</b></p>";
		}
	$conn = NULL;
	
}
	};
?>
	
	
	
	<br>
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

