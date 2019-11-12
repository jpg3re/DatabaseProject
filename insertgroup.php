<?php
   require_once("library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
           return null;
     }
    session_start();
    if(isset($_SESSION["username"])){
        $username=$_SESSION["username"];
        echo "Showing results for User: $username ";
        echo "<br>";
        // Form the SQL query (an INSERT query)
        $sql="INSERT INTO group (mood,location,leader)
        VALUES
        ('$_POST[mood]','$_POST[location]','$username')";
        
        if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }
    echo "1 record added"; // Output to user
    mysqli_close($con);
    }else{
        echo "Please sign in to view your songs";
    }
    mysqli_close($con);
?>
