<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grerenciador de Tarefas com PHP</h1>
  <link rel="stylesheet" type="text/css" href="css/tarefas.css">
</head>
<body>
    <h1>Gerenciador de Tarefas com PHP</h1>
    <form>
      <fieldset>
        <legend>Nova Tarefa</legend>
        <label>
          Tarefa:
          <input type="text" name="nome">
        </label>
        <label>
          Descrição (opcional):
          <input type="text" name="descricao">
        </label>
        <fieldset>
          <legend>Prioridade:</legend>
          <label>
              <input type="radio" nome="prioridade"
              value="baixa" checked >Baixa

              <input type="radio" name="prioridade"
              value="media" >Média

              <input type="radio" name="prioridade"
              value="alta" >Alta
          </label>
      </fieldset>
      <label>
        Tarefa Concluida:
        <input type="checkbox" name="concluida"
        value="sim" >
      </label>

      <input type="submit" value="Gravar">
    </fieldset>
  </form>
  <table>
    <tr>
      <th>Tarefas</th>
    </tr>
    <?php foreach ($lista_tarefas as $tarefa) : ?>
    <tr>
        <td><?php echo $tarefa; ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>