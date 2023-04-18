<?php
	require_once 'conn.php';
 
	if($_GET['task_id'] != ""){
		$task_id = $_GET['task_id'];
 
		$conn->query("UPDATE `task` SET `stato` = 'Fatto' WHERE `task_id` = $task_id") or die(mysqli_errno($conn));
		header('location: manager.php');
	}
?>