<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php require './partials/header.php'?>

    <form action="signup.php" method="post" autocomplete="off">
        <h1>Register</h1>
        <input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php  if(!empty($_POST['usuario'])) echo $_POST['usuario']; ?>">
        <input type="email" name="email" id="email" placeholder="Email" value="<?php if (!empty($_POST['email'])) echo $_POST['email']?>">
        <input type="password" name="password" id="pasword" placeholder="Password">
        <input type="password" name="password2" id="pasword2" placeholder="Confirm Password">

        <?php if(!empty($error)):?>
            <p class="error"> <?php echo $error?> </p>
        <?php endif;?>

        <input type="submit" value="Enviar" name="register">
    </form>
</body>

</html>