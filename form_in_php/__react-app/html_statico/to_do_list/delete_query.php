<?php
	require_once 'conn.php';
 
	$task_id = filter_input(INPUT_GET,'task_id', FILTER_VALIDATE_INT);
	if($_GET['task_id']){
		$task_id = $_GET['task_id'];
 
		$conn->query("DELETE FROM `task` WHERE `task_id` = $task_id") or die(mysqli_errno($conn));
		header("location: manager.php");
	}	else {
		echo 'problemi';
	}
?>