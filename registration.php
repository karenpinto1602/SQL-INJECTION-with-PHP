<!DOCTYPE html>  
<html>  
<head>  
</head>  
<body>    
  
<?php  

$servername = "localhost";
$username = "root";
$passwd = "";
$dbname = "isaa";
$host = ini_get("mysqli.default_host");

// Creating connection
$conn = new mysqli($host, $username, $passwd, $dbname);
// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// defining variables to empty values  
$nameErr = $emailErr = $passwErr = $genderErr = "";  
$name = $email = $passw0 = $gender = "";  

$name = input_data($_POST["name"]);  
$email = input_data($_POST["email"]);
$passw0 = input_data($_POST["passw0"]); 
$gender = input_data($_POST["gender"]);  

function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
} 
/*
$sql = "CREATE TABLE SQL_INJECTION_DA(
  email VARCHAR(45),
  name VARCHAR(45),
  passw VARCHAR(45),
  gender VARCHAR(7)
 )"; 
if ($conn->query($sql) === TRUE) {
  echo "Table SQL_INJECTION_DA created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}*/
?> 
  
<h2>Registration Form</h2>  
<span class = "error">* required field </span>  
<br><br>  
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
    Name:   
    <input type="text" name="name">  
    <span class="error">* <?php echo $nameErr; ?> </span>  
    <br><br>  
    E-mail:   
    <input type="text" name="email">  
    <span class="error">* <?php echo $emailErr; ?> </span>  
    <br><br> 
    Password:   
    <input type="text" name="passw0">  
    <span class="error">* <?php echo $passwErr; ?> </span>  
    <br><br> 	 
    Gender:  
    <input type="radio" name="gender" value="male"> Male  
    <input type="radio" name="gender" value="female"> Female  
    <input type="radio" name="gender" value="other"> Other  
    <span class="error">* <?php echo $genderErr; ?> </span>  
    <br><br>                            
    <input type="submit" name="submit" value="Submit">   
    <br><br> 
</form>  	
  
<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $passwErr == "" && $genderErr == "") {  
        echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$name;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>"; 
		echo "Password: " .$passw0;  
        echo "<br>"; 
        echo "Gender: " .$gender;  
		echo "<br>"; 
    } else {  
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }
	$sql = "INSERT INTO SQL_INJECTION_DA (email,name,passw,gender) VALUES ('".$email."','".$name."',md5('".$passw0."'),'".$gender."')";
	if ($conn->query($sql) === TRUE) {
		echo "<br>"; 
		echo "New record created successfully <br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}	
?>   
</body>  
</html> 