<?php 

session_start();
require 'database.php';

if (isset($_SESSION['usuario'])) {
    header('location: Page.php');
}

$error = null;
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT usuario,correo,pass FROM USERS WHERE correo=:email and pass=:pass";
    $statement = $connect->prepare($sql);
    $statement->execute(
    array(':email' => $email,
          ':pass' => $password)
    );

    $result = $statement->fetch();

    if (!$result) {
        $error .= 'Datos ingresados Erroneamente';
    }else {
        $_SESSION['usuario'] = $result['usuario'];
        header('location: Page.php');
    }
}


//     // Validando email
//     if (!empty($email)) {
//         $email = filter_var($email, FILTER_SANITIZE_EMAIL);
//         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             $error = 'Ingrese un correo valido' . '<br>';
//         }
//     }else {
//         $error .= 'Introduzca un Email' . '<br>';
//     }

//     // Validando password
//     if (!empty($password)) {
//         $password = filter_var($password, FILTER_SANITIZE_STRING);
//     }else {
//         $error .= 'Introduzca una contraseña' . '<br>';
//     }

// }else {
//     $error = 'Ingresa los datos';
// }




// print_r($statement->fetchAll());


?>

<?php require './views/login.view.php' ?>