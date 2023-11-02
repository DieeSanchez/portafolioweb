<!--Conexion con base de datos-->
<?php include("conexion.php");?>
    <!--Agregar datos con metodo post-->
    <?php
    if($_POST){
    //Guardar fecha en variable para asignarle un nombre unico a cada imagen que se suba, para evitar nombres repetidos
    $fecha= new DateTime();
    $logo=$fecha->getTimestamp()."_".$_FILES["logo"]["name"];

    //Mover imagen temporal a carpeta miniCursos
    $logo_temp=$_FILES["logo"]["tmp_name"];
    move_uploaded_file($logo_temp,"../data/img/miniCursos/".$logo);



    //conseguir datos de form y guardarlo en variables

    $titulo = $_POST["tituloCurso"];
    $link = $_POST["linkCert"];
    $modal = $_POST["modalMod"];
    $descripcion = $_POST["desCurso"];


    $objConexion = new conexion();
    $sql = "INSERT INTO `cursos` (`id`, `titulo`, `descripcion`, `logo`, `modal`, `link`) VALUES (NULL, '$titulo', '$descripcion', '$logo', '$modal', '$link');";
    $objConexion->ejecutar($sql);

    header("location:gestion.php");
    }
    //redireccion en el caso de intentar acceder directamente a gestionCursos.php desde URL
    header("location:gestion.php");
    ?>

