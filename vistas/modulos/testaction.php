<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
    Votaciones
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Votaciones</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTestaction">
          
          Agregar Votaciones

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Asamblea</th>
           <th>Pregunta</th>
           <th>Respuesta</th>
           <th>Usuario</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $testaction = ControladorTestaction::ctrMostrarTestaction($item, $valor);

          foreach ($testaction as $key => $value) {
            $Eventos = ControladorEventos::ctrMostrarEventos("id", $value["id_evento"]);
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$Eventos["codigo"].'</td>
                    <td class="text-uppercase">'.$value["id_text"].'</td>
                    <td class="text-uppercase">'.$value["id_test_opcion"].'</td>
                    <td class="text-uppercase">'.$value["id_usuario"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarTestaction" idTestaction="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTestaction"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarTestaction" idTestaction="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                        }

                      echo '</div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR TESTACTION
======================================-->

<div id="modalAgregarTestaction" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Votacion</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

                   <!-- ENTRADA PARA SELECCIONAR Evento -->

        <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" id="nuevaEvento" name="nuevaEvento" required>
                  
                  <option value="">Selecionar Asamblea</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $eventos = ControladorEventos::ctrMostrarEventos($item, $valor);

                  foreach ($eventos as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>
            <!-- ENTRADA PARA EL id_textT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="nuevaid_text" placeholder="Ingresar Pregunta" >

              </div>

            </div>
            <!-- ENTRADA PARA EL ID_TEST_OPCION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-server"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="nuevaid_test_opcion" placeholder="Ingresar Respuesta" >

              </div>

            </div>

             <!-- ENTRADA ID_USUARIO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="nuevaid_usuario" placeholder="Ingresar Usuario" >

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Votacion</button>

        </div>

        <?php

          $crearTestaction = new ControladorTestaction();
          $crearTestaction -> ctrCrearTestaction();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TESTACTION
======================================-->

<div id="modalEditarTestaction" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Votaciones</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL ID_EVENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="editarid_evento" id="editarid_evento" >

                 <input type="hidden"  name="idTestaction" id="idTestaction" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL id_text -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="editarid_text" id="editarid_text" >

              </div>

            </div>
            <!-- ENTRADA PARA EL ID_TEST_OPCION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-server"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="editarid_test_opcion" id="editarid_test_opcion" >

              </div>

            </div>

            <!-- ENTRADA PARA EL ID_USUARIO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="editarid_usuario" id="editarid_usuario" >

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarTestaction = new ControladorTestaction();
          $editarTestaction -> ctrEditarTestaction();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarTestaction = new ControladorTestaction();
  $borrarTestaction -> ctrBorrarTestaction();

?>


