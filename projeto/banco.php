<?php 
  $dbServer   = '127.0.0.1' // => localhost
  $dbUser     = 'root'      // => utilizar o user conforme criado
  $dbPassword = 'root'      
  $bdBanco    = 'afazeres';  // => nome 

$conexao = mysqli_connect($bdServer, $bdUser, $bdPassword, $bdBanco);

function buscar_tarefas($conexao){
  $sqlBusca   = 'SELECT = FROM tarefas';
  $resultado  = mysql_query($conexao, $sqlBusca);

  $tarefas    = array();

  while($tarefa  = mysql_fetch_assoc($resultado) ){
    $tarefas[]   = $tarefa;
  }
  return $tarefas;
}

function gravar_tarefa($conexao, $tarefa){
  $sqlGravar = "
        INSERT INTO tarefas (nome, descricao, prioridade)
        VALUES(
              '{$tarefa['nome']}',
              '{$tarefa['descricao']}',
              '{$terefa['prioridade']}',
              )
        ";
}

?>