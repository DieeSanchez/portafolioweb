<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>&lt;/Login&gt;</title>
    <link rel="stylesheet" href="../data/Styles/loginStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Favicon-->
    <link rel="icon" href="../data/img/userLoginFavicon.svg">

    <!--Conexion con base de datos-->

<?php 
    session_start();
    include("../modulos/conexion.php");

    if ($_POST) {
    $conexion = new conexion();
    $conexion = $conexion->getConexion();
    
    $usuario = (isset($_POST["usuario"])) ? $_POST["usuario"] : "";
    $password = (isset($_POST["password"])) ? $_POST["password"] : "";

    // Preparar y ejecutar consulta SQL
    $sentencia = $conexion->prepare("SELECT *, count(*) as n_usuario FROM `admin` WHERE usuario=:usuario AND password=md5(:password)");
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password",$password);
    $sentencia->execute();

    $lista_usuarios = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($lista_usuarios["n_usuario"] > 0) {
        $_SESSION["usuario"] = $lista_usuarios["usuario"];
        header("location:gestion.php");
    } else {
        $error="Usuario o Contraseña incorrerctos";
    }
    }
    
    //una vez loguado, si se intenta acceder al login denuevo redirecciona a gestion.php
    if(isset($_SESSION["usuario"])){
    header("location:gestion.php");
    }
   
?>



</head>
<body>
    
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <?php if(isset($error)) {?>
                <strong class="d-flex justify-content-center bg-danger p-2"><?php echo $error?></strong>
                <?php }?>
                <h2 class="text-center mb-4">Inicio de sesión</h2>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Nombre de usuario:</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-2">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>