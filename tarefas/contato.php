<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    <form method="GET">
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label>
                Nome:
                <input type="text" name="nome" value="<?php echo $_GET['nome'] ?? ''; ?>" required>
            </label><br><br>
            <label>
                Email:
                <input type="email" name="email" value="<?php echo $_GET['email'] ?? ''; ?>" required>
            </label><br><br>
            <!-- <label>
                WhatsApp:
                <input type="tel" name="whatsapp" value="<?php echo $_GET['whatsapp'] ?? ''; ?>" required>
            </label><br><br> -->
            <label>
                WhatsApp:
                <textarea type="tel" name="whatsapp" value="<?php echo $_GET['whatsapp'] ?? ''; ?>" required></textarea>
            </label><br><br>
            <button type="submit">Gravar</button>
        </fieldset>
    </form>

    <?php            
    if (array_key_exists('nome', $_GET)) {
        $novo_contato = array(
            'nome' => $_GET['nome'],
            'email' => $_GET['email'],
            'whatsapp' => $_GET['whatsapp']
        );

        if (!isset($_SESSION['lista_tarefas'])) {
            $_SESSION['lista_tarefas'] = array();
        }

        $_SESSION['lista_tarefas'][] = $novo_contato;
    }

    if (isset($_SESSION['lista_tarefas'])) {
        $lista_tarefas = $_SESSION['lista_tarefas'];
    }
    ?>

    

    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>WhatsApp</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa) : ?>
            <tr>
                <td><?php echo $tarefa['nome'] ?? ''; ?></td>
                <td><?php echo $tarefa['email'] ?? ''; ?></td>
                <td><?php echo $tarefa['whatsapp'] ?? ''; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
