<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	
	  header("location: index.php?action=logerr"); 
	  
}

?>

<!DOCTYPE html>

<html>

<head>

<meta name='viewport' content='width=device-width,initial-scale=1'>

<title>EvenOdd Game</title>

<link rel='stylesheet' type='text/css' href='style.css'>

</head>

<body>

<center><br>

<h5>EvenOdd Game</h5>

<?php

if(!isset($_GET['action'])){
	
	header('Location: game.php?action=start');
	
}

if(isset($_GET['action'])){
	
	$action=$_GET['action'];
	
}

if($action=='start'){
	
echo'System will select a random number and you have to guess if the number is '.'<b>even</b>'.' or'. '<b> odd</b>'.'<br>';

echo"<form action='game.php?action=main' method='POST'>";

echo"<input type='radio' name='guess' value='jor'>"."Even"."<br>";

echo"<input type='radio' name='guess' value='bejor'>"."Odd"."<br>"."<br>";

echo"<input type='submit' value='Submit'>"."</center>";

echo"</form>";

echo"<br>";

echo "<h3>"."<img src='images/home.gif'>"."<a href='index.php'>Home</a>";
	
}elseif($action=='main'){
	
include 'connection.php';

	
$uname=$_SESSION['username'];

echo"Welcome "."<b>"."<font size='4' color='blue'>"."$uname"."</font>"."</b>"."<br>";

$guess=$_POST['guess'];

if($guess=='jor'){
	
	$guess='Even';
	
	$x='jor';
	
}else if($guess=='bejor'){
	
	$guess='Odd';
	
	$x='bejor';
	
}else{
	
	header('Location: game.php?action=select');
	
}

$randn=rand(1,100);

echo 'Random Number: '.'<b>'.'<font size="4" color="orange">';
echo $randn.'</font>'.'</b>'.'</br>';

echo'Right Answer: ';

if($randn%2==0){
	
	echo '<b>'.'<font size="4" color="green">'.'Even'.'</font>'.'</b>';
	
	$y='jor';
	
}else{
	
	echo'<b>'.'<font size="4" color="green">'.'Odd'.'</font>'.'</b>';
	
	$y='bejor';
	
}

echo '<br>';

echo'Your Guess: '.'<b>'.'<font size="4" color="brown">';

echo $guess.'</b>'.'</font>'.'<br>'.'<br>';

$sql="select gpoint from users where username='$uname' ";

$row=mysqli_query($conn, $sql);

$result=mysqli_fetch_assoc($row);

if($x==$y){
	
	echo'<b>'.'Congratulation!! You have won <font size="5" color="green">'.'10'.'</font>'.' Game Points!'.'</b>'.'<br>';
	
	$newp=$result['gpoint'] + 10 ;
	
	$sql="update users SET gpoint = '$newp' where username='$uname' ";
	
	mysqli_query($conn, $sql);
	
}else{
	
	echo'<b>'.'Sorry!! You have lost '.'<font size="5" color="red">'.'5'.'</font>'.' Game Points!'.'</b>'.'<br>';
	
	$newp=$result['gpoint'] - 5 ;
	
	$sql="update users SET gpoint = '$newp' where username='$uname' ";
	
	mysqli_query($conn, $sql);
	
}

echo'<br>'.'<br>';

$sql="SELECT gpoint FROM users WHERE username='$uname' ";

$row=mysqli_query($conn, $sql);

$result=mysqli_fetch_assoc($row);

echo "<i>"."Your current game point is "."<font size='5' color='red'>"."<b>"."</i>".$result['gpoint']."</font>"."</b>"."<br>"."<br>";

echo'Play Again?'.'<br>';

echo'<br>'.'<br>';

echo'System will select a random number and you have to guess if the number is even or odd'.'<br>';

echo"<form action='game.php?action=main' method='POST'>";

echo"<input type='radio' name='guess' value='jor'>"."Even"."<br>";

echo"<input type='radio' name='guess' value='bejor'>"."Odd"."<br>"."<br>";

echo"<input type='submit' value='Submit'>";

echo"</form>"."<br>";

$sql="select username,id from users order by gpoint desc";

$row=mysqli_query($conn, $sql);

$result=mysqli_fetch_assoc($row);
$id=$result['id'];

echo "Top Member: "."<a href='profile.php?action=uprofile&id=$id'>".$result['username']."</a>";

echo"<br>"."<br>";
echo"<h2>"."<img src='images/home.gif'>"."<a href='index.php'>Home</a>"."</h2>";
echo"</center>";

}elseif($action=='select'){
	echo'<img src="images/notok.gif">';
	echo 'Please Select Even/Odd.'.'<br>'.'<br>'.'<h3>'.'<a href="game.php">Go Back</a>'.'</h3>';
	
}

?>

</body>
</html>