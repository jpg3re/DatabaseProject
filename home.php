<html>
<script src="js/nav.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/home.css">

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">MusicDB</a>
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
	<li class="nav-item">
          <a class="nav-link" id="recipes_nav" href="config_speaker.html">Configure New Speaker</a>
        </li>
      </ul>
    </div>
  </nav>
  <h1>Welcome to MusicDB</h1>
  <?php
  session_start();
  if(!(isset($_SESSION["username"]))){
  ?>  
  	<a class="btn btn-primary" href="signup.html" role="button">Click to sign up</a>
  	<a class="btn btn-primary" href="login.html" role="button">Click to Log in</a>
  <?php
  }
  else {
  ?>
        <a class="btn btn-primary" href="logout.php" role="button">Log Out</a>
  <?php
  }
  ?>
</body>

</html>
