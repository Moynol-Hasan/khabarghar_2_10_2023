<?php

	$email=$_POST['email'];
	$password=$_POST['password'];

	$connection= mysqli_connect('localhost','root','','khabarghar');  //connecting the phpmyadmin database.


	if(!$connection)
	{
		die("failed". mysqli_error($connection));
	}


	$query = $connection->prepare("SELECT * FROM signup WHERE email=? "); //Select value from the database.

	$query->bind_param("s",$email);

	$query->execute();

	$query_result=$query->get_result();

	if($query_result->num_rows>0)
	{
		$data = $query_result->fetch_assoc();
		
		$hshpass=md5($password);
		
		if($data['Password'] == $hshpass)
		{
			// $html = file_get_contents('afterlogin/index.html'); //If the email and password match then khoj.html file going to be open.
			// echo $html;
			//echo "Login Successfull";
			//<a href="afterlogin/index.html"></a>
			header('location:./afterlogin/index.html');
		}
		else 
		{
			echo "Invalid email or password";  //If email or password is wrong then it shows invalid email or password.
		}
	}
	else 
	{
		echo "You need to sign up first";  //If the user did not registerd then it show you need to sign up first.
	}

?>