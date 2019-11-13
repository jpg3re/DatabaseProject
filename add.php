<?php
   include_once("library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
   // Form the SQL query (an INSERT query)
   session_start();
   $username=$_SESSION['username'];
   $sql="SELECT uid FROM user WHERE username='$username'";//selecting userid from session variable
   $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
       $row= $result->fetch_row();
       $uid=$row[0];

       $sql="SELECT gid FROM participates WHERE uid='$uid' ";//selecting group id from userid
       $result = mysqli_query($con,$sql);
       if(mysqli_num_rows($result)>0){
            $row= $result->fetch_row();
            $gid=$row[0];
            echo "gid : $gid     . ";
         

            $sql="SELECT sid FROM queue WHERE gid='$gid' ";//selecting all the song ids on queue for a group id
            $result = mysqli_query($con,$sql);
            $numRows= mysqli_num_rows($result);
            $sid=$_REQUEST['sid'];
            echo"sid : $sid    . ";
            echo "number of rows: $numRows     . ";
            $sql="INSERT INTO queue (gid, position, sid)
            VALUES
            ($gid,$numRows,$sid)";
            mysqli_query($con,$sql);
        }
        else{
            echo "not in a group";
        }
    }
   mysqli_close($con);
?>