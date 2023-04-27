<?php
//Incluindo arquivos de conexão com o banco e queries
include_once "php/connect.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="lib/bootstrap/min/bootstrap.min.css" />
	<link rel="stylesheet" href="styles.css" />
	<script defer src="lib/bootstrap/min/bootstrap.min.js"></script>
	<title>Lista de Tarefas</title>

</head>

<body>

	<?php
	session_start();
	//Se nao tiver nenhum login, aparece apenas a tela de login :)
	if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
	?>


		<!-- Section contendo formulario de login -->
		<section class="mt-5 mb-5 login-form-section">
			<form method="post" class="login-form" action="">
				<div class="col-12 mb-2">
					<input type="text" name="email" class="form-control login-form-input" placeholder="Email" required="required" />
				</div>
				<div class="col-12 mb-2">
					<input type="password" name="senha" class="form-control login-form-input" placeholder="Senha" required="required" />
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-outline-light">Entrar</button>
				</div>
			</form>
			<div class="divCad">
				<p class="mt-5 text-danger" role="alert">
					<?php
					//Chama o login para fazer a operacoes. Mensagens em caso de erro
					include_once "php/login_query.php";
					?>
				</p>

				<p>Não tem conta?</p>
				<a href="cadastro.php"><button type="submit" class="btn btn-outline-light">Cadastre-se</button></a>
			</div>
		</section>
	<?php
	}
	//Se nao (tiver um login), aparece todo o conteudo da pagina :)
	else {
		//Definindo variaveis internas com valores das variaveis globais
		$id_usuario = $_SESSION['id_usuario'];
		$nome = $_SESSION['nome'];
		$email = $_SESSION['email'];
		$senha = $_SESSION['senha'];

		//Inclui php/queries apenas se estiver logado, por isso coloquei aqui no 'else' ;)
		include_once "php/queries.php";
	?>
		<!-- Section de logout -->
		<section class="logout-section d-flex justify-content-between align-items-center mt-3">
			<div class="user-data ms-3">
				<p><?php echo $nome; ?></p>
			</div>
			<div class="logout-btn me-3">
				<a href="php/logout.php"><button type="submit" class="btn btn-outline-light">Sair</button></a>
			</div>
		</section>

		<!-- Section contendo o forumulário de tarefas-->
		<section class="mt-5 mb-5 task-form-section">
			<form method="post" class="task-form" action="">
				<div class="row">
					<div class="col-12 mb-2">
						<input type="text" name="tarefa" class="form-control task-form-input" placeholder="Nova tarefa" id="txt-tarefa" required="required" />
					</div>
					<div class="col-12 mb-2">
						<input type="time" name="hora" class="form-control task-form-input" required="required" />
					</div>
					<div class="col-12" id="btn-add">
						<button type="submit" class="btn btn-outline-light">Adicionar</button>
					</div>
				</div>
			</form>
		</section>

		<!-- Section contnedo a tabela com as tarefas -->
		<section class="task-section">
			<table class="table table-bordered border-primary table-dark align-middle task-table">
				<tbody>
					<!-- Corpo da tabela dentro da estrutura de repetição para exibir as tarefas -->
					<?php foreach ($tarefa as $item) : ?>
						<tr>
							<td <?= $item['estado_tarefa'] == 'C' ? 'class="concluida"' : '' ?>><strong><?= $item['hora_tarefa'] ?></strong> - <?= $item['nome_tarefa'] ?></td>
							<td>
								<?php if ($item['estado_tarefa'] == 'A') :  ?>
									<a href="?concluir=<?= $item['id'] ?>">
										<button type="submit" class="btn btn-outline-light mb-2">
											Concluir
										</button>
									</a>
								<?php endif ?>
								<a href="?excluir=<?= $item['id'] ?>">
									<button type="submit" class="btn btn-outline-light">Excluir</button>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</section>

		<script>
			//Script para prevenir o reenvio de dados para o banco ao atualizar a página
			if (window.history.replaceState) {
				window.history.replaceState(null, null, window.location.href);
			}
		</script>

	<?php
		//Fecha o parenteses do 'else'
	}
	?>

</body>

</html>