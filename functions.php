<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function vote($user_data,$con)
{
	$user_name=$user_data['user_name'];
	$query = "select * from votings where user_name = '$user_name' limit 1";
	$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			return TRUE;
		}
}

function votings($con,$name)
{
	$query = "select * from $name ";
	$result = mysqli_query($con,$query);
	return $result;	
}