<?php
    require_once __DIR__ . '/source/helpers.php';
    
?>

<!DOCTYPE HTML>
<html LONG="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Name -->
    <title>Vardie reg</title>
    <!-- Page Logo -->
    <link rel="shortcut icon" href="icon/logo123.png" type="image/png" />


    <!-- main.css -->
    <link rel="stylesheet" href="css/mainStyle.css">
    <!-- normalize.css -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- registration.css -->
    <link rel="stylesheet" href="css/registerStyle.css">


    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="conteiner position-relative logo width-full text-center">
        <div class="reg text-center logo">
            <a href="/"><img src="icon/logo123.png" height="67.5" width="71" /></a>
        </div>
    </div>
    <div class="conteiner main width-full">
        <main>
            <div class="auth-form mx-a px-16">
                <div class="conteiner text text-center pb-16">
                    <div class="font-x-large main text">
                        <lable>Welcome to Vardie<p class="mt-8">How about creating an account, m-m-m?</p></lable>
                    </div>
                </div>
                <div class="conteiner form p-16">


                    <form class="form" action="source/actions/register.php" method="post">


                        <lable class="reg text">Username</lable>

                        <input 
                            type="text" 
                            class="form reg width-full input mb-4 mt-4" 
                            name="username" 
                            placeholder="" 
                            
                            value="<?php echo old(key:'username')?>"
                        /><br />
                        <label class="error-text sub-text"    for="username"><?php setErrorMessage(fieldName:'username')?></label>
                        


                        <div class="text mt-8">
                            <lable class="reg text" >Email address</lable>
                        </div>

                        <input 
                            type="email" 
                            class="form reg width-full input mb-4 mt-4" 
                            name="email" 
                            placeholder="" 
                            
                            value="<?php echo old(key:'email')?>"
                        /><br />
                        <label class="error-text sub-text"    for="email"><?php setErrorMessage(fieldName:'email')?></label>


                        <div class="text mt-8">
                            <lable class="reg text">Password</lable>
                        </div>

                        <input 
                            type="password" 
                            class="form reg width-full password input mb-4 mt-4" 
                            name="password" 
                            placeholder="" 
                            
                        /><br />
                        <label class="error-text sub-text"    for="password"><?php setErrorMessage(fieldName:'password')?></label>

                        <div class="text mt-8">
                            <lable class="reg text">Re-Enter Password</lable>
                        </div>
                        
                        <input 
                            type="password" 
                            class="form reg width-full password input mt-4 mb-4" 
                            name="re_enter_password" 
                            placeholder="" 
                            
                            
                        />
                        <label class="error-text sub-text"    for="re_enter_password"><?php setErrorMessage(fieldName:'re_enter_password')?></label>


                        <input class="btn width-full input btn-success mt-8" type="submit" value="Continue" />
                    </form>
                </div>
                <div class="conteiner sign-in mt-24 p-16 text-center">
                    <a href="#">Where to get the Devcode?</a>
                    <p class="sign-in text mt-8">Already have an account?<a href="index.php"> Sign in</a></p>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <div class="conteiner footer mx-8">
            <ul class="justify-content-center ul">
                <li class="mx-8 mb-24"><a href="#" class="sub-text">Info Site</a></li>
                <li class="mx-8 mb-24"><a href="#" class="sub-text">Scrambled it to make a type</a></li>
                <li class="mx-8 mb-24"><a href="#" class="sub-text">Lorem Ipsum</a></li>
                <li class="mx-8 mb-24"><a href="#" class="sub-text">There are many variations of passages</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
