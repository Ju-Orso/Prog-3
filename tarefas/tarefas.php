<?php

//Inicia o armazenamento dos dados em uma sessão
session_star();

if (array_key_exist('nome', $_GET) && $_GET['nome'] != ''){
  $tarefa = [
    'nome'          => $_Get['nome'],
    'descrição'     => '',
    'prazo'         => '',
    'prioridade'    => $_GET['prioridade'],
    'concluida'     => '',
  ];

//tarefa['nome'] = $_GET['nome'];

if (array_key_exist('descricao', $_GET)){
  $tarefa['descricao'] = $_GET['concluida'];
}


  $_SESSION['lista_tarefas'][] = $_GET['nome'];
}

if (array_key_exists('lista_tarefas', $_SESSION)){
  $lista_tarefas = $_SESSION['lista_tarefas'];
} else {
  $lista_tarefas = [];
}

include "template.php"

?>