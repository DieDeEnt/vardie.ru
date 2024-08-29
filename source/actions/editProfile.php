<?php
    require_once __DIR__ . '/../helpers.php';
    $user = currentUser();

    $newAvatar = $_FILES['newAvatar'] ?? null;
	
	$newUsername = $_POST['newUsername'] ?? null;


	// $newPassword = $_POST['newPassword'] ?? null;
	// $re_enter_password = $_POST['re_enter_Password'] ?? null;


	//valid new username
	if(empty($newUsername)){
		$_SESSION['validation']['newUsername'] = 'Please enter new username.';
	}
	else if(mb_strlen($newUsername, 'utf-8') < 2){
		$_SESSION['validation']['newUsername'] = 'The new username is too short.';
	}
	else if(mb_strlen($newUsername, 'utf-8') > 32){
		$_SESSION['validation']['newUsername'] = 'The new username is too big.';
	}


	//valid new avatar
	if(!empty($newAvatar)){

		$types = ['image/jpeg', 'image/png'];
		

		if(($newAvatar['size'] / 1000000) > 3){ // valid size new avatar
			$_SESSION['validation']['newAvatar'] = 'The image size should not exceed 3mb.';
		}

	}

	if(!empty($_SESSION['validation'])){
		setOldValue('newUsername',$newUsername);
		
		redirect(path: '/../editProfilePage.php');
	}

	if(!empty($newUsername)){
		updateData($user, 'users', 'username', $newUsername);
	}

	if($_FILES['newAvatar']['size'] == 0){
		redirect(path: '/../homePage.php');
	}

	//valid new avatar
	else{

		$avatarPath = __DIR__ . '/../../avatar';

		if(!is_dir($avatarPath)){
			echo 1;
			mkdir($avatarPath, 0777, true);
		}

		$avatarName = downloadFile($newAvatar, $user, $avatarPath, 'avatar');

		if(!empty($newAvatar)){
			updateData($user, 'users', 'avatar', $avatarName);
		}
	}


	// var_dump($newAvatar);

	
	redirect(path: '/../homePage.php');








    // 
    

?>