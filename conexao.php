<?php 
    // Conecta-se com o MySQL 
    $conexao=mysqli_connect("localhost", "root", "", "escxml") or die;  
    mysqli_set_charset($conexao,'utf8');
    // print_r($conexao);
?>