<?php
include("conexao.php");
include("banco/banco-xml.php");

$razaoSocial_emi = $emit_xNome;
$cnpj_emi= $emit_CNPJ;
$inscricaoEstadual_emi= $emit_IE;

if(insereEmitente($conexao, $razaoSocial_emi, $cnpj_emi, $inscricaoEstadual_emi)){
    $id_emitente=mysqli_insert_id($conexao);
}


$razaoSocial_dest = $dest_xNome;
$cnpj_dest = $dest_cnpj;
$inscricaoEstadual_dest = $dest_IE;


if(insereDestinatario($conexao, $razaoSocial_dest, $cnpj_dest, $inscricaoEstadual_dest)){
    $id_destinatario=mysqli_insert_id($conexao);
}

$numero_nfe = $nNF;
$chave = $chave;
$modelo = $mod;
$serie = $serie;
$naturezaOperacao = $natOp;
$dataEmissao = $dhEmi;

$total_nfe = $vNF;
$total_produto = $vtProd;
$total_ipi = $vtIPI;
$total_base = $vtBC;
$total_icms = $vtICMS;
$total_icms_st = $vtST;
$total_base_st = $vtBCST;
$total_frete = $vFrete;
$total_desconto = $vDesc;
$total_seguro = $vSeg;

if(insereNotafiscal($conexao, $numero_nfe, $chave, $modelo,$serie, $naturezaOperacao, $dataEmissao,
                    $total_nfe,$total_produto,$total_ipi,$total_base,$total_icms,$total_icms_st,$total_base_st,
                    $total_frete,$total_desconto,$total_seguro,$id_emitente,$id_destinatario)){
$id_nfe=mysqli_insert_id($conexao);
}

$produtos = array();
$count = 0;
foreach($vProd as $produto) {
    $aux = (object) array(
        'descricao' => $xProd[$count],
        'valor' => $vProd[$count],
        'pIcms' => $pICMS[$count],
        'base' => $bc_icms[$count],
        'ncm' => $NCM[$count],
        'icms' => $vlr_icms[$count],
        'cfop' => $CFOP[$count],
        'cst' => $CST[$count],
        'vlr_ipi' => $vlr_ipi[$count],
    );
    array_push($produtos, $aux);
    $count++;
    var_dump($produtos);
}


// foreach($produtos as $produto) {
//     insereProduto($conexao, $produto->descricao, $produto->valor, $produto->pIcms, $produto->base,
//     $produto->ncm, $produto->icms, $produto->cfop, $produto->cst, $produto->vlr_ipi,$id_nfe);
// }
