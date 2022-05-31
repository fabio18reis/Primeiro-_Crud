<?php

$servidor = "localhost";
$banco = "db_login";
$usuario = "root";
$senha = "";
$porta = "3306";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

if(!$conexao){
    die("A conexão falhou: " . mysqli_connect_error());
}
//echo " A sua conexão foi efetuada com sucesso!";
?> 
