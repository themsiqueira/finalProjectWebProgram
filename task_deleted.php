<html>
<head><title></title>
<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
 
<body>
<?php
session_start();
if(isset($_SESSION["username"]) && isset($_GET["task_id"]))
{

$DBHOST = "remotemysql.com";
$DBUSER = "aFJFlCDpk1";
$DBPWD = "TCntTtN2dQ";
$DBNAME = "aFJFlCDpk1";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($conn->connect_error) 
{
die("Connection failed: " . $conn->connect_error);
} 

$task_id = $_GET["task_id"];
$statement = "DELETE FROM task WHERE task_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("i", $task_id);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location:display_task.php");
}

else
{ 
header("Location:display_task.php");
}/*prevents direct access of URL */
?>



</body>
</html>