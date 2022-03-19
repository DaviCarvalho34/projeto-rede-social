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
    $senha_cadastro = \Project\Bcrypt::hash($senha_cadastro);
    $registro = \Project\MySql::connect()->prepare("INSERT INTO usuarios VALUES(null,?,?,?)");
    $registro->execute(array($nome_cadastro,$email_cadastro,$senha_cadastro));

    \Project\Utilidades::alerta('Cadastrado com sucesso');
    \Project\Utilidades::redirect(INCLUDE_PATH.'registrar');
  }
}