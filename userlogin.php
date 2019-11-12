<html>
<script src="js/nav.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/home.css">

</html>
<?php
     require_once('library.php');
     $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
     // Check connection
     if (mysqli_connect_errno()) {
           echo("Can't connect to MySQL Server. Error code: " .
mysqli_connect_error());
           return null;
     }
     // Form the SQL query (a SELECT query)
     $username = (isset($_REQUEST['username']) ? $_REQUEST['username'] : null);
     $password = (isset($_REQUEST['password']) ? $_REQUEST['password'] : null);
     //$statement =$db->prepare("SELECT * FROM Ingredients WHERE user='$username' ORDER BY recipe_id ASC");
     //$statement->execute();
     $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
     $result = mysqli_query($con,$sql);
     
    if(mysqli_num_rows($result)>0){
     while ($row = $result->fetch_row()) {
          session_start();
          $_SESSION["username"]=$row[2];
          //echo $row[2];
          header('Location: home.html');
      }
    }else{
         echo "Incorrect Password";
    }
     
     mysqli_close($con);
?>
