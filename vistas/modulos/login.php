<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img src="vistas/img/plantilla/logo-negro-bloque.png" class="img-responsive" style="padding:0px 100px 0px 100px">

  </div>

  

  <div class="login-box-body" id="myDIV" hidden="true">
    <p class="login-box-msg"><b>Registrate</b></p>
    <p class="login-box-msg">Debes estar registrado para acceder nuestros eventos.</p>
    <form role="form" method="post">
          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

           
  
          </div>

          <div class="row">
       
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">Guardar Registros</button>
          <button type="button" class="btn btn-default pull-left btn-block"   onclick="myFunction()" >Ingresar al sistema</button>          

        </div>

        <script type="text/javascript">
          
function myFunction() {
    var x = document.getElementById("myDIV");
    var b = document.getElementById("myDIVB");
    
    if (x.style.display === "none") {
        x.style.display = "block";
        b.style.display = "none";
    } else {
        x.style.display = "none";
        b.style.display = "block";
    }
}


        </script>

      </div>
      
      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearClienteInicio();

      ?>

          </div>


          <div class="login-box-body" id="myDIVB"   >

    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>

      <div class="row">
       
       

          <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
         
       

      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>

  </div>

</div>
