<!-- Codigo da estrutura da tabela -->

<!-- CREATE TABLE `lista-de-tarefas`. (`id` INT NOT NULL AUTO_INCREMENT , 
`nome` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
`hora` TIME NOT NULL , 
`estado` VARCHAR(2) NOT NULL DEFAULT 'A' , 
PRIMARY KEY (`id`)) ENGINE = InnoDB; -->

<?php
//Configuração da conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "lista-de-tarefas";

try {
    $conn = new PDO("mysql:host=$host; dbname=" . $dbname, $user, $pass);
    return $conn;
} catch (PDOException $error) {
    echo "Não foi possível realizar a conexão com o banco de dados. Erro: " . $error->getMessage();
}
