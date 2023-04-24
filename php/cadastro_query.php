<?php
if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['senha_dois'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
    $senha_dois = filter_input(INPUT_POST, 'senha_dois', FILTER_DEFAULT);

	//Busca na tabela se tem algum linha com o email ja cadastrado
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	$query = "SELECT * FROM usuario WHERE email='$email'";
	$item = $conn->query($query)->fetchAll();
	
	//Definindo variavel id_usuario = null que vai receber valor posteriormente
	$id_usuario = null;
	
	//Conta a quantidade de linhas encontradas
	//Aqui nao funciona o mysqli_num_rows nao sei porque :(
	//Dai inventei essa kkkkk
	$row = 0;
	foreach ($item as $i){
		$row += 1;
    }
	
	//Se tiver 0 linhas, prossegue
	if ($row == 0) {
		//Prosseguido, verifica se a confirmação das senhas está correto
		if ($senha == $senha_dois) {
			//Insere o usuario
			$query_insert = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
			$cadastrar_usuario = $conn->prepare($query_insert);
			$cadastrar_usuario->bindParam(':nome', $nome);
			$cadastrar_usuario->bindParam(':email', $email);
			$cadastrar_usuario->bindParam(':senha', $senha);
			$cadastrar_usuario->execute();
			
			//Select do id_usuario, pois ele e gerado automaticante no banco
			$query_id = "SELECT * FROM usuario WHERE email='$email'";
			$id = $conn->query($query_id)->fetchAll();
			foreach ($id as $i){
				//Atribuindo valor a variavel 'id_usuario'
				$id_usuario = $i['id_usuario'];
			}
			
			//Comeca a sessao e define variaveis globais para serem usadas em outros arquivos
			//Redireciona a index ja logado
			session_start();
			$_SESSION['id_usuario'] = $id_usuario;
			$_SESSION['nome'] = $nome;
			$_SESSION['email'] = $email;
			$_SESSION['senha'] = $senha;
			header('location:index.php');
			
		}
		//Caso as senhas estiverem diferentes
		else {
			?>Senhas não correspondem<?php
		}
	}
	//Se ja estiver algum email cadastrado
	else {
		?>Email já cadastrado<?php
	}	
}

?>
