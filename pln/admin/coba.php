<?php
session_start();
$email = $_SESSION['email'];
$sql = mysqli_query($conn, "SELECT * FROM users");
 while($row=mysql_fetch_array($sql))
    {
        $email = $row['email'];
    }
    echo $email;
?>