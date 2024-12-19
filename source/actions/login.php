<?php

require_once __DIR__ . '/../helpers.php';

$_SESSION['validation'] = [];

$usernameOrEmail = $_POST['usernameOrEmail'] ?? null;
$password = $_POST['password'] ?? null;

// check email
if(empty($usernameOrEmail)){
    $_SESSION['validation']['usernameOrEmail'] = 'Please enter e-mail.';
}
// else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $_SESSION['validation']['usernameOrEmail'] =  'Email address is not correct.';
// }
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
    setOldValue('usernameOrEmail',$email);
    redirect('/loginPage.php');
}


$user = findUser($usernameOrEmail);



if (!$user) {
    $_SESSION['validation']['usernameOrEmail'] =  'E-mail is not registered. <a class="error-text sub-text" for="email" href="registerPage.php">Create account?</a>';
    // save old email
    setOldValue('usernameOrEmail',$usernameOrEmail);
    redirect('/loginPage.php');
}
// check password
if (!password_verify($password, $user['password'])) {
    $_SESSION['validation']['password'] =  'Wrong password.';
    // save old email
    setOldValue('usernameOrEmail',$usernameOrEmail);
    redirect('/loginPage.php');
}

$_SESSION['user']['id'] = $user['id'];
emailConfirm($usernameOrEmail);
redirect('/homePage.php');

    // $pdo = null;
?>
