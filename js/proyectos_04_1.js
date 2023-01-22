       

    /****** version 04  **************************/
    /* scss/08-fetch.scss     css/08-fetch.css  */
    /*  sass assets/scss/08-fetch.scss assets/css/08-fetch.css */
    /* añadir funcion estrellas puntuacion     */
    /* mejora css                              */
    /* temas dark light   
    https://webdesign.tutsplus.com/es/tutorials/color-schemes-with-css-variables-and-javascript--cms-36989                     */
    /* iconos google materialize                 */
    /*  menu varias paginas                      */
    /*******************************************/
    const setTheme = theme => document.documentElement.className = theme;
    //const fichAlumnos = 'IFCD0210_202207.json';
    //const fichAlumnos = 'IFCD0210_202211.json';

    function verCurso(fichAlumnos)
    {
       console.log('entro');
        fetch(fichAlumnos)
      .then(response => {
        if (response.ok)
          return response.text()
        else
          console.log("fallo");
          throw new Error(response.status);
      })
      .then(data => {
          console.log("Datos: " + data);
          const clase=JSON.parse(data);
          console.log("Clase: " + clase);
         // datos alumnos a  #alumnos
         //let talumnos = '<h2>Alumnos</h2>';
         let talumnos ='';
         var cont = 1;
        for (const item of clase.alumnos)
        {
          switch (cont)
          {
            case 1:
              orden = 'first';
              cont++;
              break;
            case 2:
              orden = 'second';
              cont++;
              break;
            case 3:
              orden = 'third';
              cont=1;
              break
          }
          talumnos += ficha_persona(item,orden);
         
          
    
        }
        document.querySelector('#proyectos').innerHTML=talumnos;
         
    
       
       
      })
      .catch(err => {
        console.error("ERROR: ", err.message)
      });
    
    }
      function ficha_persona (persona,ord){
        ficha = `<div class="col-lg-4 col-md-6 portfolio-item ${ord}">
            <div class="portfolio-img rounded overflow-hidden">
                <img class="img-fluid" src="img/${persona.imagen}" alt="">
                <div class="portfolio-btn">
                    <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="img/${persona.imagen}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="${persona.url}" target="_blank"><i class="fa fa-link"></i></a>
                </div>
            </div>
            <div class="pt-3">
                <p class="text-primary mb-0">${persona.Nombre}</p>
                <hr class="text-primary w-25 my-2">
                <h5 class="lh-base">${persona.descripcion}</h5>
            </div>
     </div>`;














       
          return ficha;
          
          
          /* "Nombre":"Alumno1",
                "email" : "Alumno1@gmail.com",
                "linked" : "https://www.linkedin.com/",
                "github" : "https://github.com",
                "inicio" : {    
                    "html" : 2,
                    "css" : 3,
                    "JS" : 1,
                    "Vue" : 3
                },
                "fin" : {     
                    "html" : 4,
                    "css" : 4,
                    "JS" : 4,
                    "Vue" : 4 
                } */
    
      }


   
    
     
    