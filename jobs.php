<?php
session_start();
include ("db_fncs.php");
include ("job-insert.php");
try{
       $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);

}
catch (PDOException $exception) 
{
echo "Oh no, there was a problem" . $exception->getMessage();
}
$user	= $_SESSION["username"];

$query = "SELECT * FROM user WHERE username = :username"; 

$term = $conn->prepare($query);
$term->bindValue(':username', $user);
$term->execute();

$user = $term->fetch(PDO::FETCH_OBJ);
	

//get the form data
$company=trim($_POST['company_name']);
$jobTitle=trim($_POST['jobTitle']);
$jobDescription=trim($_POST['jobDescription']);
$startTime=trim($_POST['startTime']);
$endTime=trim($_POST['endTime']);
//$startDate=$_POST['startDate'];
$user_ID = $_POST['user_id'];
$admin = $_POST['admin_id'];
$status = $_POST["status"];
//$newDate = date("dd-mm-yyyy", strtotime($startDate));
//$expDate = date("dd-mm-yyyy", strtotime($expire));
//$validate the form data
$validForm=true;
//$now = new DateTime();


$startDate = $_POST['startDate'] ;
$newDate = strtotime($startDate) ;

$expire=$_POST['expire'];
$expDate =  strtotime($expire);

if ($newDate < time()) {

    $dateErr = "*Please ensure you select a valid date";
	$validForm=false;
}

if ($expDate < $newDate) {
	
	$expireErr = "*Please ensure you select a valid date";
	$validForm=false;
}


/*
if (empty($_POST["company_name"]))
			{
			$jobErr = "*required";
			$validForm=false;
			}
		*/	
if (empty($_POST["jobTitle"]))
			{
			$titleErr = "*required";
			$validForm=false;
			}
if (empty($_POST["jobDescription"]))	
			{
			$descErr = "*required";
			$validForm=false;
			}
if (empty($_POST["startTime"]))	
			{
			$timeErr = "*required";
			$validForm=false;
			}
if (empty($_POST["startDate"]))	
			{
			$dateErr = "*required";
			$validForm=false;
			}	
			
if (empty($_POST["expire"]))	
			{
			$expireErr = "*required";
			$validForm=false;
			}	
			
if (empty($_POST["endTime"]))	
			{
			$endErr = "*required";
			$validForm=false;
			}	

				
//insert into the database

if (!$validForm) {

//header("location: add-job.php?user_id=" . $user->user_ID ." &firstname=". $user->firstname ." &surname=". $user->surname ."");

include("add-job.php");

	return false;
}	
else
{




//print_r($_POST);


$conn=getConn();
$successJob=insertJob($conn,$company,$jobTitle,$jobDescription,$startTime,$endTime,$startDate,$expire,$user_ID,$admin,$status);
if ($successJob) {
$error = "The job has now been added to the site!";
//include("add-job.php");
$_SESSION['message'] = '<b>Your job has now been assigned to the selected driver</b><br><br><br>';
header("location: all-jobs.php?user_id=" . $user->user_ID . "&occupation=". $user->occupation ."");
}

$conn=NULL; //close the connection

}



?>