<?php
//Incluindo arquivos de conexao com o banco e queries
include_once "php/connect.php";


//Verificar se existe alguma sessao
session_start();
if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
	header('location:index.php');
} else {
?>

	<!DOCTYPE html>
	<html lang="pt-br">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="lib/bootstrap/min/bootstrap.min.css" />
		<link rel="stylesheet" href="css/cadastro.css" />
		<script defer src="lib/bootstrap/min/bootstrap.min.js"></script>
		<title>Cadastro</title>
	</head>

	<body>
		
		<!-- Section de cadastro -->
		<section class="mt-5 mb-5 form-cad">
			<form method="post" id="formulario" class="formulario" action="">
				<div class="col-12 mb-2" id="txt-task-div">
					<input type="text" name="nome" class="form-control form-input" placeholder="Nome" required="required" />
				</div>
				<div class="col-12 mb-2" id="txt-task-div">
					<input type="text" name="email" class="form-control form-input" placeholder="Email" required="required" />
				</div>
				<div class="col-12 mb-2" id="txt-task-div">
					<input type="password" name="senha" class="form-control form-input" placeholder="Senha" required="required" />
				</div>
				<div class="col-12 mb-2" id="txt-task-div">
					<input type="password" name="senha_dois" class="form-control form-input" placeholder="Senha novamente" required="required" />
				</div>
				<div class="col-12" id="btn-add">
					<button type="submit" class="btn btn-outline-light">Cadastrar</button>
				</div>
			</form>

			<p class="mt-5 text-danger" role="alert">
				<?php
				//Incluir o cadastro. Mensagem em caso de erros :)
				include_once "php/cadastro_query.php";
				?>
			</p>
			<div class="login-btn">
				<a href="index.php"><button type="submit" class="btn btn-outline-light mt-5">Login</button></a>
			</div>
		</section>

		<script>
			//Script para prevenir o reenvio de dados para o banco ao atualizar a página
			if (window.history.replaceState) {
				window.history.replaceState(null, null, window.location.href);
			}
		</script>
	</body>

	</html>

<?php
}
?>