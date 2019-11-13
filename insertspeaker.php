<?php
   include_once("library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
   // Form the SQL query (an INSERT query)
   $sql="INSERT INTO speaker (name, battery, location)
   VALUES
   ('$_POST[name]','$_POST[battery]','$_POST[location]')";
   if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
   echo "Successfully added your speaker"; // Output to user
   header('Location: config_speaker.html');
   mysqli_close($con);
?>

