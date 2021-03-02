<html>
<head><title></title>

	 <link rel="stylesheet" type="text/css" href="assets/style.css">
</head> 
<body>
<?php


if(!empty($_POST["username"]) && !empty($_POST["password"]))
{

$DBHOST = "remotemysql.com";
$DBUSER = "aFJFlCDpk1";
$DBPWD = "TCntTtN2dQ";
$DBNAME = "aFJFlCDpk1";
$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);


if($conn->connect_error)
{
die("Connection failed!".$conn->connect_error);
}

 

$username = $_POST["username"];
$password = $_POST["password"];
$hashed = password_hash($password, PASSWORD_DEFAULT);


$statement = "SELECT * FROM user WHERE username=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows>=1)
{
$value = "duplicate";
header("Location: signup.php?user=$value");
}

else
{ 
$statement = "INSERT INTO user(username, password) VALUES(?, ?)";
$stmt = $conn->prepare($statement);
$stmt->bind_param("ss", $username, $hashed);
$stmt->execute();

$value = "successful";
header("Location: index.php?user=$value"); 
} /*verify if there is a duplicate user */

$conn->close();
} 

else
{
header("Location: sign_up.php");
} /*verify user not directly accessing this page */

?>
</body>
</html>

