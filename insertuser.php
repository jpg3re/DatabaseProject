<?php
   include_once("library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
   // Form the SQL query (an INSERT query)
   //$password=$_POST[password];
   //echo $password;
   //$hashed_password=password_hash($password, PASSWORD_DEFAULT);
   $sql="INSERT INTO user (location, username, password)
   VALUES
   ('$_POST[location]','$_POST[username]','$_POST[password]')";
   if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
   //echo "1 record added"; // Output to user
   $username = (isset($_REQUEST['username']) ? $_REQUEST['username'] : null);   
   session_start();
   $_SESSION["username"]=$username;
   header('Location: myList.php');
   mysqli_close($con);
?>

