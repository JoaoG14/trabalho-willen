<?php

  $dbhost = 'localhost';
  $dbName = 'clientes';
  $dbUsername = 'root';
  $dbPassword = '';
    
  $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
  
  if($conexao->connect_errno)
  {
    echo "Erro";
  }
  else
  {
    echo "Conexão efeutada com sucesso";
  }
?>