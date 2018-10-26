<?php
include("conexao.php");
include("banco/banco-usuario.php");

// Recupera os dados do usuario 
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE; 
// Recupera a senha
$senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : FALSE;
$nome = $_POST["nome"];

// Validando email usuário
$validacao_usuario = validaDadosUsuario($conexao,$email);
// 0 = passou na validação
// 1= email já existe
if($validacao_usuario > 0) {
    if($validacao_usuario === 1) {
        $alerta_msg = "Já existe um usuário cadastrado com este E-mail";
        $alerta_tipo = 3;
    }
    header("Location: index.php?alerta_msg=".($alerta_msg)."&alerta_tipo=".($alerta_tipo).""); 
}else {
    //Inserindo o usuario na tabela 'usuario'
    if(insereUsuario($conexao, $nome, $email, $senha)){
        $id_usuario = mysqli_insert_id($conexao);//Se o usuario for inserido, o ID dele é salvo
        echo "<script>window.location='index.php';alert('Cadastro Efetuado com Sucesso!');</script>";
    }else{ 
        $alerta_msg = $erro;
        $alerta_tipo = 3;
        header("Location: index.php?alerta_msg=".($alerta_msg)."&alerta_tipo=".($alerta_tipo).""); 
    }  
}

