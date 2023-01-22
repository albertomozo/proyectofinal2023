// fichero personalizalizado para el buscador
// Call the dataTables jQuery plugin
$(document).ready(function() {
  var idioma = navigator.language || navigator.userLanguage;
  console.log(idioma);
  var tidioma = idioma + '.json'; // es_ES   eu 

  $('#dataTable').DataTable({
      language: {
         
             url: 'js/demo/lang/'+tidioma
    }
  } 


  );

});


// https://datatables.net/plug-ins/i18n/Spanish

