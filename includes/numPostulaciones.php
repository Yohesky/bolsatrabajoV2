<?php 
                        
                          
                        include("conexion.php");
                        
                        
                            $id = $_SESSION['idusuarios'];
                         
                          
                          $query = "SELECT * FROM usuarios_has_propuesta WHERE usuarios_idusuarios='$idusuario' ";
                          $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                          $numregistros = mysqli_num_rows($rsQuery);
                          return $numregistros;
                        

                  ?>