<?php
    require_once __DIR__ . '/source/helpers.php';
    
    //ghostAuth();
?>

<!DOCTYPE html>
<html LONG="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Name -->
    <title>Vardie sign in</title>
    <!-- Page Logo -->
    <link rel="shortcut icon" href="icon/logo.png" type="image/png" />


    <!-- main.css -->
    <link rel="stylesheet" href="/css/mainStyle.css">
    <!-- normalize.css -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- sign-in.css -->
    <link rel="stylesheet" href="/css/loginStyle.css">


    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="conteiner position-relative logo width-full text-center">
        <div class="sign-in text-center logo">
            <a href="index.php"><img src="/icon/logo.png" height="67.5" width="71"/></a>
        </div>
    </div>
    <div class="conteiner main width-full">
        <main>
            <div class="auth-form mx-a px-16">
                <div class="conteiner text text-center pb-16">
                    <div class="font-x-large main text">
                        <lable>Sign in to Vardie</lable>
                    </div>
                </div>
                <div class="conteiner form p-16">


                    <form action="source/actions/login.php" method="post" class="form">


                        <lable class="text">Username or email addres</lable>

                        <input 
                            type="text" 
                            name="usernameOrEmail" 
                            id="usernameOrEmail" 
                            placeholder="" 
                            class="form sing-in width-full input mt-4 mb-4" 
                            value="<?php echo old('usernameOrEmail')?>"
                            
                        /><br />
                        <!-- error -->
                        <label class="error-text sub-text" for="usernameOrEmail"><?php setErrorMessage('usernameOrEmail')?></label>


                        <div class="text mt-8">
                            <lable class="text">Password</lable>
                        </div>

                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            placeholder="" 
                            class="form sing-in width-full password input mt-4 mb-4" 
                            
                        /><br />
                        <!-- error -->
                        <label class="error-text sub-text " for="password"><?php setErrorMessage('password')?></label>


                        <input type="submit" value="Sign in" class="btn width-full input btn-success mt-8" />
                    </form>
                </div>
                <div class="conteiner create-account mt-24 p-16 text-center">
                    <a href="message.php">Where to get the Devcode?</a>
                    <p class="sign-in text mt-8">New to Site? <a href="registerPage.php">Create account</a></p>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <div class="conteiner footer mx-8">
            <ul class="justify-content-center ul">
                <li class="mx-8 mb-24"><a href="#" class="sub-text">Info Site</a></li>
                <li class="mx-8 mb-24"><a href="#" class="sub-text">Scrambled it to make a type</a></li>
                <li class="mx-8 mb-24"><a href="index.php" class="sub-text">Public</a></li>
                <li class="mx-8 mb-24"><a href="#" class="sub-text">There are many variations of passages</a></li>
            </ul>
        </div>
    </footer>
    <script src="js/main.js"></script>
</body>
</html>
