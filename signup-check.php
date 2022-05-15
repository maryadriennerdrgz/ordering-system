<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['username']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $email = validate($_POST['email']);
	$contact = validate($_POST['contact']);
	$address = validate($_POST['address']);

	$user_data = 're_password'.$re_pass. 'email'.$email. 'username='. $username. '&firstname='. $firstname. '&lastname='.$lastname;


	if (empty($username)) {
		header("Location: signup.php?error=Username is required&$user_data");
	    exit();
	}else if(empty($password)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($firstname)){
        header("Location: signup.php?error=First Name is required&$user_data");
	    exit();
	}

    else if(empty($lastname)){
        header("Location: signup.php?error=Last Name is required&$user_data");
	    exit();
	}

    else if(empty($email)){
        header("Location: signup.php?error=Email is required&$user_data");
	    exit();
	}
	else if(empty($contact)){
        header("Location: signup.php?error=Contact number is required&$user_data");
	    exit();
	}
	else if(empty($address)){
        header("Location: signup.php?error=Address is required&$user_data");
	    exit();
	}


	else if($password != $re_pass){
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $password = md5($password);

	    $sql = "SELECT * FROM tbl_customer WHERE username='{$username}' OR email='{$email}'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result)) {
			header("Location: signup.php?error=The username or email is already taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO tbl_customer(firstname, lastname, email, username, password,contact,address) VALUES('$firstname','$lastname','$email','$username', '$password', '$contact', '$address')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}
?>