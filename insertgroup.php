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

	$sql1="SELECT uid FROM user WHERE username='$username'";//selecting userid from session variable
        $result1 = mysqli_query($con,$sql1);
        //if(mysqli_num_rows($result)>0){
        $row= $result1->fetch_row();
        $uid=intval($row[0]);
        echo "User id: $uid";

        echo "Showing results for User: $username ";
        echo "<br>";
        // Form the SQL query (an INSERT query)
        $sql="INSERT INTO `group` (mood,location,leader)
        VALUES
        ('$_POST[mood]','$_POST[location]','$uid')"; //insert mood, location, and username into group table
        
        if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }

        $sql2="SELECT gid FROM `group` WHERE leader='$uid'";//selecting userid from session variable
        $result2 = mysqli_query($con,$sql2);
        $row= $result2->fetch_row();
        $gid=intval($row[0]);
	echo "Group id: $gid";

        //}
        $sql3="INSERT INTO participates (uid,gid) 
        VALUES
        ('$uid','$gid')";

        if (!mysqli_query($con,$sql3))
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
