<?php
    require_once __DIR__ . '/source/helpers.php';

    $user = currentUser();
    
?>

<!DOCTYPE HTML>
<html LONG="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Name -->
    <title>Vardie main</title>
    <!-- Page Logo -->
    <link rel="shortcut icon" href="icon/logo123.png" type="image/png" />


    <!-- mainStyle.css -->
    <link rel="stylesheet" href="/css/mainStyle.css">
    <!-- normalize.css -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- homeStyle.css -->
    <link rel="stylesheet" href="css/homeStyle.css">


    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="conteiner">
        <header class="mb-16">
            <div class="conteiner header position-relative logo width-full pt-16 pb-16 px-32">
                <div class="logo my-a">
                    <a class="av" href="/homePage.php"><img src="/icon/logo123.png"  height="32" width="35.5" /></a>
                </div>
                <div class="avatar">
                    <a class="av" href="/editProfilePage.php"><img src="/avatar/<?php echo $user['avatar']?>" height="38" width="38" /></a>
                </div>
            </div>
        </header>
        <div class="main color justify-content-center">
            <main class="justify-content-center height-full">
                <div class="conteiner main width-full p-24">
                    It's first post on this site, <?php echo $user['username'] ?>
                </div>
            </main>
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
        </div>
    </div>
    
</body>
</html>
