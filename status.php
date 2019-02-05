
<?php
include ("db_fncs.php");
try{
       $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);

}
catch (PDOException $exception) 
{
echo "Oh no, there was a problem" . $exception->getMessage();
}

$status = $_POST["status"];
//$job = $_POST["job_number"];
$job = $_POST["job_id"];
//print_r($_POST);

$query = "UPDATE job SET status = :status WHERE job_id = :job_id";


    // Prepare statement
    $stmt = $conn->prepare($query);
$stmt->bindValue(':status', $status);
$stmt->bindValue(':job_id', $job);
    // execute the query
    $stmt->execute();
 //echo $stmt->rowCount() . " records UPDATED successfully";
 $statusErr = "<h3>The job status has now been updated, press back to return to the previous page</h3>";
 include ("statusUpdate.php");

?>