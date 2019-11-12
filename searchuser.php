<html>



</html>
<?php
	require "dbutil.php";
	$db = DbUtil::loginConnection();	
	$stmt = $db->stmt_init();
	if($stmt->prepare("select * from user where username like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['searchuser'] . '%';
		$stmt->bind_param(s, $searchString);
		$stmt->execute();
		$result = $stmt->get_result();
		echo "<table border=1><th>User ID</th><th>Username</th><th>Location</th><th></th>\n";
		while($row = $result->fetch_assoc()) {
			$uid = $row['uid'];
			$username = $row['username'];
			$location = $row['location'];
			echo "<tr><td>$uid</td><td>$username</td><td>$location</td><td><button>Add to Group</button></td></tr>";
		}
		echo "</table>";
		$stmt->close();
	}
	$db->close();
?>
