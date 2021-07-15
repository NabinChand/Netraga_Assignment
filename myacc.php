<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
	<style type="text/css">
		ul {
    			list-style-type: none;
    			margin: 0;
    			padding: 0;
    			overflow: hidden;
    			background-color: #fff;
    			box-shadow: 0 2px 2px rgba(0,0,0,0.2);
		}

		 .logo {
    			float: left;
		}

		 .da {
    			float: right;
		}

		li a {
    			display: block;
    			color: #4a4a4a;
    			text-align: center;
 			    text-decoration: none;
 			    padding: 23px 32px;
		}

		li a:hover {
    			color: #dd5347;
		}

		.button {
			background-color: #dd5347;
			border: none;
			color: #fff;
			text-align: center;
			padding: 24px 48px;
			font-size: 14px;
			cursor: pointer;
		}
		body {
			font-family: "Roboto","Helvetica",arial,sans-serif;
			background-image: url("wallpaper.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

	</style>
</head>
<body>
	<ul>
		<!-- <li class="logo"><img src="logo.jpg" height="60px" width="70px"></li> -->
		<li class="logo"><h3>Image Gallery</h3></li>
		<li class="da"><a href="homepage.php">BACK</a></li>
	</ul>
	<?php
		session_start();
		$ur= $_SESSION['ur'];

		$conn = new mysqli("sql209.epizy.com", "epiz_29151924", "GjXNT1H4bX2G8Cf", "epiz_29151924_docsafer");
   		if ($conn->connect_error) 
    	{
        	die("Connection failed: " . $conn->connect_error);
    	}

    	$sel= "select * from users where email='$ur'";
    
    	$result= mysqli_query($conn, $sel);
    	$row= mysqli_fetch_assoc($result);

    	echo "<style>div {
            border-radius: 5px;
            background-color: lightgrey;
            margin: 150px 430px;
            height: 360px;
            width: 450px;
            padding: 10px;
        }</style>";
        echo "<div><center>";
    	echo "<br><br><br><br><b>Name:&nbsp;&nbsp".$row['fname']." ".$row['lname']."</b><br>";
    	echo "<br><b>Email ID:&nbsp;&nbsp".$row['email']."</b><br>";
    	echo "<br><b>Gender:&nbsp;&nbsp".$row['gender']."</b><br>";
    	echo "<br><b>Mobile NO.:&nbsp;&nbsp".$row['code']." - ".$row['mobile']."</b><br>";
		echo "<br><br><a href='forgot.php'>Forgot Password?</a>";
		echo "</center></div>";
	?>
</body>
</html>