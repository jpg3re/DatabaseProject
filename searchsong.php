<html>



</html>
<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();	
	$stmt = $db->stmt_init();
	if($stmt->prepare("select * from song where name like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['searchsong'] . '%';
		$stmt->bind_param(s, $searchString);
		$stmt->execute();
		$result = $stmt->get_result();
		echo "<table border=1><th>Song ID</th><th>Name</th><th>Artist</th><th>Mood</th><th></th>\n";
		while($row = $result->fetch_assoc()) {
			$sid = $row['sid'];
			$name = $row['name'];
			$artist = $row['artist'];
      $mood = $row['mood'];
      echo "<tr><td>$sid</td><td>$name</td><td>$artist</td><td>$mood</td><td>
      <form action='add.php' method='post'> 
      <input type='submit' value='Run me now!'> 
      <input type='hidden' name='sid' value=$sid>
      </form>
      </td></tr>";
		}
		echo "</table>";
		$stmt->close();
	}
	$db->close();
?>
