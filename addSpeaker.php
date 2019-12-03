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
            $spid=$_REQUEST['spid'];

            $sql="INSERT INTO plays (spid, gid)
            VALUES
            ($spid,$gid)";
            if(mysqli_query($con,$sql)){
                echo "successfully added";
            }else{
                $sql="UPDATE plays SET gid=$gid WHERE spid=$spid";
                mysqli_query($con,$sql);
            }
            header('Location: myList.php');
        }
    }
   mysqli_close($con);
?>