$("#controlPanel").click( (e) => {
  console.log("click");
  $(location).attr('href','controlPanelEmpresa.php');
  
}) 

  $("#mistrabajos").click( (e) => {
    console.log("click");
    $(location).attr('href','empresa.php');
    
  })  


  $("#perfilEmpresa").click( (e) => {
    console.log("click");
    $(location).attr('href','perfilEmpresa.php');
    
  }) 

  $("#salir").click( (e) => {
    console.log("click");
    $(location).attr('href','includes/logout.php');
    
  })

  $("#publicar").click( (e) => {
    console.log("click");
    $(location).attr('href','publicarPropuesta.php');
    
  })

  $("#buscarTrabajador").click( (e) => {
    $(location).attr('href','buscarTrabajador.php');
  })
