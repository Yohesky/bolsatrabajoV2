$("#controlPanel").click( (e) => {
  console.log("click");
  $(location).attr('href','panelAdmin.php');
  
}) 

  $("#trabajos").click( (e) => {
    console.log("click");
    $(location).attr('href','trabajador.php');
    
  })  


  $("#misPostulaciones").click( (e) => {
    console.log("click");
    $(location).attr('href','postulaciones.php');
    
  })  

  $("#perfil").click( (e) => {
    console.log("click");
    $(location).attr('href','perfilTrabajador.php');
    
  }) 

  $("#salir").click( (e) => {
    console.log("click");
    $(location).attr('href','includes/logout.php');
    
  })

  $('#empresas').click( (e) => {
    $(location).attr('href','buscarEmpresa.php');
  })
