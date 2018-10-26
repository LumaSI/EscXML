<?php include("conexao.php");?>
<?php include("banco/banco-xml.php");?>

<?php if(isset($_POST["selecaoNfe"]))
{
?>
<?php
ob_start();
$html=ob_get_clean();

$html.='
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet"  href="scss/estilo.css"  type="text/css">
    <title>Conferir NFe por XML</title>
    </head>
    <body>
    <center><h3>Dados Importados do XML</h3></center>';?>

    <?php 
    $nfes = [];
    foreach($_POST['selecaoNfe'] as $nota) {
        array_push($nfes, buscaNfes($conexao, $nota));
    }
    ?>


<?php //Tabela referente Cabeçalho notas fiscais?>

<?php foreach ($nfes as $nf) {  
    foreach($nf as $nfe) {?>
            <?php $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
                <tr class="cor0">
                <td  align="center" width="0%">GERAL</td>
                </tr>
            </table>
            <table width="100%" border="0" cellpadding="1" cellspacing="1">
                <tr class="header-fixa">
                    <td  align="center">Chave de Acesso da NFE</td>
                    <td  align="center">Natureza da Operacao</td>
                    <td  align="center">Numero Nota</td>
                    <td  align="center">Modelo</td>
                    <td  align="center">Serie</td>
                    <td  align="center">Data Emissao</td>
                </tr>
                    <tr class="cor1">
                    <td align="left" width="0%" class="cor1">'.$nfe['chave_acesso'].'</td>
                    <td align="center" width="0%" class="cor1">'.$nfe["natureza_operacao"].'</td>
                    <td align="center" width="0%" class="cor1">'.$nfe["numero_nfe"].'</td>
                    <td align="center" width="0%" class="cor1">'.$nfe["modelo"].'</td>
                    <td align="center" width="0%" class="cor1">'.$nfe["serie"].'</td>
                    <td align="center" width="0%" class="cor1">'.$nfe["data_emissao"].'</td>
                </tr>
            </table>';?>
    <?php }
}?>

    <?php //Tabela referente Dados do Emitente?>

     <?php $emitentes = buscaEmitentes($conexao);?>
         <?php foreach ($emitentes as $emitente) {?>
            <?php $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
                    <tr class="cor0">
                    <td  align="center" width="0%">DADOS DO FORNECEDOR</td>
                    </tr>
                </table>
            <table width="100%" border="0" cellpadding="1" cellspacing="1">
                    <tr class="header-fixa">
                        <td width="43%"  align="left">Nome / Razao Social</td>
                        <td width="37%"  align="left">CNPJ / CPF</td>
                        <td width="20%"  align="left">Inscricao Estadual</td>
                    </tr>
                <tr class="cor1">
                    <td align="left" width="0%" class="cor1">'.$emitente["razao_social"].'</td>
                    <td align="left" width="0%" class="cor1">'.$emitente["cnpj"].'</td>
                    <td align="left" width="0%" class="cor1">'.$emitente["inscricao_estadual"].'</td>
                </tr>
            </table>';?> 
        <?php
    }?>

    <?php //Tabela referente Dados do Destinatário?>

        <?php $destinatarios = buscaDestinatarios($conexao);
            foreach ($destinatarios as $destinatario) {?>
                <?php $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
                    <tr class="cor0">
                        <td  align="center" width="0%">DADOS DO DESTINATARIO</td>
                    </tr>
                </table>
                <table width="100%" border="0" cellpadding="1" cellspacing="1">
                    <tr class="header-fixa">
                        <td width="43%"  align="left">Nome / Razao Social</td>
                        <td width="37%"  align="left">CNPJ / CPF</td>
                        <td width="20%"  align="left">Inscricao Estadual</td>
                    </tr>
                    <tr class="cor1">
                        <td align="left" width="0%" class="cor1">'.$destinatario["razao_social"].'</td>
                        <td align="left" width="0%" class="cor1">'.$destinatario["cnpj"].'</td>
                        <td align="left" width="0%" class="cor1">'.$destinatario["inscricao_estadual"].'</td>
                    </tr>
                </table>';?> 
        <?php
    }?>


     <?php //Tabela referente totais Nfe?>

        <?php $nfes = buscaNfes($conexao);
            foreach ($nfes as $nfe) {
                $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
                    <tr class="cor100">
                        <td  align="center" width="0%">TOTAIS</td>
                    </tr>
                </table>
                <table width="100%" border="0" cellpadding="1" cellspacing="1">
                    <tr class="header-fixa">
                        <td  align="right">BC do ICMS</td>
                        <td  align="right">Valor do ICMS</td>
                        <td  align="right">BC ICMS ST</td>
                        <td  align="right">Valor do ICMS ST</td>
                        <td  align="right">Vl Total dos Produtos</td>
                    </tr>
                    <tr class="cor1">
                        <td align="right" width="0%" class="cor1">'.$nfe["total_base"].'</td>
                        <td align="right" width="0%" class="cor1">'.$nfe["total_icms"].'</td>
                        <td align="right" width="0%" class="cor1">'.$nfe["total_base_st"].'</td>
                        <td align="right" width="0%" class="cor1">'.$nfe["total_icms_st"].'</td>
                        <td align="right" width="0%" class="cor1">'.$nfe["total_produto"].'</td>
                     </tr>
                </table>';?>
                <?php $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
                    <tr class="header-fixa">
                        <td  align="right">Valor do Frete</td>
                        <td  align="right">Valor do Seguro</td>
                        <td  align="right">Desconto</td>
                        <td  align="right">Vl Total do IPI</td>
                        <td  align="right">Vl Total da Nota</td>
                    </tr>
                    <tr class="cor1">
                        <td align="right" width="0%" class="cor1">'.$nfe["total_frete"].'</td>
                        <td align="right" width="0%" class="cor1">'.$nfe["total_seguro"].'</td>
                        <td align="right" width="0%" class="cor1">'.$nfe["total_desconto"].'</td>
                        <td align="right" width="0%" class="cor1">'.$nfe["total_ipi"].'</td>
                        <td align="right" width="0%" class="cor1">'.$nfe["total_nfe"].'</td>
                    </tr>
                </table>';?>
    <?php
}?>

    <?php //Tabela Itens?>

    <?php $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
                        <tr class="cor100">
                            <td  align="center" width="100%">Itens da NFe </td>
                        </tr>
                    </table>
                    <table width="100%" border="0" cellpadding="1" cellspacing="1">
                        <tr class="header-fixa" >
                            <td class="cor1">Seq</td>
                            <td class="cor1">Descri&ccedil;&atilde;o dos produto(s)/Servi&ccedil;o(s)</td>
                            <td class="cor1">NCM</td>
                            <td class="cor1">CST</td>
                            <td class="cor1">CFOP</td>
                            <td class="cor1">% ICMS</td>
                            <td class="cor1">Vlr Prod</td>
                            <td class="cor1">BC ICMS</td>
                            <td class="cor1">Vlr ICMS</td>
                            <td class="cor1" >Vlr IPI</td>
                        </tr>
                    </table>';?>

    <?php $produtos = agrupaProduto($conexao);
        $subTotalProd = 0;
        $subTotalBase = 0;
        $subTotalIcms = 0;
        $subTotalIpi = 0;?>

        <?php foreach ($produtos as $produto){?> 

        <?php if($produto["cst"]==0 && $produto["percentual_icms"]==18){
                $subTotalProd += (double) str_replace(",", ".", $produto["vlr_produto"]);
                $subTotalBase += (double) str_replace(",", ".", $produto["vlr_base"]);
                $subTotalIcms += (double) str_replace(",", ".", $produto["vlr_icms"]);
                $subTotalIpi += (double) str_replace(",", ".",  $produto["vlr_ipi"]);?>

        <?php $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
            <tr class="header-fixa">
                <td class="cor1">'.$produto["id_produto"].'</td>
                <td class="cor1">'.$produto["descricao"].'</td>
                <td class="cor1">'.$produto["ncm"].'</td>
                <td class="cor1">'.$produto["cst"].'</td>
                <td class="cor1">'.$produto["cfop"].'</td>
                <td class="cor1">'.$produto["percentual_icms"].'</td>
                <td class="cor1">'.$produto["vlr_produto"].'</td>
                <td class="cor1">'.$produto["vlr_base"].'</td>
                <td class="cor1">'.$produto["vlr_icms"].'</td>
                <td class="cor1">'.$produto["vlr_ipi"].'</td>
            </tr>
        </table>';?>        
        <?php }  
    }?>

    <?php if($produto["cst"]==0 && $produto["percentual_icms"]==18){
            mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi);
    }?>

<?php foreach ($produtos as $produto){?> 

        <?php if($produto["cst"]==0 && $produto["percentual_icms"]==7){
                $subTotalProd += (double) str_replace(",", ".", $produto["vlr_produto"]);
                $subTotalBase += (double) str_replace(",", ".", $produto["vlr_base"]);
                $subTotalIcms += (double) str_replace(",", ".", $produto["vlr_icms"]);
                $subTotalIpi += (double) str_replace(",", ".",  $produto["vlr_ipi"]);?>

        <?php $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
            <tr class="header-fixa">
                <td class="cor1">'.$produto["id_produto"].'</td>
                <td class="cor1">'.$produto["descricao"].'</td>
                <td class="cor1">'.$produto["ncm"].'</td>
                <td class="cor1">'.$produto["cst"].'</td>
                <td class="cor1">'.$produto["cfop"].'</td>
                <td class="cor1">'.$produto["percentual_icms"].'</td>
                <td class="cor1">'.$produto["vlr_produto"].'</td>
                <td class="cor1">'.$produto["vlr_base"].'</td>
                <td class="cor1">'.$produto["vlr_icms"].'</td>
                <td class="cor1">'.$produto["vlr_ipi"].'</td>
            </tr>
        </table>';?>        
        <?php }  
    }?>

    <?php if($produto["cst"]==0 && $produto["percentual_icms"]==7){
            mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi);
    }?>


    <?php foreach ($produtos as $produto){?> 

        <?php if($produto["cst"]==0 && $produto["percentual_icms"]==12){
                $subTotalProd += (double) str_replace(",", ".", $produto["vlr_produto"]);
                $subTotalBase += (double) str_replace(",", ".", $produto["vlr_base"]);
                $subTotalIcms += (double) str_replace(",", ".", $produto["vlr_icms"]);
                $subTotalIpi += (double) str_replace(",", ".",  $produto["vlr_ipi"]);?>

        <?php $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
            <tr class="header-fixa">
                <td class="cor1">'.$produto["id_produto"].'</td>
                <td class="cor1">'.$produto["descricao"].'</td>
                <td class="cor1">'.$produto["ncm"].'</td>
                <td class="cor1">'.$produto["cst"].'</td>
                <td class="cor1">'.$produto["cfop"].'</td>
                <td class="cor1">'.$produto["percentual_icms"].'</td>
                <td class="cor1">'.$produto["vlr_produto"].'</td>
                <td class="cor1">'.$produto["vlr_base"].'</td>
                <td class="cor1">'.$produto["vlr_icms"].'</td>
                <td class="cor1">'.$produto["vlr_ipi"].'</td>
            </tr>
        </table>';?>        
        <?php }  
    }?>

    <?php if($produto["cst"]==0 && $produto["percentual_icms"]==12){
            mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi);
    }?>


    <?php foreach ($produtos as $produto){?> 

        <?php if($produto["cst"]==60 && $produto["percentual_icms"]==0){
                $subTotalProd += (double) str_replace(",", ".", $produto["vlr_produto"]);
                $subTotalBase += (double) str_replace(",", ".", $produto["vlr_base"]);
                $subTotalIcms += (double) str_replace(",", ".", $produto["vlr_icms"]);
                $subTotalIpi += (double) str_replace(",", ".",  $produto["vlr_ipi"]);?>

        <?php $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
            <tr class="header-fixa">
                <td class="cor1">'.$produto["id_produto"].'</td>
                <td class="cor1">'.$produto["descricao"].'</td>
                <td class="cor1">'.$produto["ncm"].'</td>
                <td class="cor1">'.$produto["cst"].'</td>
                <td class="cor1">'.$produto["cfop"].'</td>
                <td class="cor1">'.$produto["percentual_icms"].'</td>
                <td class="cor1">'.$produto["vlr_produto"].'</td>
                <td class="cor1">'.$produto["vlr_base"].'</td>
                <td class="cor1">'.$produto["vlr_icms"].'</td>
                <td class="cor1">'.$produto["vlr_ipi"].'</td>
            </tr>
        </table>';?>        
        <?php }  
    }?>
        <?php if($produto["cst"]==60 && $produto["percentual_icms"]==0){
           mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi);
        }?>

    <?php foreach ($produtos as $produto){?> 

        <?php if($produto["cst"]==40 && $produto["percentual_icms"]==0){
                $subTotalProd += (double) str_replace(",", ".", $produto["vlr_produto"]);
                $subTotalBase += (double) str_replace(",", ".", $produto["vlr_base"]);
                $subTotalIcms += (double) str_replace(",", ".", $produto["vlr_icms"]);
                $subTotalIpi += (double) str_replace(",", ".",  $produto["vlr_ipi"]);?>

        <?php $html.='<table width="100%" border="0" cellpadding="1" cellspacing="1">
            <tr class="header-fixa">
                <td class="cor1">'.$produto["id_produto"].'</td>
                <td class="cor1">'.$produto["descricao"].'</td>
                <td class="cor1">'.$produto["ncm"].'</td>
                <td class="cor1">'.$produto["cst"].'</td>
                <td class="cor1">'.$produto["cfop"].'</td>
                <td class="cor1">'.$produto["percentual_icms"].'</td>
                <td class="cor1">'.$produto["vlr_produto"].'</td>
                <td class="cor1">'.$produto["vlr_base"].'</td>
                <td class="cor1">'.$produto["vlr_icms"].'</td>
                <td class="cor1">'.$produto["vlr_ipi"].'</td>
            </tr>
        </table>';?>        
        <?php }  
    }?>

        <?php if($produto["cst"]==40 && $produto["percentual_icms"]==0){
                mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi);
        }?>

<?php include("mpdf60/mpdf.php");
$mpdf = new mPDF();
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = 'UTF-8';
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output('meu-pdf','I');
exit();?>


<?php
} else{
    echo "<script>window.location='grid-nfe.php';alert('Nenhuma Nota Selecionada!');</script>";
}
?>
          
<?php function mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi) {?>
    <tr class="header-fixa">
        <th colspan="6">SUBTOTAL</th>
        <th><?=number_format((double) $subTotalProd, 2, ",", ".")?></th>
        <th><?=number_format((double) $subTotalBase, 2, ",", ".")?></th>
        <th><?=number_format((double) $subTotalIcms, 2, ",", ".")?></th>
        <th><?=number_format((double) $subTotalIpi, 2, ",", ".")?></th>
    </tr>
<?php }?>



