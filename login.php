<?php
session_start();
include ("db_fncs.php");
include ("login-data.php");
require_once("config.inc.php");

try{
       $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

if(!isset($_POST["Login"]))
{
	header("Location:new-user.php");
}

$username=trim($_POST['username']);
$password=$_POST['password'];

$username= htmlspecialchars($username);
$validForm = true;

if (empty($_POST["username"]))
			{
			$validForm=false;
			}
if (empty($_POST["password"]))	
			{
			$validForm=false;
			}
if (!$validForm) {

$error = "please ensure all fields are filled in";
include("add.php");
return false;

}			
		

$conn=getConn();
$successLogin=selectUser($conn,$username,$password);
if($successLogin)
{

       header( 'Location: profile.php');
}else{
       $error = "<b>The details you have entered are incorrect</b>";
      include("add.php"); 
}

$conn=NULL; //close the connection



?>