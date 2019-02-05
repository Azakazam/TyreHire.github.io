<?php

include("config.inc.php");

function getConn()
{
	try{
       $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);
	}
	catch (PDOException $exception) 
	{
	echo "Oh no, there was a problem" . $exception->getMessage();
	}
	return $conn;
}

?>