<?php 
	//$usuario = $_SESSION['usuario']; 
 ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Super Gás</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav w-100 align-items-center">
						<li class="nav-item me-2">
							<a class="nav-link active" aria-current="page" href="./listaClientes.php">Clientes</a>
						</li>
						<li class="nav-item  me-2">
							<a class="nav-link" href="./cadastrarCliente.php">Cadastrar Cliente</a>
						</li>
						<li class="nav-item  me-2">
							<a class="nav-link active" href="./listaProdutos.php">Produtos</a>
						</li>

						<li class="nav-item  me-2">
							<a class="nav-link" href="./cadastrarProduto.php">Cadastrar Produto</a>
						</li>

						<li class="nav-item dropdown  me-2">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Relatorios
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item" href="#">Vendas Por Periodo</a></li>
								<li><a class="dropdown-item" href="#">Total de Vendas</a></li>
								<li><a class="dropdown-item" href="./listaProdutos.php">Lista de Gastos</a></li>
							</ul>
						</li>

						<li class="nav-item  me-2">
							<a class="nav-link" href="./vencidos.php">Vencidos</a>
						</li>

					</ul>
					<ul class="navbar-nav " id="sair">
						<li class="nav-item dropdown ">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
								Olá, <?php //echo preg_replace("#^([^\s]*)\s.*?$#", "$1", $usuario);?>
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									
									<li><a class="dropdown-item" href="#"> Perfil</a></li>
									<li><hr class="dropdown-divider"></li>
									<li><a class="dropdown-item" href="../action/logout.php"> Sair</a></li>
								</ul>
					</ul>	
				</div>
			</div>
	</nav>