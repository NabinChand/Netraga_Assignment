<!DOCTYPE html>
<html>
<head>
	<title>My Place</title>
	<style type="text/css">
		body{
            background-image: url("wallpaper.jpg");
            background-repeat: no-repeat;
			background-size: cover;
        }

		.dive{
			height: 260px;
			width: 300px;
			border: 1px solid black;
		}

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
	</style>
</head>
<body>
	<ul>
		<!-- <li class="logo"><img src="logo.jpg" height="60px" width="70px"></li> -->
		<li class="logo"><h3>Image Gallery</h3></li>
		<li class="da"><a href="Signout.php">SIGN OUT</a></li>
		<li class="da"><a href="myacc.php">MY ACCOUNT</a></li>
	</ul>
	<div class="dive">
	<form method="post" enctype="multipart/form-data">
		<br><br>
		<label style="margin-left: 100px; font-weight: bold;">Add Image</label><br><br>
		<input type="text" style="margin-left: 50px;" name="imgname" placeholder="Name"><br><br>
		<textarea style="margin-left: 50px;" name="imgcaption" placeholder="Caption"></textarea><br><br>
		<input type="file" style="margin-left: 20px;" name="image"><br><br>
		<input type="submit" style="margin-left: 100px;" name="sumit" value="Upload" />
	</form>
	</div>
	<?php
		session_start();
		$ma=$_SESSION['ur'];
		if(isset($_POST['sumit']))
		{
			if($_FILES['image']['size']==0)
			{
				echo "<script>alert('Select an image.');</script>";
				echo "<script>document.location.href='homepage.php'</script>";
			}
			else
			{
				$image= addslashes($_FILES['image']['tmp_name']);
				$name= $_POST['imgname'];
				$caption= $_POST['imgcaption'];
				$image= file_get_contents($image);
				$image= base64_encode($image);
				saveimage($name, $caption, $image);
			}
		}
		dispalyimage();
		function saveimage($name, $caption, $image)
		{
			$con= new mysqli("sql209.epizy.com", "epiz_29151924", "GjXNT1H4bX2G8Cf", "epiz_29151924_docsafer");
				$r= $GLOBALS['ma'];
				$sel= "SELECT uid, fname FROM users WHERE email='$r'";
			$run= mysqli_query($con, $sel);
    		$row= mysqli_fetch_assoc($run);
    		$n= $row['fname'];
    		$n.= $row['uid'];
			$qry= "insert into $n (name, caption, image) values ('$name', '$caption', '$image')";
			$result= mysqli_query($con, $qry);
			if($result)
			{
				echo "<script>alert('Image Uploaded');</script>";
			}
			else
			{
				echo "<script>alert('Image not Uploaded');</script>";
			}
		}
		function dispalyimage()
		{
			$con= new mysqli("sql209.epizy.com", "epiz_29151924", "GjXNT1H4bX2G8Cf", "epiz_29151924_docsafer");
			$ri= $GLOBALS['ma'];
			$sel= "SELECT uid, fname FROM users WHERE email='$ri'";
			$run= mysqli_query($con, $sel);
    		$row= mysqli_fetch_assoc($run);
    		$n= $row['fname'];
    		$n.= $row['uid'];
			$qry= "SELECT * FROM $n";
			$result= mysqli_query($con, $qry);
			while($row= mysqli_fetch_array($result))
			{
					echo "<style>.card {box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;width: 40%;
} .container { padding: 2px 16px; }</style>";
					echo "<br><br><center><div class='card'>";
					echo '<img style="width:50%; height:50%;" src="data:image;base64,'.$row[3].' ">';
					echo "<div class='container'>";
					echo "<h4><b>".$row[1]."</b></h4>";
					echo "<p>".$row[2]."</p>";
					echo "<p>To download image right click on image and select 'Save Image As'</p>";
					echo "</div>";
					echo "</div></center>";

					$_SESSION['del']= $row[0];
					$_SESSION['tab']= $n;
					echo "<form action='delete.php'>";
					echo "<br><center><input type='submit' value='Delete'>";
					echo "</form></center>";
			}
			mysqli_close($con);
		}
	?>
</body>
</html>