<?php	

	$servername = "127.0.0.1";
	$user = "root";
	$password = "";
	$db = "bussystemmanagement";

	$conn = mysqli_connect($servername, $user, $password);

	mysqli_set_charset($conn, 'utf8');
	if (!$conn) {
	  	echo "Not Connected To Server";
	}

	if(!mysqli_select_db($conn, $db)) {
		echo "Database Not Selected";
	}

	
	$usernameToFind = $_POST['username'];
	$query = "SELECT * FROM users WHERE Username = '$usernameToFind'";

	$result = mysqli_query($conn, $query);
	while (($row = mysqli_fetch_array($result))) {
		$userFound = array(
			'username' => $row['Username'],
			'email' => $row['Email'],
			'icon' => $row['Icon'],
   			'name' => $row['Name'],
			'password' => $row['Password'],
			'status' => $row['Status'],
			'sex' => $row['Sex']
		);
		//var_dump($userFound);
   		echo json_encode($userFound, JSON_UNESCAPED_UNICODE);
	}

	mysqli_close($conn);

?>