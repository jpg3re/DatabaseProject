<html>
<script src="js/nav.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/home.css">

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Website Name</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
	<li class="nav-item">
          <a class="nav-link" id="home_nav" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="create_nav" href="myList.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="recipes_nav" href="addsong.html">Add Song</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="recipes_nav" href="create_group.html">Create Group</a>
        </li>
      </ul>
    </div>
  </nav>
  
</body>

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
     session_start();
    if(isset($_SESSION["username"])){
    $username=$_SESSION["username"];
    echo "Showing results for User: $username ";
    echo "<br>";
    $sql="SELECT uid FROM user WHERE username='$username'";//selecting userid from session variable
    $result = mysqli_query($con,$sql);
     if(mysqli_num_rows($result)>0){
        $row= $result->fetch_row();
        $uid=$row[0];
        echo "User ID: $uid";
        echo "<br>";

        $sql="SELECT gid FROM participates WHERE uid='$uid' ";//selecting group id from userid
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            $row= $result->fetch_row();
            $gid=$row[0];
            echo "Group ID: $gid";
            echo "<br>";

            $sql="SELECT sid FROM queue WHERE gid='$gid' ";//selecting all the song ids on queue for a group id
            $result = mysqli_query($con,$sql);
            $songid;
            if(mysqli_num_rows($result)>0){
                while ($row = $result->fetch_row()) {
                    $songid=$row[0];
                     echo "Song ID: $songid";

                    $sql2="SELECT * FROM song WHERE sid ='$songid' ";
                    $result2=mysqli_query($con,$sql2);
                    $row2=$result2->fetch_row();
                    $songName=$row2[1];
                    echo " Name : $songName";
                    echo "<br>";

                }
            }else{
                echo "Please add songs to queue";
            }
        }else{
            echo "This user is not assigned to a group";
        }
    }
      
    }else{
        echo "Please sign in to view your songs";
    }
    // $result = mysqli_query($con,$sql);
     
     
     mysqli_close($con);
?>
