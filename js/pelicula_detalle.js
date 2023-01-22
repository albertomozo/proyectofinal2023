       

    
      
    const url = `https://api.themoviedb.org/3/movie/${tmdbId}?api_key=${apikey}&language=es`;
    let reproductor;
    let textocreditos;
    //alert(url);
    fetch(url)
      .then(response => {
        if (response.ok)
          return response.text()
        else
          console.log("fallo");
          throw new Error(response.status);
      })
      .then(data => {
          console.log("Datos: " + data);
          const peli=JSON.parse(data);
          console.log("Datos Pelicula:  " + peli);
          // acceso a videos pelicula
          const urlv = `https://api.themoviedb.org/3/movie/${tmdbId}/videos?api_key=${apikey}&language=es`; 
          fetch(urlv)
            .then(response => {
              if (response.ok)
                return response.text()
              else
                console.log("fallo");
                throw new Error(response.status);
            })
            .then(datav => {
                const videos =JSON.parse(datav);
                console.log ('Videos 🎬' );
                console.log (videos);
                console.log ('video = ' + videos.results[0].key);
                const videoid = videos.results[0].key;
                const sitio = videos.results[0].site;
                reproductor = '<h4> Datos API (Videos) </h4>';
                console.log('Sitio ' + sitio);
                switch (sitio)
                {
                  case 'YouTube':
                    reproductor += `<iframe width="560" height="315" src="https://www.youtube.com/embed/${videoid}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`
                    break;
                  case 'Vimeo':
                      reproductor += ``
                      break;
                  
                }


                document.querySelector('#pelicula_detalle').innerHTML=reproductor;

              
            })
            .catch(err => {
              console.error("ERROR: ", err.message)
            });
            //fin  acceso a videos pelicula
            // creditos
            textocreditos = '<h4>Datos API credits</h4>';
            const urlc = `https://api.themoviedb.org/3/movie/${tmdbId}/credits?api_key=${apikey}&language=es`; 
            fetch(urlc)
            .then(response => {
              if (response.ok)
                return response.text()
              else
                console.log("fallo");
                throw new Error(response.status);
            })
            .then(datac => {
                const creditos =JSON.parse(datac);
                console.log ('CREDITOS 🔶');
                console.log (creditos);
                
                textocreditos += '<p>Director 🎬 '+ creditos.crew[0].original_name + '<img class="img-fluid" src="'+ tmdb_ruta_poster + creditos.crew[0].profile_path +'"  alt="'+creditos.crew[0].original_name +'">';
                
                '</p>';
                actores = creditos.cast;
                
                actores.forEach(function(item,i) {
                    // código 
                        textocreditos += '<p><strong>'+ actores[i].character  + '</strong> : ' + actores[i].original_name + '</p>';
                });

           
                
                 console.log (textocreditos);
                 document.querySelector('#pelicula_detalle_creditos').innerHTML=textocreditos;
                
                             
            })
            .catch(err => {
              console.error("ERROR: ", err.message)
            });
            // fin creditos
           
      
            
         
        })
        .catch(err => {
          console.error("ERROR: ", err.message)
        });
    
    
     
    
   
   