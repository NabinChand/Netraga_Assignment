<!DOCTYPE html>
<html>
<head>
	<title>New Password</title>
	<style>
        body{
            background-image: url("wallpaper.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
       

        input[type=submit] {
            width: 25%;
            background-color: blue;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            margin: 20px 300px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }



        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            margin: 150px 430px;
            height: 360px;
            width: 450px;
            padding: 10px;
        }
        a{
            text-decoration-line: none;
            float: left;
        }
    </style>
</head>
<body>
<div>
  <form method="post">
    <label style="font-size: 28px; color: green;"><b>Image Drive</b></label>
    <br><br><br><br><label><b>Enter New Password</b></label><br>
    <input type="password" name="pwd">
    <a href="Signin.htm">Sign In</a> 
    <input type="submit" name="pa" value="Change">
  </form>
</div>
	<?php
		$conn = new mysqli("sql209.epizy.com", "epiz_29151924", "GjXNT1H4bX2G8Cf", "epiz_29151924_docsafer");
   		if ($conn->connect_error) 
   		{
        	die("Connection failed: " . $conn->connect_error);
    	}

    	if(isset($_POST['pa']))
    	{
    		session_start();
    		$np= $_POST['pwd'];
    		$usr= $_SESSION['ur'];
    		$sql = "UPDATE users SET password='$np' WHERE email='$usr'";

			if ($conn->query($sql) === TRUE) 
			{
    			echo "<script>alert('Password Changed.');</script>";
                echo "<script>document.location.href='Signin.htm'</script>";
			} 
			else 
			{
    			echo "<script>alert('Password Not Changed.');</script>";
                echo "<script>document.location.href='forgot.php'</script>";
			}
			$conn->close();
			session_destroy();
    	}
	?>
</body>
</html>