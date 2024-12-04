<?php
    require_once __DIR__ . '/../helpers.php';
    $user = currentUser();

    $newAvatar = $_FILES['newAvatar'] ?? null;
	
	$newName = $_POST['newName'] ?? null;


	// $newPassword = $_POST['newPassword'] ?? null;
	// $re_enter_password = $_POST['re_enter_Password'] ?? null;


	//valid new username
	if(empty($newName)){
		$_SESSION['validation']['newName'] = 'Please enter new name.';
	}
	else if(mb_strlen($newName, 'utf-8') < 2){
		$_SESSION['validation']['newName'] = 'The new name is too short.';
	}
	else if(mb_strlen($newName, 'utf-8') > 16){
		$_SESSION['validation']['newName'] = 'The new name is too big.';
	}


	//valid new avatar
	if(!empty($newAvatar)){

		$types = ['image/jpeg', 'image/png'];
		

		if(($newAvatar['size'] / 1000000) > 3){ // valid size new avatar
			$_SESSION['validation']['newAvatar'] = 'The image size should not exceed 3mb.';
		}

	}

	if(!empty($_SESSION['validation'])){
		setOldValue('newName',$newName);
		
		redirect('/../editProfilePage.php');
	}

	if(!empty($newName)){
		updateData($user, 'users', 'name', $newName);
	}

	if($_FILES['newAvatar']['size'] == 0){
		redirect('/../homePage.php');
	}

	//valid new avatar
	else{

		$avatarPath = __DIR__ . '/../../avatar';

		if(!is_dir($avatarPath)){
			
			mkdir($avatarPath, 0777, true);
		}

		$avatarName = downloadFile($newAvatar, $user, $avatarPath, 'avatar');

		if(!empty($newAvatar)){
			updateData($user, 'users', 'avatar', $avatarName);
		}
	}


	// var_dump($newAvatar);

	
	redirect('/../homePage.php');








    // 
    

?>