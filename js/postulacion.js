$(function () {
    insertarPostulacion();
    
  
  
   
    function insertarPostulacion() {
      $("#postular").click(function (e) {

        $.ajax({
            method: 'POST',
            url: 'includes/insertarPostulacion.php',
            data: form,
            success: function (response) {
              console.log(response)
            }
          });
       
  
        e.preventDefault();
      });
    }
  
 
  
  
  });