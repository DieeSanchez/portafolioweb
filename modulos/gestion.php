<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Favicon-->
    <link rel="icon" href="../data/img/DSWIco.png">
    <!--SESION-->
    <?php
    session_start();
    if(!isset($_SESSION["usuario"])){
    header("location:login.php");
    }
    ?>


    <!--Conexion con base de datos-->
    <?php include("conexion.php");?>
    
    <!--Agregar datos con metodo post-->

    <?php

    if($_POST){
    //Guardar fecha en variable para asignarle un nombre unico a cada imagen que se suba, para evitar nombres repetidos
    $fecha= new DateTime();
    $img=$fecha->getTimestamp()."_".$_FILES["img"]["name"];

    //Mover imagen temporal a carpeta miniSkills
    $img_temp=$_FILES["img"]["tmp_name"];
    move_uploaded_file($img_temp,"../data/img/miniSkills/".$img);

    $objConexion = new conexion();
    $sql = "INSERT INTO `skills` (`id`, `img`) VALUES (NULL, '$img');";
    $objConexion->ejecutar($sql);

    //Redireccionar para no cargar varias veces lo mismo
    header("location:gestion.php");
    }

    //Tomar del metodo GET el id y ejecutar la sentencia SQL para borrar
    if ($_GET) {
        //Borrar skills
        if (isset($_GET["borrar"])) {
            $id = $_GET["borrar"];
            $objConexion = new conexion();
            
            //Consultar ubicacion y id especifico de la img a borrar
            $img = $objConexion->consultar("SELECT img FROM `skills` WHERE id=" . $id);
            
            //Borrar img con unlink
            unlink("../data/img/miniSkills/" . $img[0]["img"]);
            
            //Borrar datos img
            $sql = "DELETE FROM skills WHERE `skills`.`id` =" . $id;
            $objConexion->ejecutar($sql);
            
            //Redireccionar para no pedir borrar el mismo elemento
            header("location: gestion.php");
        }
    
        //Borrar cursos
        if (isset($_GET["borrarCursos"])) {
            $idCurso = $_GET["borrarCursos"];
            $objConexion = new conexion();
            
            //Consultar ubicacion y id especifico de la img a borrar
            $logo = $objConexion->consultar("SELECT logo FROM `cursos` WHERE id=" . $idCurso);
            
            //Borrar img con unlink
            unlink("../data/img/miniCursos/" . $logo[0]["logo"]);
            
            //Borrar datos img
            $sql = "DELETE FROM cursos WHERE `cursos`.`id` =" . $idCurso;
            $objConexion->ejecutar($sql);
            
            //Redireccionar para no pedir borrar el mismo elemento
            header("location: gestion.php");
        }
        //Borrar superior
        if (isset($_GET["borrarSuperior"])) {
            $idSuperior = $_GET["borrarSuperior"];
            $objConexion = new conexion();
            
            //Consultar ubicacion y id especifico de las imgs a borrar
            $imgCarrera = $objConexion->consultar("SELECT imgCarrera FROM `superior` WHERE id=" . $idSuperior);
            $imgInstitucion = $objConexion->consultar("SELECT imgInstitucion FROM `superior` WHERE id=" . $idSuperior);

            //Borrar imgs con unlink
            unlink("../data/img/miniSuperior/" . $imgCarrera[0]["imgCarrera"]);
            unlink("../data/img/miniSuperior/" . $imgInstitucion[0]["imgInstitucion"]);
            
            //Borrar datos img
            $sql = "DELETE FROM superior WHERE `superior`.`id` =" . $idSuperior;
            $objConexion->ejecutar($sql);
            
            //Redireccionar para no pedir borrar el mismo elemento
            header("location: gestion.php");
        }
        //Borrar proyectos
        if (isset($_GET["borrarProyecto"])) {
            $idProyecto = $_GET["borrarProyecto"];
            $objConexion = new conexion();
            
            //Consultar ubicacion y id especifico de las imgs a borrar
            $imgProyecto = $objConexion->consultar("SELECT logo FROM `proyectos` WHERE id=" . $idProyecto);

            $imgSkillUno = $objConexion->consultar("SELECT imgSkillUno FROM `proyectos` WHERE id=" . $idProyecto);
            $imgSkillDos = $objConexion->consultar("SELECT imgSkillDos FROM `proyectos` WHERE id=" . $idProyecto);
            $imgSkillTres = $objConexion->consultar("SELECT imgSkillTres FROM `proyectos` WHERE id=" . $idProyecto);
            $imgSkillCuatro = $objConexion->consultar("SELECT imgSkillCuatro FROM `proyectos` WHERE id=" . $idProyecto);
            $imgSkillCinco = $objConexion->consultar("SELECT imgSkillCinco FROM `proyectos` WHERE id=" . $idProyecto);
            $imgSkillSeis = $objConexion->consultar("SELECT imgSkillSeis FROM `proyectos` WHERE id=" . $idProyecto);


            //Borrar IMG PRICIPAL DE PROYECTO con unlink
            unlink("../data/img/miniProyectos/" . $imgProyecto[0]["logo"]);
            //Borrar IMGs de tecnologias con unlink
            unlink("../data/img/miniProyectos/" . $imgSkillUno[0]["imgSkillUno"]);
            unlink("../data/img/miniProyectos/" . $imgSkillDos[0]["imgSkillDos"]);
            unlink("../data/img/miniProyectos/" . $imgSkillTres[0]["imgSkillTres"]);
            unlink("../data/img/miniProyectos/" . $imgSkillCuatro[0]["imgSkillCuatro"]);
            unlink("../data/img/miniProyectos/" . $imgSkillCinco[0]["imgSkillCinco"]);
            unlink("../data/img/miniProyectos/" . $imgSkillSeis[0]["imgSkillSeis"]);
            
            //Borrar datos
            $sql = "DELETE FROM proyectos WHERE `proyectos`.`id` =" . $idProyecto;
            $objConexion->ejecutar($sql);
            
            //Redireccionar para no pedir borrar el mismo elemento
            header("location: gestion.php");
        }
}
    
    //Mostrar tabla SQL en pantalla
    $objConexion= new conexion();
    $skills=$objConexion->consultar("SELECT * FROM `skills`");
    $cursos=$objConexion->consultar("SELECT * FROM `cursos`");
    $superior=$objConexion->consultar("SELECT * FROM `superior`");
    $proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");
    ?>





</head>
<body> 
<!--Cerrar Sesion-->
<div class="d-grid gap-2 col-6 mx-auto">
  <br>
  <a href="./cerrar.php" class="btn btn-danger" role="button">Cerrar Sesión</a>
</div>


<!--Container de skills/tecnologias-->
    <div class="container mt-5">
	    <div class="row">

            <!--Form agregar skills/tecnologias-->
            <div class="col-md-6"> 
            <h4 class="text-light text-center mb-3 bg-dark p-2">Agrega Habilidades/Tecnologias:</h4>
            <form action="gestion.php" method="post" enctype="multipart/form-data" id="formSkills">
            <input required class="form-control" type="file" name="img" id="imgSkill">
            <!--<div id="alertSkill">alert</div>-->
            <span class="d-flex justify-content-center mt-2"><input class="btn btn-primary" type="submit" name="btm" value="Confirmar"></span>
            
            </form>
            </div>

            <!--Tabla de visualizacion y eliminacion-->
            <div class="col-md-6"> 
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Skill</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
               <?php foreach($skills as $skill) { ?>
                    <tr>
                        <td><?php echo $skill["id"];?></td>
                        <td><img width="40" src="../data/img/miniSkills/<?php echo $skill["img"];?>"></td>
                        <td><a class="btn btn-danger" href="?borrar=<?php echo $skill["id"];?>">Eliminar</a></td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>
	    </div>
    </div>



            <!--Container de Cursos/Certificaciones-->
    <div class="container mt-5">
	    <div class="row">

            <!--Form agregar Cursos/Certificaciones-->
            <div class="col-md-6"> 
            <h4 class="text-light text-center mb-3 bg-dark p-2">Agrega Cursos/Certificaciones:</h4>
            <form action="gestionCursos.php" method="post" enctype="multipart/form-data" id="formCursos">
                Titulo del curso:
            <input required class="form-control" type="text" name="tituloCurso" id="tituloCurso">
                Imagen del curso:
            <input required class="form-control mb-2 mt-2" type="file" name="logo" id="imgCurso" accept="image/jpeg, image/png">
                Link de certificado:
            <input class="form-control mb-2 mt-2" type="text" name="linkCert" id="linkCurso">
                Modulos:
            <textarea class="form-control" name="modalMod" id="modCurso" cols="68" rows="5"></textarea>
                Descripcion del curso:
            <input required class="form-control mb-2 mt-2" type="text" name="desCurso" id="desCurso">
            <span class="d-flex justify-content-center mt-2"><input class="btn btn-primary" type="submit" name="btm" value="Confirmar"></span>
            
            </form>
            </div>
            <!--Tabla de visualizacion y eliminacion-->
            <div class="col-md-6"> 
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Logo</th>
                        <th>Modulo</th>
                        <th>Link</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
               <?php foreach($cursos as $curso) { ?>
                    <tr>
                        <td><?php echo $curso["id"];?></td>
                        <td><?php echo $curso["titulo"];?></td>
                        <td><?php echo $curso["descripcion"];?></td>
                        <td><img width="40" src="../data/img/miniCursos/<?php echo $curso["logo"];?>"></td>
                        <td><?php echo substr($curso["modal"], 0, 50,);?></td> <!--Limitando la seccion Modulos a 50 caracteres-->
                        <td><?php echo substr($curso["link"], 0, 10,);?></td> <!--Limitando la seccion Link a 10 caracteres-->
                        <td><a class="btn btn-danger" href="?borrarCursos=<?php echo $curso["id"];?>">Eliminar</a></td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>
	    </div>
    </div>


<!--Container de Educacion Superior-->
<div class="container mt-5">
	    <div class="row">

            <!--Form agregar Carreras-->
            <div class="col-md-6"> 
            <h4 class="text-light text-center mb-3 bg-dark p-2">Agrega Carrera:</h4>
            <form action="gestionSuperior.php" method="post" enctype="multipart/form-data" id="formCarreras">
                Titulo de la carrera:
            <input required class="form-control mb-2" type="text" name="tituloSuperior" id="tituloCarrera">
                Institucion academica:
            <input required class="form-control mb-2" type="text" name="institucionSuperior" id="tituloInstitucion">
                Imagen de la carrera:
            <input required class="form-control mb-2 mt-2" type="file" name="imgCarrera" id="" accept="image/jpeg, image/png">
                Imagen de la institucion:
            <input required class="form-control mb-2 mt-2" type="file" name="imgInstitucion" id="" accept="image/jpeg, image/png">
                Duracion:
            <input class="form-control mb-2 mt-2" type="text" name="duracion" id="">
                Plan de estudios:
            <textarea class="form-control mb-2" name="modalPlanEstudios" id="" cols="68" rows="5"></textarea>
                Año de inicio de la carrera:
            <input required class="form-control mb-2 mt-2" type="text" name="fechaInicio" id="">
                Año de finalizacion de la carrera o estado actual de la misma:
            <input required class="form-control mb-2 mt-2" type="text" name="fechaFinal" id="">
            <span class="d-flex justify-content-center mt-2 mb-4"><input class="btn btn-primary" type="submit" name="btm" value="Confirmar"></span>
            
            </form>
            </div>
            <!--Tabla de visualizacion y eliminacion-->
            <div class="col-md-6"> 
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Institucion</th>
                        <th>Logo de institucion</th>
                        <th>Logo de carrera</th>
                        <th>Duracion</th>
                       <!-- <th>Plan de estudios</th> -->
                        <th>Fecha inicio</th>
                        <th>Fecha final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
               <?php foreach($superior as $carrera) { ?>
                    <tr>
                        <td><?php echo $carrera["id"];?></td>
                        <td><?php echo $carrera["titulo"];?></td>
                        <td><?php echo $carrera["institucionSuperior"];?></td>
                        <td><img width="40" src="../data/img/miniSuperior/<?php echo $carrera["imgInstitucion"];?>"></td>
                        <td><img width="40" src="../data/img/miniSuperior/<?php echo $carrera["imgCarrera"];?>"></td>
                        <td><?php echo $carrera["duracion"];?></td>
                        <td><?php echo $carrera["fechaInicio"];?></td>
                        <td><?php echo $carrera["fechaFinal"];?></td>
                        <td><a class="btn btn-danger" href="?borrarSuperior=<?php echo $carrera["id"];?>">Eliminar</a></td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>
	    </div>
    </div>


<!--Container de Proyectos-->
<div class="container mt-5">
	    <div class="row">

            <!--Form agregar Proyectos-->
            <div class="col-md-6"> 
            <h4 class="text-light text-center mb-3 bg-dark p-2">Agrega Proyecto:</h4>
            <form action="gestionProyectos.php" method="post" enctype="multipart/form-data" id="formProyectos">
                Titulo del proyecto:
            <input required class="form-control mb-2" type="text" name="tituloProyecto" id="tituloProyecto">
                Descripcion:
            <input class="form-control mb-2" type="text" name="descripcionProyecto" id="desProyecto">
                Imagen del proyecto:
            <input required class="form-control mb-2 mt-2" type="file" name="imgProyecto" id="imgProyecto" accept="image/jpeg, image/png">
                Link Codigo:
            <input required class="form-control mb-2 mt-2" type="text" name="linkCode" id="linkProyectoCode">
                Link Proyecto:
            <input class="form-control mb-2 mt-2" type="text" name="linkProyecto" id="">

            <!--MINI IMG DE TECNOLOGIAS USADAS-->

            Imagen de tecnologia 1:
            <input required class="form-control mb-2 mt-2" type="file" name="imgSkillUno" id="imgTecnologiaUno" accept="image/jpeg, image/png">
            Imagen de tecnologia 2:
            <input required class="form-control mb-2 mt-2" type="file" name="imgSkillDos" id="" accept="image/jpeg, image/png">
            Imagen de tecnologia 3:
            <input required class="form-control mb-2 mt-2" type="file" name="imgSkillTres" id="" accept="image/jpeg, image/png">
            Imagen de tecnologia 4:
            <input class="form-control mb-2 mt-2" type="file" name="imgSkillCuatro" id="" accept="image/jpeg, image/png">
            Imagen de tecnologia 5:
            <input class="form-control mb-2 mt-2" type="file" name="imgSkillCinco" id="" accept="image/jpeg, image/png">
            Imagen de tecnologia 6:
            <input class="form-control mb-2 mt-2" type="file" name="imgSkillSeis" id="" accept="image/jpeg, image/png">

            <!--MINI IMG DE TECNOLOGIAS USADAS-->

            <span class="d-flex justify-content-center mt-2 mb-4"><input class="btn btn-primary" type="submit" name="btm" value="Confirmar"></span>
            
            </form>
            </div>
            <!--Tabla de visualizacion y eliminacion-->
            <div class="col-md-6"> 
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Imagen de proyecto</th>
                        <th>Descripcion</th>
                        <th>Boton 1</th>
                        <th>Boton 2</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
               <?php foreach($proyectos as $proyecto) { ?>
                    <tr>
                        <td><?php echo $proyecto["id"];?></td>
                        <td><?php echo $proyecto["titulo"];?></td>
                        <td><img width="40" src="../data/img/miniProyectos/<?php echo $proyecto["logo"];?>"></td>
                        <td><?php echo $proyecto["descripcion"];?></td>
                        <td><?php echo substr($proyecto["btnLinkUno"], 0, 10,);?></td> <!--Limitando la seccion Link a 10 caracteres-->
                        <td><?php echo substr($proyecto["btnLinkDos"], 0, 10,);?></td> <!--Limitando la seccion Link a 10 caracteres-->
                        <td><a class="btn btn-danger" href="?borrarProyecto=<?php echo $proyecto["id"];?>">Eliminar</a></td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
            </div>
	    </div>
    </div>

 <script src="../data/js/validacionForms.js"></script>
</body>
</html>