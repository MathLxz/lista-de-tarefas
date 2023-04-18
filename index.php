<?php
//Incluindo arquivos de conexão com o banco e queries
include_once "php/connect.php";
include_once "php/queries.php";
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
  <!-- Section contendo o forumulário -->
  <section class="mt-5 mb-5" id="form-section">
    <form method="post" id="formulario" class="formulario" action="">
      <div class="row">
        <div class="col-12 mb-2" id="txt-task-div">
          <input type="text" name="tarefa" class="form-control" placeholder="Nova tarefa" id="txt-tarefa" />
        </div>
        <div class="col-12 mb-2" id="time-input">
          <input type="time" name="hora" class="form-control" />
        </div>
        <div class="col-12" id="btn-add">
          <button type="submit" class="btn btn-outline-light">Adicionar</button>
        </div>
      </div>
    </form>
  </section>
  <!-- Section contnedo a tabela com as tarefas -->
  <section id="task-section">
    <table class="table table-bordered border-primary table-dark align-middle" id="task-table">
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
</body>

</html>