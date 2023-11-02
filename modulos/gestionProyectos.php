<!--Conexion con base de datos-->
<?php include("conexion.php");?>
    <!--Agregar datos con metodo post-->
    <?php
    if($_POST){

    //IMG PRINCIPAL DE PROYECTO

    //Guardar fecha en variable para asignarle un nombre unico a cada imagen que se suba, para evitar nombres repetidos
    $fecha= new DateTime();
    $imgProyecto=$fecha->getTimestamp()."_".$_FILES["imgProyecto"]["name"];


    //Mover imagen temporal a carpeta miniProyectos
    $imgProyecto_temp=$_FILES["imgProyecto"]["tmp_name"];
    move_uploaded_file($imgProyecto_temp,"../data/img/miniProyectos/".$imgProyecto);


    //CARGANDO IMG DE TECNOLOGIAS

    //IMG 1
    $imgSkillUno=$fecha->getTimestamp()."_".$_FILES["imgSkillUno"]["name"];

    //Mover imagen temporal a carpeta miniProyectos
    $imgSkillUno_temp=$_FILES["imgSkillUno"]["tmp_name"];
    move_uploaded_file($imgSkillUno_temp,"../data/img/miniProyectos/".$imgSkillUno);

    //IMG 2
    $imgSkillDos=$fecha->getTimestamp()."_".$_FILES["imgSkillDos"]["name"];

    //Mover imagen temporal a carpeta miniProyectos
    $imgSkillDos_temp=$_FILES["imgSkillDos"]["tmp_name"];
    move_uploaded_file($imgSkillDos_temp,"../data/img/miniProyectos/".$imgSkillDos);

    //IMG 3
    $imgSkillTres=$fecha->getTimestamp()."_".$_FILES["imgSkillTres"]["name"];

    //Mover imagen temporal a carpeta miniProyectos
    $imgSkillTres_temp=$_FILES["imgSkillTres"]["tmp_name"];
    move_uploaded_file($imgSkillTres_temp,"../data/img/miniProyectos/".$imgSkillTres);

    //IMG 4
    $imgSkillCuatro=$fecha->getTimestamp()."_".$_FILES["imgSkillCuatro"]["name"];

    //Mover imagen temporal a carpeta miniProyectos
    $imgSkillCuatro_temp=$_FILES["imgSkillCuatro"]["tmp_name"];
    move_uploaded_file($imgSkillCuatro_temp,"../data/img/miniProyectos/".$imgSkillCuatro);

    //IMG 5
    $imgSkillCinco=$fecha->getTimestamp()."_".$_FILES["imgSkillCinco"]["name"];

    //Mover imagen temporal a carpeta miniProyectos
    $imgSkillCinco_temp=$_FILES["imgSkillCinco"]["tmp_name"];
    move_uploaded_file($imgSkillCinco_temp,"../data/img/miniProyectos/".$imgSkillCinco);

    //IMG 6
    $imgSkillSeis=$fecha->getTimestamp()."_".$_FILES["imgSkillSeis"]["name"];

    //Mover imagen temporal a carpeta miniProyectos
    $imgSkillSeis_temp=$_FILES["imgSkillSeis"]["tmp_name"];
    move_uploaded_file($imgSkillSeis_temp,"../data/img/miniProyectos/".$imgSkillSeis);

    //conseguir datos de form y guardarlo en variables

    $titulo = $_POST["tituloProyecto"];
    $descripcion = $_POST["descripcionProyecto"];
    $btnLinkUno = $_POST["linkCode"];
    $btnLinkDos = $_POST["linkProyecto"];



    $objConexion = new conexion();
    $sql = "INSERT INTO `proyectos` (`id`, `titulo`, `descripcion`, `logo`, `btnLinkUno`, `btnLinkDos`, `imgSkillUno`, `imgSkillDos`, `imgSkillTres`, `imgSkillCuatro`, `imgSkillCinco`, `imgSkillSeis`) VALUES (NULL, '$titulo', '$descripcion', '$imgProyecto', '$btnLinkUno', '$btnLinkDos', '$imgSkillUno', '$imgSkillDos', '$imgSkillTres', '$imgSkillCuatro', '$imgSkillCinco', '$imgSkillSeis');";
    $objConexion->ejecutar($sql);

    header("location:gestion.php");
    }
    //redireccion en el caso de intentar acceder directamente a gestionProyectos.php desde URL
    header("location:gestion.php");
    ?>