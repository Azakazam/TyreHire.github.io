<?php
session_start();

include ("db_fncs.php");

try{
       $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);

}
catch (PDOException $exception) 
{
echo "Oh no, there was a problem" . $exception->getMessage();
}

$name=trim($_POST['name']);
$username=trim($_POST['username']);
$surname = trim($_POST['surname']);
$password = md5($_POST['password']);


$validForm=true;





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


			


		
if (strlen($username) > 15)
			{
			$userErr = "*username must be under 15 characters";
			$validForm=false;
			}
	
//insert into the database

if (!$validForm) {

include("profile.php");
return false;

}	
else
{
  $query = "SELECT * FROM user WHERE username = :username"; 
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
	
	if  ($stmt->rowCount() > 0){
    $userErr = "*Username Already Exists.";
	include("profile.php");
return false;
} else {
	
	
function updateProfile($conn, $name, $surname, $username, $password)
{

    $query = "UPDATE user SET firstname= :firstname, surname= :surname, username= :username, password= :password WHERE user_ID = :user_ID";
    
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':firstname', $name);
	$stmt->bindValue(':surname', $surname);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
	$stmt->bindValue(':user_ID', $_SESSION['user_ID']);

  $stmt->execute();
    

  
}

$conn=getConn();
$update=updateProfile($conn, $name, $surname, $username, $password);


if ($update) {
$error = "Your Profile has been updated";
include("profile.php");
}
else {
	session_destroy();
	session_start();
$_SESSION['message'] = '<b>Your account has now been updated.<br> You must login using your new login details.</b>';
header('Location: add.php');

}
$conn=NULL; //close the connection

}

}

?>