<?php
	session_start();

	$sql = "DELETE FROM signupn where vote1=2";
	if($connect->query($sql)){
		$_SESSION['success'] = "Votes reset successfully";
	}
	else{
		$_SESSION['error'] = "Something went wrong in reseting";
	}

	header('location: vote1.php');

?>