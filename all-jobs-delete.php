
<?php
include ("db_fncs.php");
$conn=getConn();

include("job-insert.php");

$workers=getAllJobs($conn); //call getAllClients
$conn=NULL;
include("remove/deleteView.php")
?>
