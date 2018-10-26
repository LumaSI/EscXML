<?php
include("conexao.php");
include("banco/banco-empresa.php");

 
$razaoSocial = $_POST["razaoSocial"];
$inscricaoEstadual = $_POST["inscricaoEstadual"];
$cnpj = $_POST["cnpj"];
$tributacao = $_POST["regime-tributario"];
// $fk_id_usuario = $_SESSION["id_usuario"];

// echo($fk_id_usuario);

if(insereEmpresa($conexao, $razaoSocial, $inscricaoEstadual, $cnpj, $tributacao)){
    $id_empresa = mysqli_insert_id($conexao);//Se a empresa for inserida, o ID dela é salvo
    echo "<script>window.location='form-cadastrar-empresa.php';alert('Cadastro Efetuado com Sucesso!');</script>";
}else{ 
    echo "<script>window.location='form-cadastrar-empresa.php';alert('Não foi possível cadastrar!');</script>";
}  
