<?php
if (isset($_POST['email'], $_POST['senha'])){
	//session_start();
    $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

	//Busca o usuario na tabela
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	$query = "SELECT * FROM usuario WHERE email='$email' and senha='$senha'";
	$usuario = $conn->query($query)->fetchAll();
	
	//Definindo variaveis (id_usuario, nome) = null que irao receber valores posteriormente
	$id_usuario = null;
	$nome = null;
	
	//Conta a quantidade de linhas encontradas
	//Aqui nao funciona o mysqli_num_rows nao sei porque :(
	//Dai inventei essa kkkkk
	$row = 0;
	foreach ($usuario as $i){
		$row += 1;
		$id_usuario = $i['id_usuario'];
		$nome = $i['nome'];
    }
	
	//Se tiver 1 conta, sera logado e redirecionado a index
	if($row == 1 ) {
		//Comeca a sessao e define variaveis globais para serem usadas em outros arquivos
		session_start();
		$_SESSION['id_usuario'] = $id_usuario;
		$_SESSION['nome'] = $nome;
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		//Redireciona a index ja logado
		header('location:index.php');
	}
	//Se nao, desfaz as variaveis
	else{
		unset ($_SESSION['email']);
		unset ($_SESSION['senha']);
		?>Usuario não encontrado :(<?php
	}
}

?>
