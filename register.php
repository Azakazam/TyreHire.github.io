<?php
session_start();
include ("db_fncs.php");
include ("login-data.php");
try{
       $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);

}
catch (PDOException $exception) 
{
echo "Oh no, there was a problem" . $exception->getMessage();
}


//get the form data
$name=trim($_POST['name']);
$username=trim($_POST['username']);
$surname = trim($_POST['surname']);
//$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$password = md5($_POST['password']);
$company = trim($_POST['company']);

//$validate the form data
$validForm=true;

if (isset($_POST['occupation'])) {
	$occupation = $_POST['occupation'];
}


if (empty($_POST["company"]))
			{
		$company = "N/A";
			}
			
			

if (empty($_POST["surname"]))
			{
			$surErr = "*required";
			$validForm=false;
			}
if (empty($_POST["name"]))
			{
			$nameErr = "*required";
			$validForm=false;
			}
if (empty($_POST["username"]))
			{
			$userErr = "*required";
			$validForm=false;
			}
if (empty($_POST["password"]))	
			{
			$passErr = "*required";
			$validForm=false;
			}
if (empty($_POST["occupation"]))	
			{
			$occupationErr = "*required";
			$validForm=false;
			}
if (empty($_POST["company"]))	
			{
			$occupationErr = "*please ensure this is filled in";
			$validForm=false;
			}
			


		
if (strlen($username) > 15)
			{
			$userErr = "*username must be under 15 characters";
			$validForm=false;
			}
	
//insert into the database

if (!$validForm) {

include("account.php");
return false;

}	
else
{
  $query = "SELECT * FROM user WHERE username = :username"; 
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':username', $username);
	  // $stmt->bindValue(':user_ID', $user_id);
    $stmt->execute();
	
	if  ($stmt->rowCount() > 0){
    $userErr = "*Username Already Exists.";
	include("account.php");
return false;
} else {
	
	

$conn=getConn();
$successRegister=selectNew($conn,$name,$surname,$username,$password,$occupation,$company);
if ($successRegister) {
$error = "<br><br>You are now registered, pleae login to continue.";
include("account.php");
}
$conn=NULL; //close the connection

}

}


?>