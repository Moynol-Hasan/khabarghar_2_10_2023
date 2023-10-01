<?php

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
        $number=$_POST['number'];
        $addstate= $_POST['addstate'];
		$addzip=$_POST['addzip'];
		$password = $_POST['password'];
		$con_password= $_POST['con_password'];
		
		if($password!=$con_password)
		{
			die("Password did not match"); // IF both password and confirm password did not match 
			                               // while signup then it show password didnot match.
		}


	$connection= mysqli_connect('localhost','root','','khabarghar'); //connecting the phpmyadmin database.

	if(!$connection)
	{
		die("failed". mysqli_error($connection));
	}
	
	$hshpass= md5($password);

	$query = "INSERT INTO signup VALUES ('$fname','$lname', '$email', '$number', '$addstate', '$addzip', '$hshpass')"; //Inserting values to the database.

	$final=mysqli_query($connection,$query);

	if($final){
		//echo"Registration Successful..."; //If everything filled correctly then output shows registration successful.
		//$html = file_get_contents('afterlogin/index.html');
		//echo $html;
		header('location:./regsuccessfull.html');
	
	}
	else{
		header('location:./regnotsuccessfull.html');  // While registration the mail user entered is already used by someone else then it shows 
									   // email already in used.
	}

?>