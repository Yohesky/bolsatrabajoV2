<?php


$query = "SELECT titulo, nombre FROM usuarios_has_propuesta JOIN propuesta
ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta
JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios WHERE empresa_idempresa=5;
"

?>