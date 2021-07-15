<?php
	$conn= new mysqli("sql209.epizy.com", "epiz_29151924", "GjXNT1H4bX2G8Cf", "epiz_29151924_docsafer");
    $n= $_SESSION['nm'];
    $m= $_SESSION['mail'];
    $sel= "SELECT uid FROM users WHERE email='$m'";

    $run= mysqli_query($conn, $sel);
    $row= mysqli_fetch_assoc($run);
    $n.= $row['uid'];
	$imgtbl="CREATE TABLE $n(
            id INT(6) AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            caption VARCHAR(240) NOT NULL,
            image LONGBLOB NOT NULL)";

    $exe= mysqli_query($conn, $imgtbl);
?>