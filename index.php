<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="lib/bootstrap/min/bootstrap.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>To-do List</title>
  </head>
  <body>
    <div class="container">
      <form action="#">
        <div class="inputs">
          <input
            type="text"
            id="tarefa"
            class="form-control"
            placeholder="Adicione uma nova tarefa"
          />
          <input type="time" id="time" class="form-control" />
          <button type="submit" class="btn btn-outline-light" id="add">
            Adicionar
          </button>
        </div>

        <div class="tarefas">
          <p>
            <strong>08:30</strong> - Tarefa X.
            <button type="submit" class="btn btn-outline-light">
              Concluir
            </button>
            <button type="submit" class="btn btn-outline-light">Excluir</button>
          </p>
          <p>
            <strong>08:30</strong> - Tarefa X.
            <button type="submit" class="btn btn-outline-light">
              Concluir
            </button>
            <button type="submit" class="btn btn-outline-light">Excluir</button>
          </p>
          <p>
            <strong>08:30</strong> - Tarefa X.
            <button type="submit" class="btn btn-outline-light">
              Concluir
            </button>
            <button type="submit" class="btn btn-outline-light">Excluir</button>
          </p>
          <p>
            <strong>08:30</strong> - Tarefa X.
            <button type="submit" class="btn btn-outline-light">
              Concluir
            </button>
            <button type="submit" class="btn btn-outline-light">Excluir</button>
          </p>
          <p>
            <strong>08:30</strong> - Tarefa X.
            <button type="submit" class="btn btn-outline-light">
              Concluir
            </button>
            <button type="submit" class="btn btn-outline-light">Excluir</button>
          </p>
          <p>
            <strong>08:30</strong> - Tarefa X.
            <button type="submit" class="btn btn-outline-light">
              Concluir
            </button>
            <button type="submit" class="btn btn-outline-light">Excluir</button>
          </p>
        </div>
      </form>
    </div>

    <script src="lib/bootstrap/min/bootstrap.min.js"></script>
  </body>
</html>
