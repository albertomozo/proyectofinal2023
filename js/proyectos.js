       

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
    const fichAlumnos = 'IFCD0210_202211.json';
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













        /* ficha = `<ul><li>Nombre : ${persona.Nombre}</li>
          <li>Email : ${persona.email}</li>
          <li> <a href="${persona.linked}" target="_blank">Linked<img src="assets/icons/linkedin-brands.svg" width="20px"></a>
          <a href="${persona.github}" target="_blank">github</a><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" width="20px"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg></li>
          </ul>`;
          */
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
    
      function evolucion(pers)
      {
        let evolucion = '<table><th><td>Materia</td><td>Inicio</td><td>Fin</td></tr>';
        console.log('persona.incio' + (pers.inicio));
        //console.log('HTML' + pers.inicio.html);
        for (let i in pers.inicio,pers.fin)
        {
          console.log (i + pers.inicio[i]);
          console.log (i + pers.fin[i]);
          evolucion += `<tr><td>${i}</td><td>${estrellas(pers.inicio[i])}</td><td>${estrellas(pers.fin[i])}</td></tr>`;
        
        }
          
        
        evolucion +='</table>';
        return evolucion;
    
    
       
     
    
      }
      function estrellas(n){
            texto = '';
            for (i=1;i<=n;i++){ texto += '*';}
            return texto;
        }