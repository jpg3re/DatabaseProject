<?php
     require_once('./library.php');
     $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
     // Check connection
     if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
mysqli_connect_error());
           return null;
     }
     // Form the SQL query (a SELECT query)
     $sql="SELECT * FROM user WHERE username=username, password=password";
     $result = mysqli_query($con,$sql);
     mysqli_close($con);
?>
