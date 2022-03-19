<?php

namespace Project\Models;

class UsuariosModel
{

  public static function emailExists($email_cadastro)
  {
    $pdo = \Project\MySql::connect();
    $verificar = $pdo->prepare("SELECT email FROM usuarios WHERE email = ?");
    $verificar->execute(array($email_cadastro));

    if($verificar->rowCount() == 1){
      //Email existe
      return true;
    }else{
      return false;
    }
  }

  public static function registra()
  {
    $nome_cadastro = $_POST['nome_cadastro'];
    $email_cadastro = $_POST['email_cadastro'];
    $senha_cadastro = $_POST['senha_cadastro'];
    $senha_cadastro = \Project\Bcrypt::hash($senha_cadastro);
    $registro = \Project\MySql::connect()->prepare("INSERT INTO usuarios VALUES(null,?,?,?)");
    $registro->execute(array($nome_cadastro,$email_cadastro,$senha_cadastro));

    \Project\Utilidades::alerta('Cadastrado com sucesso');
    \Project\Utilidades::redirect(INCLUDE_PATH.'registrar');
  }
}