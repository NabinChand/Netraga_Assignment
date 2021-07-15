<!DOCTYPE html>
<html>
<head>
	<title>Security Question</title>
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
	<label style="font-size: 28px; color: green;"><b>Image Drive</b></label>
	<?php
		session_start();
		$usr= $_SESSION['ur'];
        $q= $_SESSION['qs'];
        echo "<br><br><label>Your Security Questoin:</label>";
		echo "<br><br><label><b>".$q."</b></label>";
	?>
  <form method="post">
    <br><br>
    <label>Enter Answer</label>
    <input type="text" name="an">
    <a href="Signin.htm">Sign In</a> 
    <input type="submit" name="sec" value="Continue">
  </form>
</div>
    <?php
        session_start();
        $an= $_SESSION['ans'];
        if(isset($_POST['sec']))
        {
            $no= $_POST['an'];
            $l= $GLOBALS['an'];
            if(strcmp($l, $no)==0)
            {
                echo "<script>document.location.href='pwdchg.php'</script>";
            }
            else
            {
                echo "<script>alert('Incorrect Answer.');</script>";
                echo "<script>document.location.href='security.php'</script>";
            }
        }
    ?>
</body>
</html>