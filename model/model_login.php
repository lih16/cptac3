<?php

use Lib\model_base;

class Login_Model extends model_base {
public function __construct($stable=NULL,$aColumns=NULL, $sIndexColumn=NULL){
    parent::__construct(NULL, NULL, NULL);
}
public function getlogin()


{
 	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			//$error = "Username or Password is invalid";
			return 'invalid user';
		}
		else
		{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			$rows = $stmt->fetchAll();
            $num_rows = count($rows);
// Selecting Database
			//$db = mysql_select_db("company", $connection);
// SQL query to fetch information of registerd users and finds user match.
			//$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
			//$rows = mysql_num_rows($query);
			if ($num_rows == 1) {
				 $_SESSION['login_user']=$username; // Initializing Session
			   // header("location: profile.php"); // Redirecting To Other Page
				 return 'login';
			   //$_SESSION['login_user']=$username; // Initializing Session
			   // header("location: profile.php"); // Redirecting To Other Page
			} else {
				return 'invalid user';
				//$error = "Username or Password is invalid";
			}
			//mysql_close($connection); // Closing Connection
		}
	}
 
}
}

?>