<?php
	$conn = new mysqli("sql209.epizy.com", "epiz_29151924", "GjXNT1H4bX2G8Cf", "epiz_29151924_docsafer");
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$gender=$_POST['gender'];
	$code=$_POST['code'];
	$number=$_POST['number'];
	$question=$_POST['question'];
	$answer=$_POST['answer'];

    $_SESSION['nm']= $fname;
    $_SESSION['mail']= $email;

	$ins= "insert into users(fname, lname, email, password, gender, code, mobile, question, answer) values ('$fname', '$lname','$email','$pass','$gender','$code','$number','$question','$answer')";
    
    $run= mysqli_query($conn, $ins);

    include('test.php');
    
    if($run)
    {
        echo "<script>alert('Registration Successful.');</script>";
        include('Signin.htm');
    }
    else
    {
    	echo "<script>alert('Registeration Failed.');</script>";
        include('Create.htm');
    }

$conn->close();
?>