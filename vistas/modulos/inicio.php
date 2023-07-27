<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tablero
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>

  <section class="content">

     <div class="row">
       
     
         <div class="col-lg-12">
           
          <?php

          if($_SESSION["perfil"] =="Especial"){

             echo '<div class="box box-success">

             <div class="box-header">

             <h1>Bienvenid@ ' .$_SESSION["perfil"].'</h1>

             </div>

             </div>';

          }

          ?>

         </div>
		 </div>
		 <div class="row">
		 <div class="box">
		 
		 <div class="box-header with-border">
  
        <h2>HISTORIAL DE SUS VOTACIONES</h2>

      </div>

		      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>          
           <th>Pregunta</th>
           <th>Respuesta</th>
           

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $testaction = ControladorTestaction::ctrMostrarTestaction($item, $valor);

          foreach ($testaction as $key => $value) {
            $eventos = ControladorEventos::ctrMostrarEventos("id", $value["id_evento"]);
			$test = ControladorTest::ctrMostrarTest("id", $value["id_text"]);
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                   
                    <td class="text-uppercase">['.$eventos["codigo"].'] '.$test["texto"].'?</td>
                    <td class="text-uppercase">'.$value["text"].'</td>
                    

                    

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>
	  </div>

     </div>

  </section>
 
</div>
