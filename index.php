<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diego M. Sanchez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="data/Styles/styles.css"> 
    <link rel="stylesheet" href="data/Styles/home.css">
    <link rel="stylesheet" href="data/Styles/cardProyecto.css">
    <link rel="stylesheet" href="data/Styles/skills.css">
    <link rel="stylesheet" href="data/Styles/academico.css">

    <!--CDN FONTS ICONS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!--CDN FONTS GOOGLE-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Tektur:wght@400;500&display=swap" rel="stylesheet">


    <!--Favicon-->
    <link rel="icon" href="data/img/iconDevDMS.png">


    <!--PHP-->
    <?php include("modulos/conexion.php");?>
    <?php
      $objConexion= new conexion();
      $skills=$objConexion->consultar("SELECT * FROM `skills`");
      $cursos=$objConexion->consultar("SELECT * FROM `cursos`");
      $superior=$objConexion->consultar("SELECT * FROM `superior`");
      $proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");
    ?>

</head>
<body>


<!-- NAV -->
<div class="sticky-top">
  <nav id="navMenu" class="navbar navbar-expand-md navbar-dark sticky-top" data-bs-spy="affix">
    <div class="container-fluid">
      <a id="devIco" class="navbar-brand" target="_blank" href="">&lt;/&gt;</a>

      <button class="iconNav navbar-toggler bg-dark" 
      type="button" 
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toogle navigation">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link fontNav" href="#sectionHome"><i class="fas fa-address-card"></i> Presentacion</a></li>
              <li class="nav-item"><a class="nav-link fontNav" href="#tituloSuperior"><i class="fas fa-graduation-cap"></i> Academico</a></li>
              <li class="nav-item"><a class="nav-link fontNav" href="#seccionProyectos"><i class="fas fa-code"></i> Proyectos</a></li>
              <li class="nav-item"><a class="nav-link fontNav" href="#contactoSeccion"><i class="fas fa-envelope"></i> Contacto</a></li>
          </ul>
      </div>
    </div>
  </nav>
</div>


    <!--TITULO Y PORTADA-->
    
    <section class="sectionHome" id="sectionHome">
      
      <div class="sectionHomeContent">
        <h1 id="nameDev"> DIEGO M. SANCHEZ</h1>
      <div id="txtAnimate" class="txtAnimate">
          <h2>SOFTWARE DEVELOPER</h2>
      </div>
      <div id="redesIco">
      <a href="https://www.linkedin.com/in/diegos-m-sanchez/" target="_blank"> <img class="redIco" src="data/img/BLinkedin.png" alt=""> </a>
      <a href="mailto:diegomsanchezdev@gmail.com"><img class="redIco" src="data/img/BGmail.png" alt=""></a>
      <a href="https://github.com/DieeSanchez" target="_blank"><img class="redIco" src="data/img/BGitHub.png" alt=""></a>
      </div>

        <p>¡Bienvenido a mi portafolio web! Te invito a explorar mi CV, disponible para descarga o visualización online.</p> 

        <div class="btnCVs">
          <a href="data/doc/CV.pdf" target="_blank" class="btnCV">Descargar CV PDF</a>
          <a href="https://dieesanchez.github.io/" target="_blank" class="btnCV">Abrir CV WEB</a>
        </div>
      </div>
    </section>

      <!--SECCION DE DATOS ACADEMICOS(TITULOS, CERTIFICADOS, CURSOS, ETC)-->

      <section id="tituloSuperior">

        <div class="container">
          <div id="labelSuperior" class="row align-items-start bg-dark text-uppercase">
            <div class="col text-center">
              <h2>Estudios Superiores</h2>
            </div>
          </div>
          <!--Tarjetas Superiores-->
          <div id="cardsSuperior" class="row align-items-center">
          <?php foreach($superior as $carrera) { ?>
            <div id="cardZoom" class="col-md-6 mb-4">
              <div class="card text-center h-100 d-flex flex-column" id="cardCarrera">
                <div class="card-header">
                  <span class="d-block mb-2"><?php echo $carrera["fechaInicio"];?> - <?php echo $carrera["fechaFinal"];?></span>
                  <img src="data/img/miniSuperior/<?php echo $carrera["imgInstitucion"];?>" class="imgCardSuperior" alt="...">
                  <img src="data/img/miniSuperior/<?php echo $carrera["imgCarrera"];?>" class="imgCardSuperior" alt="...">
                </div>
                
                <div class="card-body flex-grow-1">
                  <h5 class="card-title fw-bold fs-4 text-uppercase"><?php echo $carrera["titulo"];?></h5>
                  <h5 class="card-title fw-bold fs-5"><?php echo $carrera["institucionSuperior"];?></h5>
                  <p class="card-text">Duracion: <span class="duracionCardSup"><?php echo $carrera["duracion"];?></span></p>
                  <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?php echo $carrera["id"];?>" class="btn btn-outline-info text-uppercase">Plan de Estudios</a>
                </div>
              </div>               
            </div>



            <!--MODAL-->

            <div class="modal fade" id="staticBackdrop-<?php echo $carrera["id"];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title text-dark" id="staticBackdropLabel">PLAN DE ESTUDIOS</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-dark">
                      <p><?php echo $carrera["planEstudios"];?></p>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-dark text-light d-flex" data-bs-dismiss="modal">CERRAR</button>
                    </div>
                  </div>
                </div>
              </div>

            <!--MODAL-->



          <?php } ?>

          </div>

          <div class="row align-items-start bg-dark">
            <div class="col text-center text-uppercase">
              <h2>Cursos y capacitaciones</h2>
            </div>
          </div>

          <!--Tarjetas Cursos-->
          <div id="cardsCursos" class="row align-items-end mb-4">
            
            <?php foreach($cursos as $curso) { ?>
              <div id="cardZoom" class="col-sm-6 col-md-4">
                <div class="card mb-3" style="max-width: 540px;" id="cardCurso">
                  <div class="row g-0">
                    <div class="col-xl-4 imgCardInf">
                      <img src="data/img/miniCursos/<?php echo $curso["logo"];?>" class="img-fluid rounded-start imgCardInf" id="imgLogoCurso" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title fw-bold fs-4 text-uppercase"><?php echo $curso["titulo"];?></h5>
                        <p class="card-text txtDescripCardCurso"><?php echo $curso["descripcion"];?></p>
                        <a href="<?php echo $curso["link"];?>" target="_blank" class="btn btn-outline-warning btnCur1 text-uppercase">Certificado</a>
                        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?php echo $curso["id"];?>" class="btn btn btn-outline-info btnCur2 text-uppercase">Modulos</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            <!--MODAL-->

            <div class="modal fade" id="staticBackdrop-<?php echo $curso["id"];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title text-dark" id="staticBackdropLabel">MODULOS</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-dark">
                      <p><?php echo $curso["modal"];?></p>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-dark text-light d-flex" data-bs-dismiss="modal">CERRAR</button>
                    </div>
                  </div>
                </div>
              </div>

            <!--MODAL-->
            <?php } ?>




          </div>
        </div>
      </div>

     </section>
 <!--SECCION DE HABILIDADES-->

 <section id="skillsBox" class="bg-image d-flex align-items-center">
  <div class="container">
    <div id="labelSkill" class="row align-items-start bg-dark text-uppercase">
      <div class="col text-center">
        <h2>Habilidades/Tecnologias</h2>
      </div>
    </div>

    <div class="row" id="rowSkill">
      <?php foreach($skills as $skill) { ?>

        <div class="col-lg-2 col-md-4 col-sm-4 col-6 align-self-start d-flex justify-content-center">
          <div class="skillCard">
            <div class="img-container">
              <div class="rotate">
                <img class="skillImg" src="data/img/miniSkills/<?php echo $skill["img"];?>" alt="">
              </div>
            </div>
          </div>
        </div>

      <?php } ?>
    </div>
  </div>
</section>




  <!--SECCION DE PROYECTOS-->

<section id="seccionProyectos">
  <div class="container">

    <div id="labelSkill" class="row align-items-start bg-dark text-uppercase">
      <div class="col text-center">
        <h2>Proyectos</h2>
      </div>
    </div>

    <div class="row cardBg">

    <?php foreach($proyectos as $proyecto) { ?>
      <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center"> 
        <div class="card cardProy" style="width: 28rem;">
          <h4 class="card-title text-uppercase text-center fw-bold"><?php echo $proyecto["titulo"];?></h4>

          <!--Validacion de img logo, si el archivo existe, entonces renderiza la img-->
          <?php if (file_exists("data/img/miniProyectos/" . $proyecto["logo"])) { ?>
            <img src="data/img/miniProyectos/<?php echo $proyecto["logo"];?>" class="card-img-top" id="imgLogoProyecto"alt="...">
          <?php } ?>
          <!--Validacion de img skills, si el archivo existe, entonces renderiza las img-->
          <div class="card-body text-center">
            <?php if (file_exists("data/img/miniProyectos/" . $proyecto["imgSkillUno"])) { ?>
              <img class="imgTecProyecto" width="40" src="data/img/miniProyectos/<?php echo $proyecto["imgSkillUno"];?>">
            <?php } ?>
            <?php if (file_exists("data/img/miniProyectos/" . $proyecto["imgSkillDos"])) { ?>
              <img class="imgTecProyecto" width="40" src="data/img/miniProyectos/<?php echo $proyecto["imgSkillDos"];?>">
            <?php } ?>
            <?php if (file_exists("data/img/miniProyectos/" . $proyecto["imgSkillTres"])) { ?>
              <img class="imgTecProyecto" width="40" src="data/img/miniProyectos/<?php echo $proyecto["imgSkillTres"];?>">
            <?php } ?>
            <?php if (file_exists("data/img/miniProyectos/" . $proyecto["imgSkillCuatro"])) { ?>
              <img class="imgTecProyecto" width="40" src="data/img/miniProyectos/<?php echo $proyecto["imgSkillCuatro"];?>">
            <?php } ?>
            <?php if (file_exists("data/img/miniProyectos/" . $proyecto["imgSkillCinco"])) { ?>
              <img class="imgTecProyecto" width="40" src="data/img/miniProyectos/<?php echo $proyecto["imgSkillCinco"];?>">
            <?php } ?>
            <?php if (file_exists("data/img/miniProyectos/" . $proyecto["imgSkillSeis"])) { ?>
              <img class="imgTecProyecto" width="40" src="data/img/miniProyectos/<?php echo $proyecto["imgSkillSeis"];?>">
            <?php } ?>
            
            <p class="card-text"><?php echo $proyecto["descripcion"];?></p>
            <span class="d-flex justify-content-between">
              <a href="<?php echo $proyecto["btnLinkUno"];?>" target="_blank" class="btn btn-dark text-uppercase">Repositorio</a>
              <a href="<?php echo $proyecto["btnLinkDos"];?>" target="_blank" class="btn btn-success text-uppercase">Sitio</a>
            </span>
          </div>
        </div>
      </div>
    <?php } ?>

    </div>
  </div>
</section>





    <!--CONTACTO(Linkedin-EMAIL-ETC)-->
<section id="seccionContacto" class="bg-image d-flex align-items-center">
    <div class="container mt-5 mb-5" id="contactoSeccion">
        <h1 class="text-center">Contacto</h1>
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
                <form action="mailto:diegomsanchezdev@gmail.com" method="post" enctype="text/plain">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

</section>

 <div id="redesIco">
    <a href="https://www.linkedin.com/in/diegos-m-sanchez/" target="_blank"> <img class="redIco" src="data/img/BLinkedin.png" alt=""> </a>
    <a href="mailto:diegomsanchezdev@gmail.com"><img class="redIco" src="data/img/BGmail.png" alt=""></a>
</div>

<div id="redesIco" class="d-flex justify-content-end">
    <a href="#sectionHome"> <img class="redIco" src="data/img/fechaHome.png" alt=""> </a>
</div>
    <!--FOOTER-->
<footer class="bg-dark">
          <div class="text-center">By Diego Marcelo Sanchez - 2023</div>
</footer>

    <!--SCRIPTS JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="data/js/navAnimacion.js"></script>
</body>
</html>