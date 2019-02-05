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
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
	
		$login = $_GET['user_id'];	
			$user	= $_SESSION["username"];

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
	</div>
	</div>
		<div class="row">
	<div class="col-xs-12">
		
		<div class="newHead">	
			<h2><i class="fa fa-car" style="font-size:36px;"></i>&nbsp;Current Jobs</h2>
			</div>
			<div class="right">
			<p>One of the best sites to find the best qualified and skilled drivers in the UK.</p>
		
		
		
		
		
		
		
						<form class="form-horizontal"  action="delete-jobs.php" method="POST">
							
		<h3><u>Delete a job</u></h3>
		
			
	<p>  Tick the Jobs you want deleted, then press the delete button to proceed. 	</p>	
	
	<div class="form-group">
		<div class="scroll">

	<?php
	
	require_once("config.inc.php");

try{
       $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}


if(count($workers)>0){
	}
	else {
		echo "<p> You currently have no jobs to view </p>";
	}


foreach ($workers as $worker)
{
        echo "<p>";
					echo "<img class ='img-fluid delete' src=images/delete.png alt=delete> ";
		echo "<div class=joblist>";
		echo "<div class='checkbox'>";
        echo "<label style='font-size: 1.4em'>Job Title: ".$worker->job_title."<input type='checkbox' name='worker[]' id='worker".$worker->job_title."' value='".$worker->job_id."'><span class='cr'><i class='cr-icon fa fa-check'></i></span></label>";
		echo "</div>";
	    echo "</br>";
		echo "<b> Expiry Date: </b>" .$worker->expiry;
		echo "</div>";
		
        echo "</p>";
		
		$conn=NULL;
		
		// echo "<label style='font-size: 1.4em' for='worker".$worker->job_id."'>Job Title: ".$worker->jobTitle."<input type='checkbox' name='worker[]' id='worker".$worker->jobTitle."' value='".$worker->job_id."'><span class='cr'><i class='cr-icon fa fa-check'></i></span></label>";
}




?>	
	<input style="float:left;" class = "buttonA" type="submit" value="delete" name="remove">	
	</div>	
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
		
		<script src=myjs.js></script>
	</div>

	</body>
</html>