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


//get the form data


$contact=trim($_POST['contactNumber']);
$role=($_POST['role']);
$email_address=trim($_POST['email_address']);  
$user_ID = $_POST['user_ID'];
$birthdate = $_POST['birthdate'];
$picture = $_POST['pic'];
//$validate the form data
$validForm=true;

if (isset($_POST['gender'])) {
	$gender= $_POST['gender'];
}

if (isset($_POST['role'])) {
	$role = $_POST['role'];
}

if (is_numeric($_POST["contactNumber"]))	
			{
			
			$validForm=true;
			}
else {			
	$numberErr = "*please ensure you only enter numbers";
	$validForm=false;
}

if (empty($_POST["email_address"]))	
			{
			$emailErr = "*required";
			$validForm=false;
			}
if (empty($_POST["contactNumber"]))	
			{
			$numberErr = "*required";
			$validForm=false;
			}
		
if (empty($_POST["gender"]))	
			{
			$genderErr = "*required";
			$validForm=false;
			}	
			
	
		if (empty($_POST["pic"]))	
			{
			$picErr = "*required";
			$validForm=false;
			}		
if (empty($_POST["birthdate"]))
			{
			$dateErr = "*required";
			$validForm=false;
			}			


//insert into the database

if (!$validForm) {

include("interest.php");
return false;

}	
else
{


//print_r($_POST);



$conn=getConn();
$successInterest=selectNew($conn,$user_ID,$gender,$role,$email_address,$contact,$picture,$birthdate);
if ($successInterest) {
$error = "Thank you for showing interest in our company. Please keep checking your jobs page for the latest positions available ";
include("interest.php");
}
else {
	$error = "Unfortunately you cannot proceed as you either have already registered with us or you haven't filled in all required fields. ";
include("interest.php");
	
}
$conn=NULL; //close the connection

}

function selectNew($conn,$user_ID,$gender,$role,$email_address,$contact,$picture,$birthdate)
{
    
    
    $query = "INSERT INTO driver  (user_ID, gender, licence_id, email_address, contact_number, dateofbirth, picture) VALUES (:user_ID, :gender, :role, :email_address, :contact, :dateofbirth, :pic)";
    
    $stmt = $conn->prepare($query);
	  $stmt->bindValue(':user_ID', $user_ID);
    $stmt->bindValue(':gender', $gender);
    $stmt->bindValue(':role', $role);
    $stmt->bindValue(':email_address', $email_address);
    $stmt->bindValue(':contact', $contact);
	$stmt->bindValue(':dateofbirth', $birthdate);
	$stmt->bindValue(':pic', $picture);
   $affected_rows = $stmt->execute();
    
  if ($affected_rows == 1) {
        
       return true;
	

    } else {
        return false;

    }
}


?>