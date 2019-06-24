<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	
	  header("location: index.php"); 
	  
}

?>

<!DOCTYPE html>

<html>

<head>

<meta name='viewport' content='width=device-width,initial-scale=1'>

<title>IMUNNA</title>

<link rel='stylesheet' type='text/css' href='style.css'>

</head>

<body align='center'><br>

<h5>Welcome Back <?php echo ($_SESSION['username']); ?></h5>

<?php
if(!isset($_GET['action'])){
	
	header('Location: index.php');
	
}

if(isset($_GET['action'])){
	
	$action=$_GET['action'];
	
}

if($action=='main'){

date_default_timezone_set('asia/dhaka');
echo '<p style="border-style: outset">';

echo date('l jS \of F Y h:i:sa')."<br>";

echo '</p>';

$uname=$_SESSION['username'];

require"connection.php";

$sql="select * from users where username='$uname' ";

$row=mysqli_query($conn, $sql);

$result=mysqli_fetch_assoc($row);

echo 'Username: '.'<b>'.'<font size="4" color="brown">'.$uname.'</font>'.'</b>'.'<br>';

echo 'Password: '.'<b>'.'<font size="4" color="blue">'.$result['password'].'</font>'.'</b>'.'<br>';


echo 'BirthDay: '.'<b>'.'<font size="4" color="green">'.$result['birth_day']
.$result['birth_month']." ".$result['birth_year'].'</font>'.'</b>'.'<br>';

echo 'Gender: '.'<b>'.'<font size="4" color="red">'.$result['gender'].'</font>'.'</b>'.'<br>';

echo 'G-Points: '.'<b>'.'<font size="4" color="orange">'.$result['gpoint'].'</font>'.'</b>'.'<br>'.'<br>';

$query="select * from users  ";


$row=mysqli_query($conn, $query);


$count=mysqli_num_rows($row);



echo'<a href="profile.php?action=allm">'.'<font size="4" color="blue">';
echo'View All User['.$count.']'.'</a>'.'</font>'.'<br>';

echo'<a href="profile.php?action=rankm">'.'<font size="4" color="orange">';
echo'Top Members['.$count.']'.'</a>'.'</font>'.'<br>'.'<br>';

echo "<a href=game.php>"."<font size='5' color='red'>"."EvenOdd Game"."</font>"."<br>"."<br>"."<br>";


echo "<h3>"."<a href='welcome.php?action=logout'>**Log Out**</a>"."</h3>"."<br>";

}


elseif($action=='logout'){
	
	session_unset();
	
	session_destroy();
	

echo'<img src="images/o.gif">'.'You Have Successfully Logged Out ! Please Come Back Soon :)'.'<br>'.'<br>';

echo'<h3>'.'<img src="images/home.gif">'.'<a href="index.php">Home</a>'.'</h3>';
	
}

?>


</body>

</html>