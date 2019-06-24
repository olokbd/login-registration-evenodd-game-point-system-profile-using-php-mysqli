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

<body><br>

<?php

if(!isset($_GET['action'])){
	
	header('Location: index.php');
	
}

if(isset($_GET['action'])){
	
	$action=$_GET['action'];
	
	require'connection.php';
	
	$uname=$_SESSION['username'];
	
}

if($action=='allm'){
	
	echo "<h5>All Users"."</h5>"."<br>";
	
    $sql="select * from users";
    
	if($row=mysqli_query($conn, $sql)){
		
		while($result=mysqli_fetch_assoc($row)){
			
			$id=$result['id'];
			
		echo $result['id']."."."<a href='profile.php?action=uprofile&id=$id'> ". "<font size='4' color='brown'>".$result['username']."</font>"."</a>"."<br>";
		
		}
		
	}
	
	echo"<br>"."<h3>"."<img src='images/home.gif'>"."<a href='index.php'>Home</a>"."</h3>";
	
}

elseif($action=='uprofile'){
	
		if(!isset($_GET['id'])){
			
			header('Location: profile.php');
			
		}
		
	$id=$_GET['id'];
	
    $sql="select * from users where id='$id' ";
    
    $row=mysqli_query($conn, $sql);
    
    $result=mysqli_fetch_assoc($row);
    
    	echo "<h5>Profile of ".$result['username']."</h5>"."<br>"."<center>";
    	
    	echo 'Username: '.'<b>'.'<font size="4" color="brown">'.$result['username'].'</font>'.'</b>'.'<br>';


echo 'BirthDay: '.'<b>'.'<font size="4" color="green">'.$result['birth_day']
.$result['birth_month']." ".$result['birth_year'].'</font>'.'</b>'.'<br>';

echo 'Gender: '.'<b>'.'<font size="4" color="green">'.$result['gender'].'</font>'.'</b>'.'<br>';

echo 'G-Points: '.'<b>'.'<font size="4" color="orange">'.$result['gpoint'].'</font>'.'</b>'.'<br>'.'<br>'.'</center>';
    
echo "<br>"."<h3>"."<img src='images/home.gif'>"."<a href='index.php'>Home</a>"."</h3>";
	
}


elseif($action=='rankm'){
	
	echo"<h5>Top Ranked Member</h5>";
	
	$sql="select * from users order by gpoint desc";
	
	if($row=mysqli_query($conn, $sql)){
		
		$count=mysqli_num_rows($row);
		
		while($result=mysqli_fetch_assoc($row)){
			
			$id=$result['id'];
			
				echo "<font size='4' color='brown'>". "<b>". "<a href='profile.php?action=uprofile&id=$id'>".$result['username']."</a>"."</b>"."</font>"."("."<b>".$result['gpoint']."</b>".")"."<br>";
			
 		}
 		
	}
	
	echo "<br>"."<h3>"."<img src='images/home.gif'>"."<a href='index.php'>Home</a>"."</h3>";
	
}

?>

</body>

</html>