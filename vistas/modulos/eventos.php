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
      
    Asamblea
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Eventos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEventos">
          
          Agregar Asamblea

        </button>
		
      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
          
           <th>nombre</th>
		       <th>codigo</th>
           <th>fecha ini</th>
           <th>fecha fin</th>
           <th>hora ini</th>
           <th>hora fin</th>
           <th>estado</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $Eventos = ControladorEventos::ctrMostrarEventos($item, $valor);

          foreach ($Eventos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    
                    <td class="text-uppercase">'.$value["nombre"].'</td>
                    <td class="text-uppercase">'.$value["codigo"].'</td>
                    <td class="text-uppercase">'.$value["fecha_ini"].'</td>
                    <td class="text-uppercase">'.$value["fecha_fin"].'</td>
                    <td class="text-uppercase">'.$value["hora_ini"].'</td>
                    <td class="text-uppercase">'.$value["hora_fin"].'</td>
                    <td class="text-uppercase">'.$value["estado"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarEventos" idEventos="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarEventos"><i class="fa fa-pencil"></i></button>
						<button class="btn btn-success btnIdCargueItemCorum" idEventos="'.$value["id"].'" data-toggle="modal" data-target="#btnIdCargueItemCorum"><i class="fa fa-file-excel-o"></i></button>
						<button class="btn btn-info btnLlamarItemCorum"  idEventos="'.$value["id"].'"><i class="fa fa-handshake-o"></i></button>
                        <button class="btn btn-danger btnEliminarEventos" idEventos="'.$value["id"].'"><i class="fa fa-times"></i></button>
						
						</div>  

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
MODAL AGREGAR EVENTOS
======================================-->

<div id="modalAgregarEventos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Asamblea</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

           
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevanombre" placeholder="Ingresar nombre" required>

              </div>

            </div>
           
            <!-- ENTRADA PARA EL FECHA_INI -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevafecha_ini" placeholder="Ingresar fecha inicio" require  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask >
				

              </div>			  
			

            </div>
            <!-- ENTRADA PARA EL FECHA_FIN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevafecha_fin" placeholder="Ingresar fecha finalizacion"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask require>
	

              </div>

            </div>
            <!-- ENTRADA PARA EL HORA_INI -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-hourglass-start"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="nuevahora_ini" placeholder="Ingresar hora inicio" >

              </div>

            </div>
            <!-- ENTRADA PARA EL HORA_FIN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-hourglass-end"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="nuevahora_fin" placeholder="Ingresar hora finalizacion" >

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

          <button type="submit" class="btn btn-primary">Guardar Asamblea</button>

        </div>

        <?php

          $crearEventos = new ControladorEventos();
          $crearEventos -> ctrCrearEventos();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR EVENTOS
======================================-->

<div id="modalEditarEventos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Asamblea</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnombre" id="editarnombre" required>

                 <input type="hidden"  name="idEventos" id="idEventos" required>

              </div>

            </div>
            
            <!-- ENTRADA PARA fecha_ini -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editarfecha_ini" id="editarfecha_ini" >

                 

              </div>

            </div>
            <!-- ENTRADA PARA EL fecha_fin -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editarfecha_fin" id="editarfecha_fin" >

               

              </div>

            </div>
            <!-- ENTRADA PARA hora_ini -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-hourglass-start"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="editarhora_ini" id="editarhora_ini" >

             

              </div>

            </div>
            <!-- ENTRADA PARA hora_fin -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-hourglass-end"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="editarhora_fin" id="editarhora_fin" >

               

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

          $editarEventos = new ControladorEventos();
          $editarEventos -> ctrEditarEventos();

        ?> 

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL GRAFICO EVENTOS
======================================-->

<div id="btnIdCargueItemCorum" class="modal fade" role="dialog">
   <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Quórum</h4>

        </div>
		
		

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
		   <div class="col-md-7">
      
        <div class="file-input text-center">
		 <input type="hidden"  name="idEventoCargue" id="idEventoCargue" required>
            <input  type="file" name="dataCliente" id="file-input" />
            <label  for="file-input">
              <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
              <span>Elegir Archivo Excel</span></label
            >
          </div>
      
      
    </div>
			
			</div>
		</div>
		
		
	    <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Subir Excel</button>

        </div>

        <?php

          $crearItemCorum = new ControladorItemCorum();
          $crearItemCorum -> ctrCargarItemCorum();

        ?>

      </form>

    </div>

  </div>
  

</div>


<?php

  $borrarEventos = new ControladorEventos();
  $borrarEventos -> ctrBorrarEventos();

?>


