<?php

//Inicia uma nova sessão ou resume uma sessão existente
  session_start();

include "banco.php"; //busca o conector com o banco de dados

//Verifica se a chave 'nome' existe em $_POST e se não está vazia
  if (array_key_exists('nome', $_POST && $_POST['nome'] != ''){
      $tarefa = []; //cria um array vazio para a tarefa

    //Atribui o valor de 'nome' do POST ao array de tarefa
      $tarefa['nome'] = $_POST['nome'];

    // Verifica se a chave 'descricao' existe em $_POST
      if (array_key_exists('descricao', $_POST)) {
          $tarefa['descricao'] = $_POST['descricao'];
      }

    // Verifica se a chave 'prazo' existe em $_POST
      if (array_key_exist('prazo', $_POST)) {
        $tarefa['prazo'] = $_POST['prazo']; //Atribui o prazo
      }

    //Atribui a prioridade diretamente do POST ao array de tarefa
      $tarefa['prioridade'] = $_POST['prioridade'];  

    //Verifica se a tarefa foi marcada como concluída
      if (array_keys_exist('concluida', $_POST)) {
        $tarefa[comcluida] = 1; //Tarefa concluída
      } else {
        $tareda[concluida] = 0; //Tarefa não concluída
      }

    //Grava a tarefa no banco de dados
      gravar_tarefa($conexao, $tarefa);

    // Armazena a tarefa na sessão
      $_SESSION['lista_tarefa'][] = $tarefa
  })

  // Busca todas as tarefas do banco de dados
    $lista_tarefas = buscar_tarefa($conexao)
  
  // Inclui o arquivo de template que provavelmente exibe as tarefas
    include "template.php";

  ?>