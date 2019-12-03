<?php
   include_once("library.php");
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
   $sql="INSERT INTO user (location, username, password)
   VALUES
   ('$_POST[location]','$_POST[username]','$_POST[password]')";
   if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
   $username = (isset($_REQUEST['username']) ? $_REQUEST['username'] : null);   
   session_start();
   $_SESSION["username"]=$username;
   header('Location: myList.php');
   mysqli_close($con);
?>

