


<?php


//connect to the db
include ("db_fncs.php");
include ("job-insert.php");


if(!isset($_POST["remove"]))
{
	header("Location:all-jobs-delete.php");
}

if(!isset($_POST['worker']))
{
	//echo "You need to select at least 1 client to delete, press back to return to the previous page";
	header( "Location: remove/delete-fail.php" );
}else
{
	$workers=$_POST['worker'];
	$conn=getConn();
	$count=0;
	
	
	
	
	
	foreach ($workers as $job_id) 
{
		
		if(deleteJobs($conn,$job_id))
		{
			$count++;
		}
}
	$conn=NULL;
	$pass = "<h3><b> You have successfully deleted $count jobs, press back to return to the previous page</b></h3>";
	include( "remove/delete-pass.php" );
		//include( "viewjob.php" );

}
if(count($workers)>0){
		//echo "<p>  Select a job below to view its details  	</p>";
	}
	else {
		
		echo "<p> You currently have no jobs to view </p>";
	}


$conn=NULL;
?>