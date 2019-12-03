<?php
   include_once("library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
     $sql="SELECT * FROM user";

     
     $result = mysqli_query($con,$sql);
     $UserArray=[];
     $PassArray=[];
     while ($row = $result->fetch_row()) {
     $password=$row[3];
     $username=$row[2];
     $location=$row[1];
     $uid=$row[0];
     $hash = password_hash($password, PASSWORD_DEFAULT);
     $UserArray[]=$username;
     $PassArray[]=$hash;
     $locationArray[]=$location;
     $uidArray[]=$uid;
     //$sql2="UPDATE user SET password=$hash WHERE username=$username";
       // $result1 = mysqli_query($con,$sql2);
     }


     $sql="DELETE FROM user";
     if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
     for($i=0;$i<99;$i++){
         $pass=$PassArray[$i];
         $user=$UserArray[$i];
         $location=$locationArray[$i];
         $uid=$uidArray[$i];

         echo $user;
         echo "<br/>";
         echo $pass;
         echo "<br/>";
         $sql="INSERT INTO user (uid,location, username, password)
        VALUES
        ('$uid','$location','$user','$pass')";

        //$sql="UPDATE user SET password='$pass' WHERE username='$user' ";
        //$result1 = mysqli_query($con,$sql);
        if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
     }


     mysqli_close($con);

     ?>