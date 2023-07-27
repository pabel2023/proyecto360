<?php

if($_SESSION["perfil"] != "Especial"){

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
  
        

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
          
           
           <th>texto</th>
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

                    
                    
		  <td class="text-uppercase"> ['.$Eventos["codigo"].'] '.$value["texto"].'?</td>
                    

                    <td>

                      <div class="btn-group">
                        <button class="btn btn-danger btnResponderTest" idEvento="'.$value["id_evento"].'" idTest="'.$value["id"].'" respuesta="SI">SI <i class="fa fa-thumbs-o-up"></i></button>
						<button class="btn btn-danger btnResponderTest" idEvento="'.$value["id_evento"].'" idTest="'.$value["id"].'" respuesta="NO">NO <i class="fa fa-thumbs-o-down"></i></button>

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




<?php

  $crearTestaction = new ControladorTestaction();
  $crearTestaction -> ctrCrearTestaction2();

?>


