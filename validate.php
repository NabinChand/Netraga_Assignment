<?php
    $conn = new mysqli("sql209.epizy.com", "epiz_29151924", "GjXNT1H4bX2G8Cf", "epiz_29151924_docsafer");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $tmpid= $_POST['usr'];
    $tmppwd= $_POST['pass'];

    $sel= "select * from users where email='$tmpid' and password='$tmppwd'";
    
    $result= mysqli_query($conn, $sel);
    $row= mysqli_fetch_assoc($result);
    $count= mysqli_num_rows($result);
    
    if ($count==1) 
    {
    	date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d H:i:s');
        $mod = "UPDATE users SET lastlogin='$date' WHERE email='$tmpid'";
        $res= mysqli_query($conn, $mod);
        if(strcmp($tmpid, "chand.nabin546@gmail.com")==0)
    	{
    		session_start();
            $_SESSION['ur']= $tmpid;
            echo "<script>document.location.href='admin.php'</script>";
    	}
    	else
    	{
    		session_start();
            $_SESSION['ur']= $tmpid;
            echo "<script>document.location.href='homepage.php'</script>";
    	}
    }
    else
    {
    	echo "<script>alert('Incorrect Username or Password');</script>";
    	include('Signin.htm');
    }
?>