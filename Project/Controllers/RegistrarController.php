<?php

namespace Project\Controllers;

class RegistrarController
{
  public function index()
  {
    if(isset($_POST['registrar'])){
      $nome_cadastro = $_POST['nome_cadastro'];
      $email_cadastro = $_POST['email_cadastro'];
      $senha_cadastro = $_POST['senha_cadastro'];
      
      if(!filter_var($email_cadastro,FILTER_VALIDATE_EMAIL)){
        \Project\Utilidades::alerta('E-mail inválido');
        \Project\Utilidades::redirect(INCLUDE_PATH.'registrar');
      }
    }
  }
}