<?php
include("job-data.php");

function getWorkerById($conn,$job_id)
{
    $query = "SELECT * FROM jobs WHERE job_id=:job_id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':job_id',$job_id);
    $stmt->setFetchMode(PDO::FETCH_CLASS,'workers');
    $stmt->execute();
    $worker=$stmt->fetch();
    return $worker;
}
?>