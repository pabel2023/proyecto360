<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>
			

			';

		}



	
		
		
		if($_SESSION["perfil"] == "Administrador"){

			echo '
			<li class="treeview">

				<a href="#">

					<i class="fa fa-calendar"></i>
					
					<span>Asambleas</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>
				
				<ul class="treeview-menu">
				
				<li>

				<a href="eventos">

					<i class="fa fa-building-o"></i>
					<span>Asamblea</span>
					
				</a>
				
				</li>
				
				<li>

				<a href="itemcorum">

					<i class="fa fa-users"></i>
					<span>Quórum</span>

				</a>
				
				</li>
				
				<li>

				<a href="vieventos">

					<i class="fa fa-line-chart"></i>
					<span>Resumen de votaciones</span>

				</a>
				
				</li>
				
				</ul>

			</li>
			
			<li class="treeview">

				<a href="#">

					<i class="fa fa-question-circle-o"></i>
					
					<span>Cuestionarios</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>
				
				<ul class="treeview-menu">
				
				<li>

				<a href="test">

					<i class="fa fa-file-text"></i>
					<span>Preguntas</span>

				</a>
			
				
				</li>
				
				<li>

				<a href="testopcion">

				<i class="fa fa-server"></i>
				<span>Respuestas</span>

			</a>
				
				</li>
				
				<li>

				<a href="testaction">

				<i class="fa fa-cogs"></i>
				<span>Votaciones</span>

			</a>
				
				</li>
				
				</ul>

			</li>
			
			
			
			';

		}



		?>

		</ul>

	 </section>

</aside>