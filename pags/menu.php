<?php 
	session_start();
	$usuario = $_SESSION['usuario']; 
 ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Super Gás</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="./listaClientes.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./cadastrarCliente.php">Cadastrar Cliente</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./cadastrarProduto.php">Cadastrar Produto</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./cadastrarProduto.php">Vencidos</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Dropdown link
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item" href="#">Actiond</a></li>
								<li><a class="dropdown-item" href="#">Anotherd action</a></li>
								<li><a class="dropdown-item" href="./listaProdutos.php">Lista de Produtos</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./cadastrarCliente.php">Cadastrar Cliente</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							 Olá, <?php echo $usuario;?>
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item" href="#">Actiond</a></li>
								<li><a class="dropdown-item" href="#">Anotherd action</a></li>
								<li><a class="dropdown-item" href="./listaProdutos.php">Lista de Produtos</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="../include/desconecta.php"> Sair</a></li>
							</ul>
					</ul>
				</div>
			</div>
	</nav>