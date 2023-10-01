<?php


    $email=$_POST['email'];
	$oldpass=$_POST['oldpass'];
	$newpass=$_POST['newpass'];
    $conpass=$_POST['conpass'];

	$connection= mysqli_connect('localhost','root','','khabarghar');  //connecting the phpmyadmin database.


	if(!$connection)
	{
		die("failed". mysqli_error($connection));
	}

    if($newpass!=$conpass)
		{
			die("Password did not match"); // IF both password and confirm password did not match 
			                               // while signup then it show password didnot match.
		}

    $hshpass=md5($oldpass);
    $newhshpass=md5($newpass);

	$query = $connection->prepare("SELECT * FROM signup WHERE email=? "); //Select value from the database.

	$query->bind_param("s",$email);

	$query->execute();

	$query_result=$query->get_result();

	if($query_result->num_rows>0)
	{
		$data = $query_result->fetch_assoc();
		
		// $hshpass=md5($oldpass);
		
		if($data['Password'] == $hshpass)
		{
			// $html = file_get_contents('afterlogin/index.html'); //If the email and password match then khoj.html file going to be open.
			// echo $html;
			//echo "Login Successfull";
			//<a href="afterlogin/index.html"></a>
			// header('location:./afterlogin/index.html');
            $query = "update signup set Password='$newhshpass' where Email='$email'";
            $final=mysqli_query($connection,$query);
           echo "password changed successfully";
		}
		else 
		{
			echo "Wrong password";  //If email or password is wrong then it shows invalid email or password.
		}
	}
	else 
	{
		echo "Updated Successfully";  //If the user did not registerd then it show you need to sign up first.
	}

?>