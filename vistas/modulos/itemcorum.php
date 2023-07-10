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
      
      Administrar ItemCorum
    
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
          
          Agregar ItemCorum

        </button>
		
		<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarItemCorum2">
          
          Cargar ItemCorum

        </button>

      </div>
	  
	 

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           
           <th>id_evento</th>
           <th>nombre</th>
           <th>tipo</th>
           <th>porcentage</th>
           <th>documento_encargado</th>
           <th>nombre_encargado</th>
           <th>estado</th>
           
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $ItemCorum = ControladorItemCorum::ctrMostrarItemCorum($item, $valor);

          foreach ($ItemCorum as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    
                    <td class="text-uppercase">'.$value["id_evento"].'</td>
                    <td class="text-uppercase">'.$value["nombre"].'</td>
                    <td class="text-uppercase">'.$value["tipo"].'</td>
                    <td class="text-uppercase">'.$value["porcentage"].'</td>
                    <td class="text-uppercase">'.$value["documento_encargado"].'</td>
                    <td class="text-uppercase">'.$value["nombre_encargado"].'</td>
                    <td class="text-uppercase">'.$value["estado"].'</td>
                    

                    <td>

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

          <h4 class="modal-title">Agregar ItemCorum</h4>

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

          <h4 class="modal-title">Agregar ItemCorum</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            
            <!-- ENTRADA PARA EL ID_EVENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text"    class="form-control input-lg" name="nuevaid_evento" placeholder="Ingresar id_evento" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

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
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaporcentage" placeholder="Ingresar porcentage" >

              </div>

            </div>
            <!-- ENTRADA PARA EL DOCUMENTO_ENCARGADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevadocumento_encargado" placeholder="Ingresar documento_encargado" >

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE_ENCARGADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevanombre_encargado" placeholder="Ingresar nombre_encargado" >

              </div>

            </div>
            <!-- ENTRADA PARA EL ESTADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaestado" placeholder="Ingresar estado" >

              </div>

            </div>

  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar ItemCorum</button>

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

          <h4 class="modal-title">Editar ItemCorum</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA EL ID_EVENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text"   class="form-control input-lg" name="editarid_evento" id="editarid_evento" required>

                <input type="hidden"  name="idItemCorum" id="idItemCorum" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

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
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarporcentage" id="editarporcentage" >

                 

              </div>

            </div>
            <!-- ENTRADA PARA EL DOCUMENTO_ENCARGADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editardocumento_encargado" id="editardocumento_encargado" >

                

              </div>

            </div>
            <!-- ENTRADA PARA EL NOMBRE_ENCARGADO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnombre_encargado" id="editarnombre_encargado" >

                

              </div>

            </div>
            <!-- ENTRADA PARA EL ESTADO -->
            
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


