<?php

include("conexao.php");
include("banco/banco-usuario.php");

// Inicia sessões 
session_start(); 

// Recupera o email 
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE; 
// Recupera a senha
$senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : FALSE; 

// Usuário não forneceu a senha ou o email 
if(!$email || !$senha) 
{ 
    echo "Você deve digitar sua senha e email!"; 
    exit; 
} 

$resultado = buscaUsuario($conexao, $email, $senha);

// Caso o usuário tenha digitado um login válido o número de linhas será 1.. 
if($resultado) 
{ 
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
    $dados = @mysqli_fetch_array($resultado); 

    // Agora verifica a senha 
    if(!strcmp($senha, $dados["senha"])) 
    { 
        $_SESSION["id_usuario"]= $dados["id"]; 
        $_SESSION["nome_usuario"] = stripslashes($dados["nome"]); 
        header("Location: home.php"); 
        exit; 
    } 
    // Senha inválida 
    else 
    { 
        echo "<script>window.location='index.php';alert('Login ou Senha Inválidos');</script>";
        exit; 
    }
} 