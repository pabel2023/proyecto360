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
      
      Respuesta
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Respuesta</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTestopcion">
          
        Agregar Respuesta

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Asamblea</th>
           <th>Respuesta</th>
           <th>texto</th>
           <th>estado</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $testopcion = ControladorTestopcion::ctrMostrarTestopcion($item, $valor);

          foreach ($testopcion as $key => $value) {
            $eventos = ControladorEventos::ctrMostrarEventos("id", $value["id_evento"]);
           
            echo ' <tr>

                    <td>'.($key+1).'</td>
                    <td class="text-uppercase">'.$eventos["codigo"].'</td>
                    <td class="text-uppercase">'.$value["id_test"].'</td>
                    <td class="text-uppercase">'.$value["texto"].'</td>
                    <td class="text-uppercase">'.$value["estado"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarTestopcion" idTestopcion="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTestopcion"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarTestopcion" idTestopcion="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR TESTOPCION
======================================-->

<div id="modalAgregarTestopcion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Respuesta</h4>

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
            <!-- ENTRADA PARA EL ID_TEST -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-server"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="nuevaid_test" placeholder="Ingresar Respuesta" >

              </div>

            </div>
            <!-- ENTRADA PARA EL TEXTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-text-height"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevatexto" placeholder="Ingresar texto" >

              </div>

            </div>
           <!-- ENTRADA PARA SELECCIONAR SU ESTADO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-refresh"></i></span> 

                <select class="form-control input-lg" name="nuevaestado">
                  
                  <option value="">Selecionar estado</option>

                  <option value="Activo">Activo</option>

                  <option value="Inactivo">Inactivo</option>

                </select>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Respuesta</button>

        </div>

        <?php

          $crearTestopcion = new ControladorTestopcion();
          $crearTestopcion -> ctrCrearTestopcion();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TESTOPCION
======================================-->

<div id="modalEditarTestopcion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Respuesta</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

           <!-- ENTRADA PARA ID_EVENTO -->
            
           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="editarid_evento" id="editarid_evento" >

              

              </div>

            </div>

            <!-- ENTRADA PARA EL ID_TEST -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-server"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="editarid_test" id="editarid_test" >
                <input type="hidden"  name="idTestopcion" id="idTestopcion" required>
                

              </div>

            </div>
            <!-- ENTRADA PARA EL TEXTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-text-height"></i></span> 

                <input type="text" class="form-control input-lg" name="editartexto" id="editartexto" >


              </div>

            </div>
            <!-- ENTRADA PARA SELECCIONAR SU ESTADO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-refresh"></i></span> 

                <select class="form-control input-lg" name="editarestado">
                  
                  <option value="" id="editarestado"></option>

                  <option value="Activo">Activo</option>

                  <option value="inactivo">Inactivo</option>

                </select>

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

          $editarTestopcion = new ControladorTestopcion();
          $editarTestopcion -> ctrEditarTestopcion();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarTestopcion = new ControladorTestopcion();
  $borrarTestopcion -> ctrBorrarTestopcion();

?>


