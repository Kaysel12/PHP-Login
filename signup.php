<?php 

session_start();
require 'database.php';

if (isset($_SESSION['usuario'])) {
    header('location: Page.php');
}

$error = null;
if (isset($_POST['register'])) {
    
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // function verificar($data,$error){
    //     if (!empty($data)) {
    //         $data = filter_var($data, FILTER_SANITIZE_STRING);
    //         $data = htmlspecialchars($data);
    //     }else {
    //         return $error .= 'Llenar todos los compos';
    //         echo 'Error: ' . $error;
    //     }
    // }

    // function validarPass($pass1,$pass2,$error){
    //     if ($pass1 !== $pass2) {
    //         $error .= 'Favor confirmar la contraseña';
    //     }
    // }

    // function validarEmail($data,$error){
    //     if (!empty($data)) {
    //         $data = filter_var($data, FILTER_SANITIZE_EMAIL);
    //         if (!($data = filter_var($data, FILTER_VALIDATE_EMAIL))) {
    //             $error .= 'Ingresar correo correctamente';
    //         }
    //     }else {
    //         $error .= 'Llenar todos los compos';
    //     }
    // }
    
    // Verificar campos
    // verificar($usuario,$error);
    // verificar($password,$error);
    // verificar($password2,$error);
    
    // Validar Passwords
    // validarPass($password,$password2,$error);
    
    // Validar Email
    // validarEmail($email,$error);


    // Validaciones
    if (!empty($usuario)) {
        $usuario = trim($usuario);
        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
    }else {
        $error = 'Completar todos los campos';
    }

    if (!empty($password)) {
        $password = filter_var($password,FILTER_SANITIZE_STRING);
        if ($password2 !== $password) {
            $error .= 'Contraseña Incorrecta';
        }
    }else {
        $error = 'Completar todos los campos';
    }

    if (!empty($email)) {
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
        if (!$email = filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= 'Dijite el correo correctamente';
        }
    }else {
        $error = 'Completar todos los campos';
    }


    // Insersion de registro en la base de datos
    if (!isset($error)) {
    //    echo 'funciona';
        $sql = "INSERT INTO USERS (USUARIO,CORREO,PASS) VALUES (:user,:mail,:pass)";
        $statement = $connect->prepare($sql);
        // $statement->bindParam('ssi',$usuario,$email,$password);
        $statement->execute(
            array(
                ':user' => $usuario,
                ':mail' => $email,
                ':pass' => $password
            )
        );
        $result = $statement->rowCount();
        if (isset($result)) {
            header('location: login.php');

            // $sql = "SELECT CORREO FROM USERS";
            // $statement = $connect->prepare($sql);
            // $statement->execute();
            // $array = $statement->fetchAll();

            // foreach ($array as $data) {
            //     echo $result;
            // }
            
            // for ($i=0; $i <= count($array); $i++) { 
            //     $recorridoArray = $array[i];
            //     if ($recorridoArray == $_POST['email']) {
            //         header('location: signup.php');
            //         $_POST['usuario'] = '';
            //         $_POST['email'] = '';
            //     }
            // }
        }else {
        }
    }

}

?>

<?php require './views/signup.view.php' ?>

<!-- !empty($email) && !empty($usuario) && !empty($password) && !empty($password2) -->