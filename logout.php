<?php
session_start();
session_destroy();
header('Location: add.php');
session_start();
$_SESSION['message'] = '<b>You have successfully logged out.</b>';
exit;
?>