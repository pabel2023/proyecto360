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
      
    Quórum
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar ItemCorum</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarItemCorum">
          
          Agregar Quórum

        </button>
		
		<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarItemCorum2">
          
          Cargar Quórum

        </button>

      </div>
	  
	 

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           
           <th>Asamblea</th>
           <th>Nomenclatura</th>
           <th>Tipo</th>
           <th>Porcentaje</th>
           <th>titular</th>
           <th>encargado</th>
           <th>Estado</th>
           <th>participacion</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php
		

          $item = null;
          $valor = null;
		  
		  if(isset($_GET["idEventos"])){
			  
		  $item = "id_evento";
          $valor = $_GET["idEventos"];
		  }

          $ItemCorum = ControladorItemCorum::ctrMostrarItemCorum($item,$valor);

          foreach ($ItemCorum as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    
                    <td class="text-uppercase">'.$value["id_evento"].'</td>
                    <td class="text-uppercase">'.$value["nombre"].'</td>
                    <td class="text-uppercase">'.$value["tipo"].'</td>
                    <td class="text-uppercase">'.$value["porcentage"].'</td>
                    <td class="text-uppercase">'.$value["documento_titular"].' '.$value["nombre_titular"].' '.$value["apellido_titular"].'</td>
                    <td class="text-uppercase">'.$value["documento_encargado"].' '.$value["nombre_encargado"].' '.$value["apellido_encargado"].'</td>
                    <td class="text-uppercase">'.$value["estado"].'</td>';
                    
                    if($value["participacion"] != 0){

                      echo '<td><button class="btn btn-success btn-xs btnActivar" idItemCorum="'.$value["id"].'" estadoItemCorum="0">Activado</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs btnActivar" idItemCorum="'.$value["id"].'" estadoItemCorum="1">Desactivado</button></td>';
  
                    } 
                    

                    echo ' <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarItemCorum" idItemCorum="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarItemCorum"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-danger btnEliminarItemCorum" idItemCorum="'.$value["id"].'"><i class="fa fa-times"></i></button>';

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
MODAL AGREGAR ITEMCORUM 2
======================================-->

<div id="modalAgregarItemCorum2" class="modal fade" role="dialog">
  
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

<!--=====================================
MODAL AGREGAR ITEMCORUM
======================================-->

<div id="modalAgregarItemCorum" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

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

            
            <!-- ENTRADA PARA EL ID_EVENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="text"    class="form-control input-lg" name="nuevaid_evento" placeholder="Ingresar Asamblea" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevanombre" placeholder="Ingresar nombre" >

              </div>

            </div>
            <!-- ENTRADA PARA EL TIPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevatipo" placeholder="Ingresar tipo" >

              </div>

            </div>
            <!-- ENTRADA PARA EL PORCENTAGE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pie-chart"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaporcentage" placeholder="Ingresar porcentaje" >

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO_TITULAR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevadocumento_titular" placeholder="Ingresar documento titular" >

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE_TITULAR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-street-view"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevanombre_titular" placeholder="Ingresar nombre titular" >

              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO_TITULAR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-street-view"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaapellido_titular" placeholder="Ingresar apellido titular" >

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO_ENCARGADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file-o"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevadocumento_encargado" placeholder="Ingresar documento encargado" >

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE_ENCARGADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-street-view"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevanombre_encargado" placeholder="Ingresar nombre encargado" >

              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO_ENCARGADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-street-view"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaapellido_encargado" placeholder="Ingresar apellido encargado" >

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

          <button type="submit" class="btn btn-primary">Guardar Quórum</button>

        </div>

        <?php

          $crearItemCorum = new ControladorItemCorum();
          $crearItemCorum -> ctrCrearItemCorum();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ITEMCORUM
======================================-->

<div id="modalEditarItemCorum" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Quórum</h4>

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

                <input type="text"   class="form-control input-lg" name="editarid_evento" id="editarid_evento" readonly  required>

                <input type="hidden"  name="idItemCorum" id="idItemCorum" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnombre" id="editarnombre" >

                 

              </div>

            </div>
            <!-- ENTRADA PARA EL TIPO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editartipo" id="editartipo" >

                 

              </div>

            </div>
            <!-- ENTRADA PARA EL PORCENTAGE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-pie-chart"></i></span> 

                <input type="text" class="form-control input-lg" name="editarporcentage" id="editarporcentage" >

                 

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO_TITULAR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editardocumento_titular" id="editardocumento_titular" >

                

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE_TITULAR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-street-view"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnombre_titular" id="editarnombre_titular" >

              </div>

            </div>
            <!-- ENTRADA PARA EL APELLIDO_TITULAR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-street-view"></i></span> 

                <input type="text" class="form-control input-lg" name="editarapellido_titular" id="editarapellido_titular" >

                

              </div>

            </div>
            <!-- ENTRADA PARA EL DOCUMENTO_ENCARGADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-file-o"></i></span> 

                <input type="text" class="form-control input-lg" name="editardocumento_encargado" id="editardocumento_encargado" >

                

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE_ENCARGADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-street-view"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnombre_encargado" id="editarnombre_encargado" >

              </div>

            </div>
            <!-- ENTRADA PARA EL APELLIDO_ENCARGADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-street-view"></i></span> 

                <input type="text" class="form-control input-lg" name="editarapellido_encargado" id="editarapellido_encargado" >

                

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

          $editarItemCorum = new ControladorItemCorum();
          $editarItemCorum -> ctrEditarItemCorum();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarItemCorum = new ControladorItemCorum();
  $borrarItemCorum -> ctrBorrarItemCorum();

?>


