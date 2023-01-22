       

    
      
    const url = `https://api.themoviedb.org/3/movie/${tmdbId}?api_key=${apikey}&language=es`;
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
          console.log("Clase: " + peli);
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
                console.log (videos);
                console.log ('video = ' + videos.results[0].key);
                const videoid = videos.results[0].key;
                const sitio = videos.results[0].site;
                const name = videos.results[0].name;
                reproductor = '<h4> Datos API</h4>';
                console.log('Sitio ' + sitio);
                switch (sitio)
                {
                  case 'YouTube':
                    reproductor += `<iframe width="560" height="315" src="https://www.youtube.com/embed/${videoid}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p>${name}</p>`
                    break;
                  case 'Vimeo':
                      reproductor += `<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/${videoid}?h=a4cec3f8b9&color=ffffff&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
                      <p><a href="https://vimeo.com/${videoid}" target="_blank">Verlo en vimeo</a> </p>
                      <p>${name}</p>`
                      break;
                      
                  
                }


                document.querySelector('#pelicula_detalle').innerHTML=reproductor;

              
            })
            .catch(err => {
              console.error("ERROR: ", err.message)
            });
      
            
         
        })
        .catch(err => {
          console.error("ERROR: ", err.message)
        });
    
    
     
    
   
   