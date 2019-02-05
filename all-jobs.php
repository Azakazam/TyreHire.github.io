
<?php


/*controller */

include ("db_fncs.php");

include("job-insert.php");
try{
    $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);

}
catch (PDOException $exception) 
{
    echo "Oh no, there was a problem" . $exception->getMessage();
}


if ($_SESSION['occupation']=== "driver") {
	$workers=getJobs($conn); //call getJobs
}
else {
	$workers=getAllJobs($conn); //call getJobs
}

$conn=NULL;

include("viewjob.php");

?>
