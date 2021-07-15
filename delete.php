<?php
	$con= new mysqli("sql209.epizy.com", "epiz_29151924", "GjXNT1H4bX2G8Cf", "epiz_29151924_docsafer");
	session_start();
	$na= $_SESSION['del'];
	$tb= $_SESSION['tab'];
	$quy= "DELETE FROM $tb WHERE id='$na'";
	$run= mysqli_query($con, $quy);
	if($run)
	{
		echo "<script>alert('Deleted.');</script>";
		echo "<script>document.location.href='homepage.php'</script>";
	}
?>