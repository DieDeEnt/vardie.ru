<?php
    session_start();
    
    require_once __DIR__ . '/config.php';

    function redirect(string $path)
    {
        header("Location: $path");
        die();
    }

    // function setErrorOutline(string $fieldName)
    // {
    //     echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
    // php php setErrorOutline(fieldName:'re_enter_password') 
    // }

    function setErrorMessage(string $fieldName)
    {
        $message = ($_SESSION['validation'][$fieldName]) ?? '';
        unset($_SESSION['validation'][$fieldName]);
        echo $message;
    }

    function setOldValue(string $key, mixed $value):void 
    {
        $_SESSION['old'][$key] = $value;
    }

    function old(string $key) 
    {
        $value = $_SESSION['old'][$key] ?? '';
        unset($_SESSION['old'][$key]);
        return $value;
    }

    function setPDO() :PDO
    {
        try{
            return new \PDO('mysql:host=' . DB_HOST . ';charset=utf8;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
        }catch(\PDOException $e)
        {
            die("Connection error: {$e->getMessage()}");
        }
        
    }

    function findUser(string $email):array
    {
        $pdo = setPDO();

        // check email
        $query = $pdo->prepare("SELECT * FROM users WHERE email =:email LIMIT 1");
        $query->execute([':email'=> $email]);
        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    function currentUser() : array {
        
        $pdo = setPDO();

        if(!isset($_SESSION['user'])){
            redirect('/');
        }

        if(!isset($_SESSION['user']['id'])){
            redirect('/');
        }

        $userId = $_SESSION['user']['id'] ?? null;

        // check email
        $query = $pdo->prepare("SELECT * FROM users WHERE id =:id LIMIT 1");
        $query->execute([':id'=> $userId]);
        
        return $query->fetch(\PDO::FETCH_ASSOC);


    }

    function authUser() : void{
        if(!isset($_SESSION['user']['id'])){
            redirect('/');
        }
    }

    function ghostAuth() : void{
        if(!isset($_SESSION['user']['id'])){
            redirect('/homePage.php');
        }
    }

    function logout()
    {
        unset($_SESSION['user']['id']);
        redirect('/');
    }


    function downloadFile(array $file, $user, $path, $prefix)
    {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		
		$fileName = $prefix . $user['id'] . '_' . time() . ".$ext";

		if(!move_uploaded_file($file['tmp_name'], "$path/$fileName")){
            echo "$path/$fileName";
			$_SESSION['validation']['newAvatar'] = 'The image download error.';
            redirect('/../editProfilePage.php');
		}

        return $fileName;
    }

    function updateData($user, $tableName, $columnName, $data)
    {
        try{
			$pdo = setPDO();
	
			$query = "UPDATE $tableName SET $columnName = :a WHERE id = :userid";
			$stmt = $pdo->prepare($query);
			$stmt->bindValue(":userid", $user["id"]);
			$stmt->bindValue(":a", $data);
			
			$stmt->execute();
	
		}catch(\PDOException $e)
		{
			die("Connection error: {$e->getMessage()}");
		}
    }

?>