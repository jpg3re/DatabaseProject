<?php
     require_once('library.php');
     $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
     // Check connection
     if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
mysqli_connect_error());
           return null;
     }
     
     $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
    // $result = mysqli_query($con,$sql);
     
   // if(mysqli_num_rows($result)>0){
    // while ($row = $result->fetch_row()) {
   //       session_start();
    //      $_SESSION["username"]=$row[2];
   //       echo $row[2];
   //   }
  //  }else{
  //       echo "Incorrect Password";
  //  }
     
     mysqli_close($con);
?>
