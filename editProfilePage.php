<?php
    require_once __DIR__ . '/source/helpers.php';
    $user = currentUser();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    
        <!-- Page Name -->
        <title>Setting</title>
        <!-- Page Logo -->
        <link rel="shortcut icon" href="icon/logo.png" type="image/png" />


        <!-- mainStyle.css -->
        <link rel="stylesheet" href="/css/mainStyle.css">
        <!-- normalize.css -->
        <link rel="stylesheet" href="css/normalize.css" />
        <!-- homeStyle.css -->
        <link rel="stylesheet" href="css/editProfileStyle.css">

        

        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="conteiner position-relative width-full text-center p-40">
            
            <form class="form" action="/source/actions/editProfile.php" method="post" enctype="multipart/form-data">

                <!-- <lable class="mb-4">
                    <img src="/avatar/<?php echo $user['avatar'] ?>" alt="Нажмите для выбора файла." height="304" width="304"><br>
                    <input 
                        type="file" 
                        hidden

                        
                    >
                </lable><br> -->


                
                    
                        
                <label class="lable preview"  title="Change image" for=pct style="background-image:url('/avatar/<?php echo $user['avatar']?>');">
                        
                        
                    <input 
                        type=file 
                        id=pct 
                        accept="image/*"
                        hidden
                    
                        name="newAvatar"
                    >
                </label><br>

                <!-- accept="image/*" -->
                <label class="error-text sub-text"    for="newAvatar"><?php setErrorMessage(fieldName:'newAvatar')?></label>

                <p><label class=" mt-8" for="newUsername">Re-Name</label></p>
                <input 
                    type="text" 
                    class="form width-full input mb-4 mt-4"
                    id="newUsername"
                    name="newUsername"
                    value="<?php echo $user['username']?>"
                >
                <p><label class="error-text sub-text"    for="email"><?php setErrorMessage(fieldName:'newUsername')?></label></p>


                <div><input class="mt-16 btn input btn-success" type="submit" value="Edit" /><a class="mt-16 mx-8 btn input btn-success" href="/homePage.php" >Home</a></div>
                
            </form>
            
        </div>
        <script src="js/avatarChange.js"></script>
    </body>
</html>