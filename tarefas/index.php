<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h1>Gerenciador de taferas</h1>
    <form>
        <fieldset>
            <legend>Nova tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome" />

            </label>
            <button type="submit">Gravar</button>
        </fieldset>        
        <?php
            if(array_key_exists('nome', $_GET)) {
                // echo "Nome tarefa informada: " . $_GET['nome'];
                $_SESSION['lista_tarefas'][]=$_GET['nome'];
                if (array_key_exists('lista_tarefas', $_SESSION)){
                    $lista_tarefas = $_SESSION['lista_tarefas'];
                }
            } else {
              $lista_tarefas = [];
          }
        ?>

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
    </form>
</body>
</html>
