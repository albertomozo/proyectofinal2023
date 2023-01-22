    /****** version 04  **************************/
    /*        carga de json de un array y menu de pestañas       */
    /*******************************************/
    const setTheme = theme => document.documentElement.className = theme;
    let talumnos ='';
    const grupos = ['IFCD0210_202207.json','IFCD0210_202211.json'];
    talumnos += '<ul>';
    for (let index = 0; index < grupos.length; index++) {
        const element = grupos[index];
        talumnos += '<li><span class on click="mostrar('+element+')>'+element +  '</span></li>';
        // creamos menu de ficheros
        //verCurso(element);      
    }
    talumnos += '</ul>';

    function verCurso(fichero){
        fetch(fichero)
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
            textoCurso = clase.curso + ' - ' + clase.fecha_inicio ;
            talumnos += `<h6 class="text-primary text-center">${textoCurso}</h6>`;

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