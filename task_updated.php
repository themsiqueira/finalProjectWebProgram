<html>
<head><title></title>

</head>
<style>
	
	</style>
<body>
<?php
 
 
if(isset($_POST["task"]) && isset($_POST["task_id"]))
{ 
	
if($_POST["task"]=="")
{

$task_id = $_POST["task_id"];
	
header("Location: update_task.php?task_id=$task_id&field=incomplete");

		
}	

else if(!isset($_POST["day"]))
{
	$task_id = $_POST["task_id"];
	header("Location: update_task.php?task_id=$task_id&field=incomplete");
	
}

else
{
$DBHOST = "remotemysql.com";
$DBUSER = "aFJFlCDpk1";
$DBPWD = "TCntTtN2dQ";
$DBNAME = "aFJFlCDpk1";
$task = $_POST["task"];
$task_id = $_POST["task_id"];

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$statement = "UPDATE task SET task=? WHERE task_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("si", $task, $task_id);
$stmt->execute();
$stmt->close();

$date = $_POST["day"]."&nbsp".$_POST["month"]."&nbsp".$_POST["year"];
$time = $_POST["hour"].":".$_POST["minute"]."&nbsp".$_POST["am"];
	
	
	
$statement = "UPDATE task SET date=? WHERE task_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("si", $date, $task_id);
$stmt->execute();
$stmt->close();
	


$statement = "UPDATE task SET time=? WHERE task_id=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("si", $time, $task_id);
$stmt->execute();
$stmt->close();



$conn->close();


header("Location:display_task.php");

}
 

/*updates message and sends back to display_task with changed message*/
}


else
{
header("Location:display_task.php");
}
/*prevents direct access of URL*/
?>



</body>
</html>