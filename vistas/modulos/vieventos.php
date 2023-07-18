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
      
    Respuesta de Asamblea

    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Vieventos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">  
        
		<?php
		
		if(isset($_GET["valorA"]) && isset($_GET["valorB"]) ){
		
		$productos = array("Activos","Inactivo");
		
		$productov = array($_GET["valorA"],$_GET["valorB"]);
		//echo'<h1>valorA--></h1>'.$producto[0];
		$colores = array("red","green");
		}else{
		$productos = array("Activos","Inactivo");		
		$productov = array("50","50");
		$colores = array("red","green");
		}
		
		
		?>
		
		
<!--=====================================
PRODUCTOS MÁS VENDIDOS
======================================-->

<div class="box box-default">
	
	<div class="box-header with-border">
  
      <h3 class="box-title">Grafico</h3>

    </div>

	<div class="box-body">
    
      	<div class="row">

	        <div class="col-md-7">

	 			<div class="chart-responsive">
	            
	            	<canvas id="pieChart" height="150"></canvas>
	          
	          	</div>

	        </div>
			
			<div class="col-md-5">
		      	
		  	 	<ul class="chart-legend clearfix">

		  	 	<?php

					for($i = 0; $i < 2; $i++){

					echo ' <li><i class="fa fa-circle-o text-'.$colores[$i].'"></i> '.$productos[$i].' '.$productov[$i].'</li>';

					}


		  	 	?>


		  	 	</ul>

		    </div>

		    

		</div>

    </div>



</div>

<script>
	

  // -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [

  <?php

  for($i = 0; $i < 2; $i++){

  	echo "{
      value    : ".$productov[$i].",
      color    : '".$colores[$i]."',
      highlight: '".$colores[$i]."',
      label    : '".$productos[$i]."'
    },";

  }
    
   ?>
  ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%>'
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  // -----------------
  // - END PIE CHART -
  // -----------------


</script>
      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Codigo</th>
           <th>Coeficiente inactivo</th>
           <th>Coeficiente activo</th>
           <th>Coeficiente total</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $Vieventos = ControladorVieventos::ctrMostrarVieventos($item, $valor);
		  
          
          foreach ($Vieventos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["nombre"].'</td>
                    <td class="text-uppercase">'.$value["codigo"].'</td>
                    <td class="text-uppercase">'.$value["coeficiente_inactivo"].'</td>
                    <td class="text-uppercase">'.$value["coeficiente_activo"].'</td>
                    <td class="text-uppercase">'.$value["coeficiente_total"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarVieventos" idVieventos="'.$value["codigo"].'" data-toggle="modal" data-target="#modalEditarVieventos"><i class="fa fa-eye"></i></button>
						<button class="btn btn-warning btnEliminarViEventos" valorA="'.$value["coeficiente_inactivo"].'" valorB="'.$value["coeficiente_activo"].'"><i class="fa fa-pie-chart"></i></button>
						';
						
       
                      echo '</div>  

                    </td>

                  </tr>
				  
				  ';
          }

        ?>

        </tbody>

       </table>
	   
	   

      </div>

    </div>

  </section>

</div>


<!--=====================================
MODAL VIEVENTOS
======================================-->

<div id="modalEditarVieventos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Vieventos</h4>

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

                <input type="text" class="form-control input-lg" name="editarnombre" id="editarnombre" >

                 

              </div>

            </div>
            <!-- ENTRADA PARA EL CODIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span> 

                <input type="text" class="form-control input-lg" name="editarcodigo" id="editarcodigo" >

                

              </div>

            </div>
            <!-- ENTRADA PARA EL COEFICIENTE_INACTIVO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="text" class="form-control input-lg" name="editarcoeficiente_inactivo" id="editarcoeficiente_inactivo" required>

                 

              </div>

            </div>
            <!-- ENTRADA PARA EL COEFICIENTE_ACTIVO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="text" class="form-control input-lg" name="editarcoeficiente_activo" id="editarcoeficiente_activo" required>

                 

              </div>

            </div>
            <!-- ENTRADA PARA EL COEFICIENTE_TOTAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="text" class="form-control input-lg" name="editarcoeficiente_total" id="editarcoeficiente_total" >

                 

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




