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
      
    Preguntas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Preguntas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTest">
          
          Agregar Pregunta


        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
          
           <th>Asamblea</th>
           <th>texto</th>
           <th>tipo</th>
           <th>estado</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $Test = ControladorTest::ctrMostrarTest($item, $valor);

          foreach ($Test as $key => $value) {
            $Eventos = ControladorEventos::ctrMostrarEventos("id", $value["id_evento"]);

            echo ' <tr>

                    <td>'.($key+1).'</td>

                    
                    <td class="text-uppercase">'.$Eventos["codigo"].'</td>
                    <td class="text-uppercase">'.$value["texto"].'</td>
                    <td class="text-uppercase">'.$value["tipo"].'</td>
                    <td class="text-uppercase">'.$value["estado"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarTest" idTest="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTest"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarTest" idTest="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR TEST
======================================-->

<div id="modalAgregarTest" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Pregunta</h4>

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

            

            <!-- ENTRADA PARA EL TEXTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-text-height"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaTexto" placeholder="Ingresar texto" >

              </div>

            </div>
            <!-- ENTRADA PARA EL TIPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaTipo" placeholder="Ingresar tipo" >

              </div>

            </div>
 
            <!-- ENTRADA PARA SELECCIONAR SU ESTADO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-refresh"></i></span> 

                <select class="form-control input-lg" name="nuevaEstado">
                  
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

          <button type="submit" class="btn btn-primary">Guardar Pregunta</button>

        </div>

        <?php

          $crearTest = new ControladorTest();
          $crearTest -> ctrCrearTest();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TEST
======================================-->

<div id="modalEditarTest" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Pregunta</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
		  
		  

        <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" id="editarEvento"  name="editarEvento"  required>
                  
                  <option id="editarEventoSelected"></option>
				  
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

            <!-- ENTRADA PARA EL TEXTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-text-height"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTexto" id="editarTexto" >
				<input type="hidden"  name="editarId" id="editarId" >

               
              </div>

            </div>
            <!-- ENTRADA PARA EL TIPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTipo" id="editarTipo" >


              </div>

            </div>
             <!-- ENTRADA PARA SELECCIONAR SU ESTADO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-refresh"></i></span> 

                <select class="form-control input-lg" name="editarEstado">
                  
                  <option value="" id="editarEstado"></option>

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

          $editarTest = new ControladorTest();
          $editarTest -> ctrEditarTest();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarTest = new ControladorTest();
  $borrarTest -> ctrBorrarTest();

?>


