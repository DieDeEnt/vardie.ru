<?php

require_once __DIR__ . '/../helpers.php';

$_SESSION['validation'] = [];

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;


// check email
if(empty($email)){
    $_SESSION['validation']['email'] = 'Please enter e-mail.';
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['validation']['email'] =  'Email address is not correct.';
}
// check password
if(empty($password)){
    $_SESSION['validation']['password'] = 'Please enter password.';
}
else if(mb_strlen($password, 'utf-8')< 3){
    $_SESSION['validation']['password'] = 'The password cannot be less than 5 characters.';
}
else if(mb_strlen($password, 'utf-8')> 32){
    $_SESSION['validation']['password'] = 'The password cannot be more than 100 characters.';
    
}

if(!empty($_SESSION['validation'])){
    setOldValue('email',$email);
    redirect(path: '/index.php');
}


$user = findUser($email);


if (!$user) {
    $_SESSION['validation']['email'] =  'E-mail is not registered. <a class="error-text sub-text" for="email" href="registerPage.php">Create account?</a>';
    // save old email
    setOldValue('email',$email);
    redirect(path: '/index.php');
}
// check password
if (!password_verify($password, $user['password'])) {
    $_SESSION['validation']['password'] =  'Wrong password.';
    // save old email
    setOldValue('email',$email);
    redirect(path: '/index.php');
}

$_SESSION['user']['id'] = $user['id'];

redirect(path: '/homePage.php');

    // $pdo = null;
?>