<?php

session_start();

if(isset($_SESSION["loggedin"]) || isset($_SESSION["loggedin"])== true){
	
	  header("location: welcome.php?action=main"); 
	  
}

?>

<!DOCTYPE html>

<html>

<head>

<meta name='viewport' content='width=device-width,initial-scale=1'>

<title>IMUNNA</title>

<link rel='stylesheet' type='text/css' href='style.css'>

</head>

<body>

<br/>

<h5>Login Here!</h5>

<center><form method='GET'>

Username:<br><input type='text' name='username'><br>

Password:<br><input type='password' name='password'><br>

<input type='submit' value='Login'>

</form>

<br/>

Don't Have an Account ?<img src='images/baby.gif'><br/><img src='images/right.gif'>
<a href='registration.php'>Register Here</a><img src='images/left.gif'><br><br><br>

<h2><a href="index.php"><img src="images/home.gif" alt="*"/>Home</a></h2>

<?php

if(isset($_GET['username']) && isset($_GET['password'])){
	
	require 'connection.php';
	
	$username=mysqli_real_escape_string($conn, $_GET['username']);
	
	$password=mysqli_real_escape_string($conn, $_GET['password']);
	
$sql="SELECT * FROM users WHERE username='$username' AND password='$password' ";

$query=mysqli_query($conn, $sql);

$rows=mysqli_num_rows($query);

if($rows==1){
	
	session_start();
	
	$_SESSION['loggedin']= true;
	
	$_SESSION['username']=$username;
	
	header('Location: welcome.php?action=main');
	
}else{
	
	echo"<br>"."<h3>"."<img src='images/notok.gif'>"."Username or Password does not match !</h3>";
	
}
	
	
}
if(isset($_GET['action'])&&($_GET['action'])=='logerr'){
	
    echo '<center>'.'<img src="images/notok.gif">'.'You must be logged to play EvenOdd game  :)'.'<br>';
     
}
?>
</body>
</html>