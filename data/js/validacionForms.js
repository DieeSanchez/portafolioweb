//VARIABLES FORM CURSOS
const formCursos = document.getElementById("formCursos");
const tituloCurso = document.getElementById("tituloCurso");
const imgCurso = document.getElementById("imgCurso");
const desCurso = document.getElementById("desCurso");
//VARIABLES FORM SKILLS
const formSkills = document.getElementById("formSkills");
const imgSkill = document.getElementById("imgSkill");
//VARIABLES FORM CARRERAS
const formCarreras = document.getElementById("formCarreras");
const tituloCarrera = document.getElementById("tituloCarrera");
const tituloInstitucion = document.getElementById("tituloInstitucion");
//VARIABLES FORM PROYECTOS
const formProyectos = document.getElementById("formProyectos");
const tituloProyecto = document.getElementById("tituloProyecto");
const desProyecto = document.getElementById("desProyecto");
const imgProyecto = document.getElementById("imgProyecto");
const linkProyectoCode = document.getElementById("linkProyectoCode");
const imgTecnologiaUno = document.getElementById("imgTecnologiaUno");




//Form Cursos
formCursos.addEventListener("submit", e=>{
    if(tituloCurso.value.trim() === ""){ //el metodo .triem() elimina los espacios en blanco al principio y al final de la cadena antes de realizar la comprobación
        e.preventDefault();//si se cumple la condicion, el metodo evita que se envie el formulario
        alert("Titulo obligatorio");
    }else if(imgCurso.value.trim() === ""){ //else if evita que salgan todos los alert seguidos.
        e.preventDefault();
        alert("Imagen de curso obligatorio");
    }else if(desCurso.value.trim() === ""){ 
        e.preventDefault();
        alert("Descripcion de curso obligatorio");
    }
})
//Form Skills
formSkills.addEventListener("submit", e=>{
    //let estado = false;
    if(imgSkill.value.trim() === ""){
        e.preventDefault()
        alert("Imagen de tecnologia obligatorio");
       //estado = true;
    }
   /* if (estado){
        alertSkill.innerHTML = "IMG OBLITATORIA"
    }*/
})
//Form Carreras
formCarreras.addEventListener("submit", e=>{
    if(tituloCarrera.value.trim() === ""){
        e.preventDefault();
        alert("Titulo obligatorio");
    }else if(tituloInstitucion.value.trim() === ""){ 
        e.preventDefault();
        alert("Titulo de institucion obligatorio");
    }
})
//Form Proyectos
formProyectos.addEventListener("submit", e=>{
    if(tituloProyecto.value.trim() === ""){
        e.preventDefault();//si se cumple la condicion, el metodo evita que se envie el formulario
        alert("Titulo obligatorio");
    }else if(imgProyecto.value.trim() === ""){ //else if evita que salgan todos los alert seguidos.
        e.preventDefault();
        alert("Imagen de proyecto obligatorio");
    }else if(desProyecto.value.trim() === ""){ 
        e.preventDefault();
        alert("Descripcion obligatorio");
    }else if(linkProyectoCode.value.trim() === ""){
        e.preventDefault();
        alert("Link del codigo obligatorio");
    }else if(imgTecnologiaUno.value.trim() === ""){
        e.preventDefault();
        alert("Es obligatorio una imagen minimo de una tecnologia");
    }
})
