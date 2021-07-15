<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<style>
        body{
            background-image: url("wallpaper.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        input[type=text] {
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
    <br><br><label><b>Enter Email</b></label><br>
    <label>to continue</label><br><br>
    <label>Email</label>
    <input type="text" name="mail">
    <a href="Signin.htm">Sign In</a> 
    <input type="submit" name="for" value="Continue">
  </form>
</div>
	<?php
		$conn = new mysqli("sql209.epizy.com", "epiz_29151924", "GjXNT1H4bX2G8Cf", "epiz_29151924_docsafer");
   		if ($conn->connect_error) 
   		{
        	die("Connection failed: " . $conn->connect_error);
    	}
        if(isset($_POST['for'])) 
        {
            $tmpid= $_POST['mail'];
            $sel= "select * from users where email='$tmpid'";
    
            $result= mysqli_query($conn, $sel);
            $row= mysqli_fetch_assoc($result);
            $count= mysqli_num_rows($result);
            if($count=1)
            {
		        session_start();
                $_SESSION['ur']= $GLOBALS['tmpid'];
                $_SESSION['qs']= $row['question'];
                $_SESSION['ans']= $row['answer'];
                echo "<script>document.location.href='security.php'</script>";         
            }
            else
            {
    	       echo "<script>alert('ID not Found.');</script>";
    	       echo "<script>document.location.href='forgot.php'</script>";
            }
        }
	?>
	
</body>
</html>