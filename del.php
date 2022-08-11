<?php
    session_start();
    include "con.php";
    if(isset($_GET['del'])) {
		$id = $_GET['del'];
		$sql = "DELETE from posts WHERE post_id = '$id'";
		mysqli_query($con, $sql);
        $_SESSION['message'] = "Deleted Successfully!"; 
		header('location:index.php');
	}

?>