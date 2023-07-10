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
      
      Administrar Eventos
    
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
          
          Agregar Eventos

        </button>
		
      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
          
           <th>nombre</th>
		   <th>codigo</th>
           <th>fecha_ini</th>
           <th>fecha_fin</th>
           <th>hora_ini</th>
           <th>hora_fin</th>
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
						<button class="btn btn-warning btnEditarEventos" idEventos="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarEventos3"><i class="fa fa-handshake-o"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarEventos" idEventos="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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

          <h4 class="modal-title">Agregar Eventos</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

           
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevanombre" placeholder="Ingresar nombre" required>

              </div>

            </div>
           
            <!-- ENTRADA PARA EL FECHA_INI -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevafecha_ini" placeholder="Ingresar fecha inicio"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask >
				

              </div>			  
			

            </div>
            <!-- ENTRADA PARA EL FECHA_FIN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevafecha_fin" placeholder="Ingresar fecha finalizacion"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask >
	

              </div>

            </div>
            <!-- ENTRADA PARA EL HORA_INI -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="nuevahora_ini" placeholder="Ingresar hora inicio" >

              </div>

            </div>
            <!-- ENTRADA PARA EL HORA_FIN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="nuevahora_fin" placeholder="Ingresar hora finalizacion" >

              </div>

            </div>

  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Eventos</button>

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

          <h4 class="modal-title">Editar Eventos</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnombre" id="editarnombre" required>

                 <input type="hidden"  name="idEventos" id="idEventos" required>

              </div>

            </div>
            
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarfecha_ini" id="editarfecha_ini" >

                 

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarfecha_fin" id="editarfecha_fin" >

               

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="editarhora_ini" id="editarhora_ini" >

             

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="number" min="0"  class="form-control input-lg" name="editarhora_fin" id="editarhora_fin" >

               

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarestado" id="editarestado" >

                

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
MODAL EDITAR EVENTOS
======================================-->

<!--=====================================
MODAL GRAFICO EVENTOS
======================================-->

<div id="modalEditarEventos2" class="modal fade" role="dialog">
 <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">xxxxxx</h4>

        </div>
		
		

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
		   <div class="col-md-7">
      
        <div class="file-input text-center">
          
          </div>
      
      
    </div>
			
			</div>
		</div>
		
		
	    <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          

        </div>

        

      </form>

    </div>

  </div>
  

</div>


<?php

  $borrarEventos = new ControladorEventos();
  $borrarEventos -> ctrBorrarEventos();

?>

<div id="modalEditarEventos3">
		<?php         
           include "reportes/productos-mas-vendidos.php";
          ?>
</div>
