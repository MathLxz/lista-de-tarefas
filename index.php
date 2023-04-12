<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="lib/bootstrap/min/bootstrap.min.css" />
  <link rel="stylesheet" href="styles.css" />
  <script defer src="lib/bootstrap/min/bootstrap.min.js"></script>
  <title>To-do List</title>
</head>

<body>
  <!-- Section contendo o forumulário -->
  <section class="mt-5 mb-5" id="form-section">
    <form action="" id="formulario" class="formulario">
      <div class="row">
        <div class="col-12 mb-2" id="txt-task-div">
          <input type="text" class="form-control" placeholder="Nova tarefa" id="txt-tarefa" />
        </div>
        <div class="col-12 mb-2" id="time-input">
          <input type="time" class="form-control" />
        </div>
        <div class="col-12" id="btn-add">
          <button type="submit" class="btn btn-outline-light">Adicionar</button>
        </div>
      </div>
    </form>
  </section>
  <!-- Section contnedo a tabela com as tarefas -->
  <section id="task-section">
    <table class="table table-striped table-bordered border-primary table-hover table-dark align-middle" id="task-table">
      <tbody>
        <tr>
          <td class="txt-td"><strong>09:00</strong> - Levar o cachorro para passear</td>
          <td>
            <button type="submit" class="btn btn-outline-light mb-2">
              Concluir
            </button>
            <button type="submit" class="btn btn-outline-light">Excluir</button>
          </td>
        </tr>
        <tr>
          <td class="td-txt">
            <strong>10:00</strong> - Estudar para a prova de análise orientada
            a objeto
          </td>
          <td class="td-btn">
            <button type="submit" class="btn btn-outline-light mb-2">
              Concluir
            </button>
            <button type="submit" class="btn btn-outline-light">Excluir</button>
          </td>
        </tr>
        <tr>
          <td>
            <strong>11:00</strong> - Ajustar o layout do projeto de seminário
          </td>
          <td>
            <button type="submit" class="btn btn-outline-light mb-2">
              Concluir
            </button>
            <button type="submit" class="btn btn-outline-light">Excluir</button>
          </td>
        </tr>
        <tr>
          <td>
            <strong>11:30</strong> - Ajustar a responsividade do projeto de
            seminário
          </td>
          <td>
            <button type="submit" class="btn btn-outline-light mb-2">
              Concluir
            </button>
            <button type="submit" class="btn btn-outline-light">Excluir</button>
          </td>
        </tr>
      </tbody>
    </table>
  </section>


</body>

</html>