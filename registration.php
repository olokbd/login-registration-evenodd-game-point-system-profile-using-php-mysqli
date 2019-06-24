<?php

session_start();

if(isset($_SESSION["loggedin"]) || isset($_SESSION["loggedin"]) == true){
	
	  header("location: welcome.php"); 
	  
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

<?php

if(!isset($_GET['action'])){
	
	header('Location: registration.php?action=main');
	
}

else if(isset($_GET['action'])){
	
	$action=$_GET['action'];
	
}



if($action=='main'){
	
echo"<h5>Registration Form</h5>";

echo'<div class="mblock1">';

echo'<img src="images/point.gif" alt="*"/>Allowed characters in username and password are a-z and 0-9'.'<br/>';

echo'<img src="images/point.gif" alt="*"/>Username must contain at least 4 characters'.'<br/>';

echo'<img src="images/point.gif" alt="*"/>Password must contain at least 5 characters'.'<br/>';

echo'<img src="images/point.gif" alt="*"/>Username must not contain capitals'.'</div>'.'<br/>';

echo'<img src="images/point.gif" alt="*"/>';

echo'Username'.'<br/>'.'<form action="registration.php?action=usub" method="post">'.'<input name="username" maxlength="20"/>'.'<br/>'.
'<input type="submit" value="Next"/>'.'</form>'.'<br/>'.'<br/>';

echo'<h2>'.'<a href="index.php"><img src="images/home.gif" alt="*"/>Home</a>'.'</h2>';

}



elseif($action=='usub'){
	
	$username=$_POST['username'];
	
	if (!preg_match('/^[a-z0-9]+$/', $username)) { 
	
header('Location: registration.php?action=preg');

}

if(strlen($username)<4){
	
	header('Location: registration.php?action=strlen');
	
}

if(isset($_POST['username'])){
	
require 'connection.php';

$sql="select * from users where username= '$username' ";

$result=mysqli_query($conn, $sql);

$rows=mysqli_num_rows($result);

if($rows==1){
	
	echo "<h5>Registration Form</h5>".'<br>';
	
	echo'<img src="images/notok.gif">'.'Username '.'<b>'.$username.'</b>'.' is not available!'.'<br>'.'<br>'.'<h3>'."<a href='registration.php'>Go Back</a>".'</h3>';
	
}elseif($rows==0){
	
	echo'<h5>Registration Form</h5>'.'<br>';
	
echo'<img src=images/o.gif>';

echo'Username '.'<b>'.$username.'</b>'.' is available!';

echo"<form method='POST' action='registration.php?action=validation'>";

echo "Username: "."<input type='text' name='username' value='$username' readonly>";

echo"<br>";

echo "Password: "."<input type='password' name='password1'>"."<br>"."Confirm Password: "."<input type='password' name='password2'>"."<br>"."Date of Birth: "."<select name='birthd'>";

echo"<option value='1'>1</option>";
echo"<option value='2'>2</option>";
echo"<option value='3'>3</option>";
echo"<option value='4'>4</option>";
echo"<option value='5'>5</option>";
echo"<option value='6'>6</option>";
echo"<option value='7'>7</option>";
echo"<option value='8'>8</option>";
echo"<option value='9'>9</option>";
echo"<option value='10'>10</option>";
echo"<option value='11'>11</option>";
echo"<option value='12'>12</option>";
echo"<option value='13'>13</option>";
echo"<option value='14'>14</option>";
echo"<option value='15'>15</option>";
echo"<option value='16'>16</option>";
echo"<option value='17'>17</option>";
echo"<option value='18'>18</option>";
echo"<option value='19'>19</option>";
echo"<option value='20'>20</option>";
echo"<option value='21'>21</option>";
echo"<option value='22'>22</option>";
echo"<option value='23'>23</option>";
echo"<option value='24'>24</option>";
echo"<option value='25'>25</option>";
echo"<option value='26'>26</option>";
echo"<option value='27'>27</option>";
echo"<option value='28'>28</option>";
echo"<option value='29'>29</option>";
echo"<option value='30'>30</option>";
echo"<option value='31'>31</option>";
echo"</select>";

echo"<select name='birthm'>";

echo"<option value='Jan'>Jan</option>";
echo"<option value='Feb'>Feb</option>";
echo"<option value='Mar'>Mar</option>";
echo"<option value='Apr'>Apr</option>";
echo"<option value='May'>May</option>";
echo"<option value='Jun'>Jun</option>";
echo"<option value='Jul'>Jul</option>";
echo"<option value='Aug'>Aug</option>";
echo"<option value='Sep'>Sep</option>";
echo"<option value='Oct'>Oct</option>";
echo"<option value='Nov'>Nov</option>";
echo"<option value='Dec'>Dec</option>";
echo"</select>";

echo'<select name="birthy">';
echo'<option value="2018">2018</option>';
echo'<option value="2017">2017</option>';
echo'<option value="2016">2016</option>';
echo'<option value="2015">2015</option>';
echo'<option value="2014">2014</option>';
echo'<option value="2013">2013</option>';
echo'<option value="2012">2012</option>';
echo'<option value="2011">2011</option>';
echo'<option value="2010">2010</option>';
echo'<option value="2009">2009</option>';
echo'<option value="2008">2008</option>';
echo'<option value="2007">2007</option>';
echo'<option value="2006">2006</option>';
echo'<option value="2005">2005</option>';
echo'<option value="2004">2004</option>';
echo'<option value="2003">2003</option>';
echo'<option value="2002">2002</option>';
echo'<option value="2001">2001</option>';
echo'<option value="2000">2000</option>';
echo'<option value="1999">1999</option>'; 
echo'<option value="1998">1998</option>';
echo'<option value="1997">1997</option>';
echo'<option value="1996">1996</option>';
echo'<option value="1995">1995</option>';
echo'<option value="1994">1994</option>';
echo'<option value="1993">1993</option>';
echo'<option value="1992">1992</option>';
echo'<option value="1991">1991</option>';
echo'<option value="1990">1990</option>';
echo"</select>"."<br>";

echo"Gender: "."<select name='gender'>";
echo"<option value='male'>Male</option>";
echo"<option value='female'>Female</option>";
echo"</select>"."<br>"."<br>";

echo"‌‌‌‌‌‌‌‍<input type='submit' value='Submit'>"."<br>"."<br>";

echo"<h2>".'<img src="images/home.gif" alt="*"/>'."<a href='index.php'>Home</a>";

}

}

}




elseif($action=='validation'){
	
	$username=$_POST['username'];
	
	$password1=$_POST['password1'];
	
	$password2=$_POST['password2'];
	
	$birthd=$_POST['birthd'];
	
	$birthm=$_POST['birthm'];
	
	$birthy=$_POST['birthy'];
	
	$gender=$_POST['gender'];
	
	if(empty($password1) || empty($password2)){
		
	header('Location: registration.php?action=passerror');
	
	}
	
	if(strlen($password1)<5 || strlen($password2)<5){
		
			header('Location: registration.php?action=passstr');
			
	}
	elseif($password1==$password2){
		
		require('connection.php');
		
		$query="INSERT INTO users (username, password, gender, birth_day, birth_month, birth_year) VALUES ('$username', '$password1', '$gender', '$birthd', '$birthm', '$birthy') ";
		
		if(mysqli_query($conn, $query)){
			
			header('Location: registration.php?action=success');
			
		}
		
	}else{
		
		header('Location: registration.php?action=passerror');
		
	}
	
}





elseif($action=='strlen' ){
	
	echo'<h5>Error</h5>';
	
	echo'<img src="images/notok.gif">';
	
	echo 'Username must have at least 4 characters!'.'<br>'.'<br>'.'<h3>'.'<a href="registration.php">Go Back</a>'.'</h3>';
	
}


elseif($action=='preg'){
	
	echo'<h5>Error</h5>';
	
	echo'<img src="images/notok.gif">';
	
	echo 'Username can only contain a-z(small letter) and 0-9.'.'<br>'.'<br>'.'<h3>'.'<a href="registration.php">Go Back</a>'.'</h3>';
	
}


elseif($action=='passerror' ){
	
     echo'<h5>Error</h5>';
     
	echo'<img src="images/notok.gif">';
	
	echo 'Please input both Password carefully!'.'<br>'.'<br>'.'<h3>'.'<a href="registration.php">Go Back</a>'.'</h3>';
	
}


elseif($action=='success'){
	
	echo'<h5>Registration Success</h5>'.'<br>';
	
     echo '<center>'.'<img src="images/o.gif">'.'Thanks For Joining Here  :)'.'<br>'.'<a href="index.php">Login</a>'.'</center>'.'<br>'.'<br>';
     
     echo'<h3>'.'<img src="images/home.gif">'.'<a href="index.php">Home</a>'.'</h3>';
     
}


elseif($action=='passstr'){
	
 echo'<h5>Error</h5>';
 
	echo'<img src="images/notok.gif">';
	
	echo 'Password must contain at least 5 Characters!'.'<br>'.'<br>'.'<h3>'.'<a href="registration.php">Go Back</a>'.'</h3>';
	
}

?>

</body>

</html>