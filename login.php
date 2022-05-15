<?php 
session_start(); 
include "db_conn.php";
include('config/constants.php');

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     } 

 	$username = validate($_POST['username']);
	$password = validate($_POST['password']);

	if (empty($username)) {
		header("Location: loginpage.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: loginpage.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $password = md5($password);

        $sql_admin = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $result_admin = mysqli_query($conn, $sql_admin);

        if (!mysqli_num_rows($result_admin)) {
			$sql_customer = "SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'";
        	$result_customer = mysqli_query($conn, $sql_customer);
			if(!mysqli_num_rows($result_customer)){
				header("Location: loginpage.php?error=Incorect Username or password");
				exit();
			}else{
				$row = mysqli_fetch_assoc($result_customer);
				$_SESSION['username'] = $row['username'];
            	$_SESSION['id'] = $row['customer_id'];
            	header("Location: index.php");
		        exit();
			}
			
		}else{
			$row = mysqli_fetch_assoc($result_admin);
			$_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $row['username']; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/');
		        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
?>