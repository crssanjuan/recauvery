<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "aulfms";

$conn = mysqli_connect($sname, $uname, $password, $db_name,"3308");

if (!$conn) {
	echo "Connection Failed!";
	exit();
}
else{
	$stmt = $conn->prepare("SELECT* FROM users WHERE username = ?");
	$stmt->bind_param("s",$username);
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	if ($stmt_result->num_rows > 0){
		$data = $stmt_result->fetch_assoc();
		if ($data['password'] === $password){
			header("Location: home.php");
		} 
	}else {
		
	} 
}
?>