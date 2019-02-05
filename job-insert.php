<?php

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

function getJobs($conn)
{

 //$query = "SELECT * FROM jobs";
	$query = "SELECT * FROM job WHERE user_ID = :user_ID AND expiry > NOW()"; 
    $stmt = $conn->prepare($query);
	//$stmt->bindValue(':user_ID', $_SESSION["user_ID"]);
	$stmt->bindValue(':user_ID', $_SESSION['user_ID']);
    $stmt->execute();

    $workers=array();
    while($worker=$stmt->fetch(PDO::FETCH_OBJ))
    {
        $workers[]=$worker;
    }
    return $workers;
}

//INNER JOIN driver ON jobs.user_ID = driver.user_ID



function getAllJobs($conn)
{
 //$query = "SELECT * FROM jobs";
 $query = "SELECT * FROM job WHERE admin_id = :admin_id AND expiry > NOW()";
    $stmt = $conn->prepare($query);
	$stmt->bindValue(':admin_id', $_SESSION['user_ID']);
    $stmt->execute();
    $workers=array();
    while($worker=$stmt->fetch(PDO::FETCH_OBJ))
    {
        $workers[]=$worker;
    }
    return $workers;
}




 function insertJob($conn,$company,$jobTitle,$jobDescription,$startTime,$endTime,$startDate,$expire,$user_ID,$admin,$status)
 {
 $query="INSERT INTO job (job_id, company_name, job_title, job_description, start_time, end_time, start_date, expiry, user_ID, admin_id, status) VALUES (NULL, :company, :jobTitle, :jobDescription, :startTime, :endTime, :startDate, :expiry, :user_ID, :admin_id, :status)";

$stmt=$conn->prepare($query);
$stmt->bindValue(':company', $company);
$stmt->bindValue(':jobTitle', $jobTitle);
$stmt->bindValue(':jobDescription', $jobDescription);
$stmt->bindValue(':startTime', $startTime);
$stmt->bindValue(':endTime', $endTime);
$stmt->bindValue(':startDate', $startDate);
$stmt->bindValue(':expiry', $expire);
$stmt->bindValue(':user_ID', $user_ID);
$stmt->bindValue(':admin_id', $admin);
$stmt->bindValue(':status', $status);
$affected_rows = $stmt->execute();

	if($affected_rows==1){
		return true;
	}else{
	     
		return false;
	}
 
 }
 
 function deleteJobs($conn,$job_id) 
 {
 $query = "DELETE FROM job WHERE job_id=:job_id";
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':job_id',$job_id);
		$affected_rows=$stmt->execute();

 
 if($affected_rows==1){
		return true;
	}
	else{
		return false;
	}
 
 }
 
?>