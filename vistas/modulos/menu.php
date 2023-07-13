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

			</li>';

		}



		if($_SESSION["perfil"] == "Administrador"){

			echo '<li>

				<a href="clientes">

					<i class="fa fa-users"></i>
					<span>Clientes</span>

				</a>

			</li>
			
			<li>

				<a href="categorias">

					<i class="fa fa-users"></i>
					<span>Categorias</span>

				</a>

			</li>
			
			<li>

				<a href="test">

					<i class="fa fa-users"></i>
					<span>Test</span>

				</a>

			</li>

			<li>

				<a href="productos">

					<i class="fa fa-users"></i>
					<span>Productos</span>

				</a>

			</li>
			
			<li>

			<a href="testopcion">

				<i class="fa fa-users"></i>
				<span>Testopcion</span>

			</a>

		</li>
		
		<li>

			<a href="testaction">

				<i class="fa fa-users"></i>
				<span>Testaction</span>

			</a>

		</li>';


		}
		
		
		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>Administrar Eventos</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>
				
				<ul class="treeview-menu">
				
				<li>

				<a href="eventos">

					<i class="fa fa-calendar"></i>
					<span>Eventos</span>

				</a>
				
				</li>
				
				<li>

				<a href="itemcorum">

					<i class="fa fa-calendar"></i>
					<span>ItemCorum</span>

				</a>
				
				</li>
				
				<li>

				<a href="vieventos">

					<i class="fa fa-calendar"></i>
					<span>Resumen Eventos</span>

				</a>
				
				</li>
				
				</ul>

			</li>';

		}



		?>

		</ul>

	 </section>

</aside>