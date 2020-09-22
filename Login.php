<!DOCTYPE html>  
<html>  
<head> 
<style>
input {
	width: 250px;
}
.submitinp {
	width: 150px;
}
</style> 
</head>  
<body>    
  
<?php  

$servername = "localhost";
$username = "root";
$passwd = "";
$dbname = "isaa";
$host = ini_get("mysqli.default_host");

// Create connection
$conn = new mysqli($host, $username, $passwd, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// define variables to empty values  
$email0Err = $passw0Err = "";   
$passw0 = $email0 = "";


?>  
  
<h2>Login</h2>  
<span class = "error">* required field </span>  
<br><br>  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
    E-mail:   
    <input type="text" name="email0" >  
    <span class="error">* <?php echo $email0Err; ?> </span>  
    <br><br>
    Password:   
    <input type="text" name="passw0">  
    <span class="error">* <?php echo $passw0Err; ?> </span>  
    <br><br>	
    <input type="submit" class="submitinp" name="submit0" value="Submit">   
    <br><br>                             

</form>  
<?php
if(isset($_POST['submit0'])){


function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
} 

$email0 = input_data($_POST["email0"]);
$passw0 = input_data($_POST["passw0"]);


	$sql = "SELECT * FROM SQL_INJECTION_DA WHERE email='".$email0."' AND passw=md5('".$passw0."')";
	$result = $conn->query($sql);
	if (mysqli_num_rows($result) > 0) {
		$row = $result->fetch_assoc();
		echo "<br><br><b>Email: </b>" . $row["email"]. "&nbsp&nbsp <b>Password: </b>" . $row["passw"]. "<br>";
    } else {
		echo "No such User Registered";
	}
} 


?>	
  
 
  
</body>  
</html> 