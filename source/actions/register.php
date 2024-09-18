<?php
	require_once __DIR__ . '/../helpers.php';

	$_SESSION['validation'] = [];


	$username = $_POST['username'] ?? null;
	$email = $_POST['email'] ?? null;
	$password = $_POST['password'] ?? null;
	$re_enter_password = $_POST['re_enter_password'] ?? null;
	$name = "user";
	
	if(empty($username)){
		$_SESSION['validation']['username'] = 'Please enter username.';
	}
	else if(mb_strlen($username, 'utf-8') < 2){
		$_SESSION['validation']['username'] = 'The username is too short.';
	}
	else if(mb_strlen($username, 'utf-8') > 32){
		$_SESSION['validation']['username'] = 'The username is too big.';
	}

	if(empty($email)){
		$_SESSION['validation']['email'] = 'Please enter e-mail.';
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['validation']['email'] =  'Email address is not correct.';
	}

	if(empty($password)){
		$_SESSION['validation']['password'] = 'Please enter password.';
	}

	if(empty($re_enter_password)){
		$_SESSION['validation']['re_enter_password'] = 'Please re-enter password.';
	}
	else if($password != $re_enter_password){
		$_SESSION['validation']['re_enter_password'] = 'Passwords do not match.';
		$_SESSION['validation']['password'] = 'Passwords do not match.';
	}
	else if(mb_strlen($password, 'utf-8')< 3){
		$_SESSION['validation']['password'] = 'The password cannot be less than 5 characters.';
		$_SESSION['validation']['re_enter_password'] = 'The password cannot be less than 5 characters.';
	}

	else if(mb_strlen($password, 'utf-8')> 32){
		$_SESSION['validation']['password'] = 'The password cannot be more than 100 characters.';
		$_SESSION['validation']['re_enter_password'] = 'The password cannot be more than 100 characters.';
		
	}

	if(!empty($_SESSION['validation'])){
		setOldValue('username',$username);
		setOldValue('email',$email);
		redirect(path: '/registerPage.php');
	}

	

	$pdo = setPDO();

	// check duplicates email
	$query = $pdo->prepare("SELECT 1 FROM users WHERE email =:email LIMIT 1");
	$query->bindValue(':email', $email);
	$query->execute();
	$count = $query->rowCount();
	if ($count > 0) {
		$_SESSION['validation']['email'] =  'Email address already use.';
		setOldValue('username',$username);
		setOldValue('email',$email);
		redirect(path: '/registerPage.php');
	}
	//write in db
	$query = "INSERT INTO users (username, name, email, password) VALUE (:username, :name, :email, :password)";
	$params = [

		'username' => $username,
		 'name' => $name,
		  'email' => $email,
		   'password' => password_hash($password, algo:PASSWORD_DEFAULT)
	];

	$stmt = $pdo->prepare($query);

	try{
		$stmt ->execute($params);
	}catch(\Exception $e)
	{
		die("Data recording error: {$e->getMessage()}");
	}

	redirect(path:'/index.php');

	$pdo = null;
?>



