<html>
<head><title></title>

    <link rel="stylesheet" type="text/css" href="assets/style.css">
 
 </head>
<body>

<?php

echo "<img src='assets/todo_list_logo.png' id='logo'/>";
echo "<br>";
echo "<form class='form' action='check_signup.php' method='POST'>";

if(isset($_GET["user"]))
{

if($_GET["user"]=="successful")
{
	echo "<h4>Successfully Added User!</h4>";
 
}

else if($_GET["user"]=="duplicate")
{
	echo "<h4>User Already Exists</h4>"; 
	
	echo "<h4>Please Enter Another Username And Password</h4>";
 
}



}
 
else
{
echo "<h4>Sign up</h4>";
}
echo "<label for='username' class='label'> Username:</label>";
echo "<input class='text' type='text' name='username' placeholder='Username'>";
echo "<br>";

echo "<label for='password' class='label'>Password:</label>";
echo "<input class='text' type='password' name='password' placeholder='Password'>";
echo "<br>";
echo "<input class='submit' type='submit' value='Sign Up'/>";	
echo "</form>";
echo "</div>";
?>
</body>
</html>
