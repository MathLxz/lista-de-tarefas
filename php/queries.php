<?php
//Insert das tarefas no banco de dados
if (isset($_POST['tarefa'])) {
    $tarefa = filter_input(INPUT_POST, 'tarefa', FILTER_DEFAULT);
    $hora = filter_input(INPUT_POST, 'hora', FILTER_DEFAULT);
    $query = "INSERT INTO tarefas (nome_tarefa, hora_tarefa) VALUES (:nome_tarefa, :hora_tarefa)";
    $insere_tarefa = $conn->prepare($query);
    $insere_tarefa->bindParam(':nome_tarefa', $tarefa);
    $insere_tarefa->bindParam(':hora_tarefa', $hora);
    $insere_tarefa->execute();
}
?>

<?php
//Select das tarefas para exibição 
$query = "SELECT * FROM tarefas";
$tarefa = $conn->query($query)->fetchAll();
?>

<?php
//Delete das tarefas
if (isset($_GET['excluir'])) {
    $id = filter_input(INPUT_GET, 'excluir', FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM tarefas WHERE id=:id";
    $delete_tarefa = $conn->prepare($query);
    $delete_tarefa->bindParam('id', $id);
    $delete_tarefa->execute();

    header('Location: http://localhost/lista-de-tarefas/index.php');
}
?>

<?php
//Update das tarefas
if (isset($_GET['concluir'])) {
    $id = filter_input(INPUT_GET, 'concluir', FILTER_SANITIZE_NUMBER_INT);
    $query = "UPDATE tarefas SET estado_tarefa='C' WHERE id=:id";
    $update_tarefa = $conn->prepare($query);
    $update_tarefa->bindParam('id', $id);
    $update_tarefa->execute();

    header('Location: http://localhost/lista-de-tarefas/index.php');
}
?>