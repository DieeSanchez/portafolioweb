<!--Conexion con base de datos-->
<?php include("conexion.php");?>
    <!--Agregar datos con metodo post-->
    <?php
    if($_POST){
    //Guardar fecha en variable para asignarle un nombre unico a cada imagen que se suba, para evitar nombres repetidos
    $fecha= new DateTime();
    $imgCarrera=$fecha->getTimestamp()."_".$_FILES["imgCarrera"]["name"];

    //Mover imagen temporal a carpeta miniCursos
    $imgCarrera_temp=$_FILES["imgCarrera"]["tmp_name"];
    move_uploaded_file($imgCarrera_temp,"../data/img/miniSuperior/".$imgCarrera);


    //Cargando segunda imagen
    $imgInstitucion=$fecha->getTimestamp()."_".$_FILES["imgInstitucion"]["name"];

    //Mover imagen temporal a carpeta miniCursos
    $imgInstitucion_temp=$_FILES["imgInstitucion"]["tmp_name"];
    move_uploaded_file($imgInstitucion_temp,"../data/img/miniSuperior/".$imgInstitucion);



    //conseguir datos de form y guardarlo en variables

    $titulo = $_POST["tituloSuperior"];
    $duracion = $_POST["duracion"];
    $modal = $_POST["modalPlanEstudios"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFinal = $_POST["fechaFinal"];
    $institucionSuperior = $_POST["institucionSuperior"];


    $objConexion = new conexion();
    $sql = "INSERT INTO `superior` (`id`, `titulo`, `imgCarrera`, `imgInstitucion`, `duracion`, `planEstudios`, `fechaInicio`, `fechaFinal`,`institucionSuperior`) VALUES (NULL, '$titulo', '$imgCarrera', '$imgInstitucion', '$duracion', '$modal', '$fechaInicio', '$fechaFinal','$institucionSuperior');";
    $objConexion->ejecutar($sql);

    header("location:gestion.php");
    }
    //redireccion en el caso de intentar acceder directamente a gestionCursos.php desde URL
    header("location:gestion.php");
    ?>