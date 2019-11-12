<?php
class DbUtil{
public static $user = "jpg3re";
public static $pass = "nah1Ughe";
public static $host = "cs4750.cs.virginia.edu";
public static $schema = "jpg3re";
public static function loginConnection() {
$db = new mysqli(DbUtil::$host, DbUtil::$user,
DbUtil::$pass, DbUtil::$schema);
if($db->connect_errno) {
echo "fail";
$db->close();
exit();
}
return $db;
}
}
?>

