<html>



</html>
<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();	
	$stmt = $db->stmt_init();
	if($stmt->prepare("select * from speaker where name like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['searchspeaker'] . '%';
		$stmt->bind_param(s, $searchString);
		$stmt->execute();
		$result = $stmt->get_result();
		echo "<table border=1><th>Speaker ID</th><th>Name</th><th>Battery</th><th>Location</th><th></th>\n";
		while($row = $result->fetch_assoc()) {
			$spid = $row['spid'];
			$name = $row['name'];
			$battery = $row['battery'];
			$location = $row['location'];
			echo "<tr><td>$spid</td><td>$name</td><td>$battery</td><td>$location</td><td>
			<form action='addSpeaker.php' method='post'> 
      			<input type='submit' value='Add Speaker to Group'> 
      			<input type='hidden' name='spid' value=$spid>
      		</form>
			</td></tr>";
		} 
		echo "</table>";
		$stmt->close();
	}
	$db->close();
?>
