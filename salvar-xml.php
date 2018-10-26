<?php
  //Primeiro Envio o XML para o Servidor
  $arquivoXML = $_FILES["xml_nfe"];
  $chave = preg_replace("/[^0-9]/", "", $arquivoXML["name"]);
  $DestinoXML = 'arquivos/' . $chave . '.xml';

  if (move_uploaded_file($arquivoXML["tmp_name"], $DestinoXML)){ 
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Entrada de NFe por XML</title>
</head>

<body>
<center><h3>Dados Importados do XML</h3></center>
<form name="form1" method="post" action="salvarBanco.php">
  <?php  
	if ($chave)
	{
		if ($chave == '')
		{
			echo "<h4>Informe a chave de acesso!</h4>";
			exit;	
		}	
		$arquivo = "arquivos/".$chave.".xml";	
		if (file_exists($arquivo)) 
		{
			 $arquivo = $arquivo;
			$xml = simplexml_load_file($arquivo);
			// imprime os atributos do objeto criado
			
			if (empty($xml->protNFe->infProt->nProt))
			{
				echo "<h4>Arquivo sem dados de autorização!</h4>";
				exit;	
			}
				$chave = $xml->NFe->infNFe->attributes()->Id;
				$chave = strtr(strtoupper($chave), array("NFE" => NULL));
//===============================================================================================================================================		
//<ide>
	@$cUF = $xml->NFe->infNFe->ide->cUF;    		 // Código do Estado do Fator gerador
    @$cNF = $xml->NFe->infNFe->ide->cNF;       	    //Código número da nfe
    @$natOp = $xml->NFe->infNFe->ide->natOp;        //Resumo da Natureza de operação
    @$indPag = $xml->NFe->infNFe->ide->indPag;      //0 – pagamento à vista; 1 – pagamento à prazo; 2 - outros
    @$mod = $xml->NFe->infNFe->ide->mod;            //Modelo do documento Fiscal
    @$serie = $xml->NFe->infNFe->ide->serie;    	//Série da documento Fiscal
	@$nNF =  $xml->NFe->infNFe->ide->nNF;   	    //Número da Nota Fiscal
	@$dhEmi = $xml->NFe->infNFe->ide->dhEmi;        //Data de emissão da Nota Fiscal
	@$dSaiEnt = $xml->NFe->infNFe->ide->dSaiEnt;    //Data de entrada ou saida da Nota Fiscal
    @$dSaiEnt = explode('-', $dSaiEnt);
	@$dSaiEnt = $dSaiEnt[2]."/".$dSaiEnt[1]."/".$dSaiEnt[0];
	@$tpNF = $xml->NFe->infNFe->ide->tpNF;         //0-entrada / 1-saída Tipo
    @$cMunFG = $xml->NFe->infNFe->ide->cMunFG;     //Código do municipio Tabela do IBGE
	@$tpImp = $xml->NFe->infNFe->ide->tpImp;       //<tpImp>1</tpImp> 
	@$tpEmis = $xml->NFe->infNFe->ide->tpEmis;     //<tpEmis>1</tpEmis>
	@$cDV = $xml->NFe->infNFe->ide->cDV;           //<cDV>0</cDV>
	@$tpAmb = $xml->NFe->infNFe->ide->tpAmb;       //<tpAmb>1</tpAmb>
	if ($tpAmb != 1)
	{
		echo "<h4>Documento emitido em ambiente de homologação!</h4>";
		exit;	
	}
	$finNFe = $xml->NFe->infNFe->ide->finNFe;     //<finNFe>1</finNFe>
	$procEmi = $xml->NFe->infNFe->ide->procEmi;   //<procEmi>0</procEmi>
	$verProc = $xml->NFe->infNFe->ide->verProc;   //<verProc>2.0.0</verProc>
//</ide>
	$xMotivo = $xml->protNFe->infProt->xMotivo;	
	$nProt = $xml->protNFe->infProt->nProt;
?>
  <?php
//===============================================================================================================================================	
// <emit> Emitente
	$emit_CPF = $xml->NFe->infNFe->emit->CPF;
	$emit_CNPJ = $xml->NFe->infNFe->emit->CNPJ;  				
	$emit_xNome = $xml->NFe->infNFe->emit->xNome; 				
	$emit_xFant = $xml->NFe->infNFe->emit->xFant;     			
//<enderEmit>
	$emit_xLgr = $xml->NFe->infNFe->emit->enderEmit->xLgr;		
	$emit_nro= $xml->NFe->infNFe->emit->enderEmit->nro; 			
	$emit_xBairro = $xml->NFe->infNFe->emit->enderEmit->xBairro;
	$emit_cMun = $xml->NFe->infNFe->emit->enderEmit->cMun; 		
	$emit_xMun = $xml->NFe->infNFe->emit->enderEmit->xMun; 		
	$emit_UF = $xml->NFe->infNFe->emit->enderEmit->UF; 			
	$emit_CEP = $xml->NFe->infNFe->emit->enderEmit->CEP; 		
	$emit_cPais = $xml->NFe->infNFe->emit->enderEmit->cPais; 	
	$emit_xPais = $xml->NFe->infNFe->emit->enderEmit->xPais; 	
	$emit_fone = $xml->NFe->infNFe->emit->enderEmit->fone; 		
//</enderEmit>
	$emit_IE = $xml->NFe->infNFe->emit->IE; 				 
	$emit_IM = $xml->NFe->infNFe->emit->IM; 				  
	$emit_CNAE = $xml->NFe->infNFe->emit->CNAE; 			 
	$emit_CRT = $xml->NFe->infNFe->emit->CRT; 
//</emit>
?>
  <?php
//===============================================================================================================================================		
//<dest> Destinatario
    $dest_cnpj =  $xml->NFe->infNFe->dest->CNPJ;       		       
	  $dest_xNome = $xml->NFe->infNFe->dest->xNome;       		      

//***********************************************************************************************************************************************	
		
//<enderDest>
    $dest_xLgr = $xml->NFe->infNFe->dest->enderDest->xLgr;            
    $dest_nro =  $xml->NFe->infNFe->dest->enderDest->nro;     		  
    $dest_xBairro = $xml->NFe->infNFe->dest->enderDest->xBairro;     
    $dest_cMun = $xml->NFe->infNFe->dest->enderDest->cMun;            
	  $dest_xMun = $xml->NFe->infNFe->dest->enderDest->xMun;           
	  $dest_UF = $xml->NFe->infNFe->dest->enderDest->UF;                
    $dest_CEP = $xml->NFe->infNFe->dest->enderDest->CEP;            
  	$dest_cPais = $xml->NFe->infNFe->dest->enderDest->cPais;          
  	$dest_xPais = $xml->NFe->infNFe->dest->enderDest->xPais;          
//</enderDest>
	  $dest_IE = $xml->NFe->infNFe->dest->IE;                           
//</dest>
//===============================================================================================================================================			
//Totais
	
    $vtBC = $xml->NFe->infNFe->total->ICMSTot->vBC;
    $vtICMS = $xml->NFe->infNFe->total->ICMSTot->vICMS;
    $vtBCST = $xml->NFe->infNFe->total->ICMSTot->vBCST;
    $vtST = $xml->NFe->infNFe->total->ICMSTot->vST;
    $vtProd = $xml->NFe->infNFe->total->ICMSTot->vProd;
    $vNF = $xml->NFe->infNFe->total->ICMSTot->vNF;
    $vFrete = $xml->NFe->infNFe->total->ICMSTot->vFrete;
    $vSeg = $xml->NFe->infNFe->total->ICMSTot->vSe;
    $vDesc = $xml->NFe->infNFe->total->ICMSTot->vDesc;
    $vtIPI = $xml->NFe->infNFe->total->ICMSTot->vIPI;
?>
  <?php
//===============================================================================================================================================			
//Dados dos itens
?>
    <?php
	$seq = 0;
	foreach($xml->NFe->infNFe->det as $item) 
	{
		$seq++;
		$codigo = $item->prod->cProd;
		$xProd = $item->prod->xProd;
		$NCM = $item->prod->NCM;
		$CFOP = $item->prod->CFOP;
		$uCom = $item->prod->uCom;
		$qCom = $item->prod->qCom;
		$vUnCom = $item->prod->vUnCom;
		$vProd = $item->prod->vProd;
		$vBC_item = $item->imposto->ICMS->ICMS00->vBC;
		$icms00 = $item->imposto->ICMS->ICMS00;
		$icms10 = $item->imposto->ICMS->ICMS10;
		$icms20 = $item->imposto->ICMS->ICMS20;
		$icms30 = $item->imposto->ICMS->ICMS30;
		$icms40 = $item->imposto->ICMS->ICMS40;
		$icms50 = $item->imposto->ICMS->ICMS50;
		$icms51 = $item->imposto->ICMS->ICMS51;
		$icms60 = $item->imposto->ICMS->ICMS60;
		$ICMSSN102 = $item->imposto->ICMS->ICMSSN102; 
		if(!empty($ICMSSN102)) 
			{
				$bc_icms = "0.00";	
				$pICMS = "0	";
				$vlr_icms = "0.00";
			}		
		
		
		if (!empty($icms00))
		{
			$bc_icms = $item->imposto->ICMS->ICMS00->vBC;
			$pICMS = $item->imposto->ICMS->ICMS00->pICMS;
			$CST = $item->imposto->ICMS->ICMS00->CST;
			$pICMS = round($pICMS,0);
			$vlr_icms = $item->imposto->ICMS->ICMS00->vICMS;
		}
		if (!empty($icms20))
		{
			$bc_icms = $item->imposto->ICMS->ICMS20->vBC;
			$pICMS = $item->imposto->ICMS->ICMS20->pICMS;
			$CST = $item->imposto->ICMS->ICMS20->CST;
			$pICMS = round($pICMS,0);
			$vlr_icms = $item->imposto->ICMS->ICMS20->vICMS;
		}
			if(!empty($icms30)) 
			{
				$pICMS = $item->imposto->ICMS->ICMS30->pICMS;
				$CST = $item->imposto->ICMS->ICMS30->CST;
				$bc_icms = "0.00";	
				$pICMS = "0	";
				$vlr_icms = "0.00";
			}
			if(!empty($icms40)) 
			{
				$pICMS = $item->imposto->ICMS->ICMS40->pICMS;
				$CST = $item->imposto->ICMS->ICMS40->CST;
				$bc_icms = "0.00";	
				$pICMS = "0	";
				$vlr_icms = "0.00";
			}
			if(!empty($icms50)) 
			{
				$pICMS = $item->imposto->ICMS->ICMS50->pICMS;
				$CST = $item->imposto->ICMS->ICMS50->CST;
				$bc_icms = "0.00";	
				$pICMS = "0	";
				$vlr_icms = "0.00";
			}
			if(!empty($icms51)) 
			{
				$bc_icms = $item->imposto->ICMS->ICMS51->vBC;
				$pICMS = $item->imposto->ICMS->ICMS51->pICMS;
				$CST = $item->imposto->ICMS->ICMS51->CST;
				$pICMS = round($pICMS,0);
				$vlr_icms = $item->imposto->ICMS->ICMS51->vICMS;
			}
		if(!empty($icms60)) 
		{
			$pICMS = $item->imposto->ICMS->ICMS60->pICMS;
			$CST = $item->imposto->ICMS->ICMS60->CST;
			$bc_icms = "0.00";	
			$pICMS = "0";
			$vlr_icms = "0.00";
		}
		$IPITrib = $item->imposto->IPI->IPITrib;
		if (!empty($IPITrib))
		{
			$bc_ipi =$item->imposto->IPI->IPITrib->vBC;
			$perc_ipi =  $item->imposto->IPI->IPITrib->pIPI;
			$perc_ipi = round($perc_ipi,0);
			$vlr_ipi = $item->imposto->IPI->IPITrib->vIPI;
		}
		$IPINT = $item->imposto->IPI->IPINT;
		{
			$bc_ipi = "0.00";
			$perc_ipi =  "0";
			$vlr_ipi = "0.00";
		}

		echo "<pre>";
		var_dump($item);
	}
	
?>
<?php
//     $seq = 0;
//     $array = array();
//     foreach($xml->NFe->infNFe->det as $item) 
//     {
//         echo "<pre>";
//         if(empty(current($item->imposto->ICMS)->pICMS)) {
//             current($item->imposto->ICMS)->pICMS = 0;
//         }
// 		array_push($array, $item);
//     }

// 	foreach($array as $item) 
// 	{     
// 		$seq++;
// 		$codigo = $item->prod->cProd;
// 		$xProd = $item->prod->xProd;
// 		$NCM = $item->prod->NCM;
// 		$CFOP = $item->prod->CFOP;
// 		$uCom = $item->prod->uCom;
// 		$qCom = $item->prod->qCom;
// 		$vUnCom = $item->prod->vUnCom;
// 		$vProd = $item->prod->vProd;
// 		$vBC_item = $item->imposto->ICMS->ICMS00->vBC;
// 		$icms00 = $item->imposto->ICMS->ICMS00;
// 		$icms10 = $item->imposto->ICMS->ICMS10;
// 		$icms20 = $item->imposto->ICMS->ICMS20;
// 		$icms30 = $item->imposto->ICMS->ICMS30;
// 		$icms40 = $item->imposto->ICMS->ICMS40;
// 		$icms50 = $item->imposto->ICMS->ICMS50;
// 		$icms51 = $item->imposto->ICMS->ICMS51;
// 		$icms60 = $item->imposto->ICMS->ICMS60;
// 		$ICMSSN102 = $item->imposto->ICMS->ICMSSN102; 
// 		$vlr_icms = "0.00";
		
// 		if(!empty($ICMSSN102)) 
// 			{
// 				$bc_icms = "0.00";	
// 				$pICMS = "0	";
// 				$vlr_icms = "0.00";
// 			}		
		
		
// 		if (!empty($icms00))
// 		{
// 			$bc_icms = $item->imposto->ICMS->ICMS00->vBC;
//       $pICMS = $item->imposto->ICMS->ICMS00->pICMS;
//       $CST = $item->imposto->ICMS->ICMS00->CST;
// 			$pICMS = round($pICMS,0);
// 			$vlr_icms = $item->imposto->ICMS->ICMS00->vICMS;
// 		}
// 		if (!empty($icms20))
// 		{
//       $CST = $item->imposto->ICMS->ICMS20->CST;
// 			$bc_icms = $item->imposto->ICMS->ICMS20->vBC;
//       $pICMS = $item->imposto->ICMS->ICMS20->pICMS;
//       $CST = $item->imposto->ICMS->ICMS00->CST;
// 			$pICMS = round($pICMS,0);
// 			$vlr_icms = $item->imposto->ICMS->ICMS20->vICMS;
// 		}
// 			if(!empty($icms30)) 
// 			{
// 				$bc_icms = "0.00";	
// 				$pICMS = "0	";
// 				$vlr_icms = "0.00";
// 			}
// 			if(!empty($icms40)) 
// 			{
//         $CST = $item->imposto->ICMS->ICMS40->CST;
// 				$bc_icms = "0.00";	
// 				$pICMS = "0	";
// 				$vlr_icms = "0.00";
// 			}
// 			if(!empty($icms50)) 
// 			{
// 				$bc_icms = "0.00";	
// 				$pICMS = "0	";
// 				$vlr_icms = "0.00";
// 			}
// 			if(!empty($icms51)) 
// 			{
//         $CST = $item->imposto->ICMS->ICMS51->CST;
// 				$bc_icms = $item->imposto->ICMS->ICMS51->vBC;
// 				$pICMS = $item->imposto->ICMS->ICMS51->pICMS;
// 				$pICMS = round($pICMS,0);
// 				$vlr_icms = $item->imposto->ICMS->ICMS51->vICMS;
// 			}
// 		if(!empty($icms60)) 
// 		{
//       $CST = $item->imposto->ICMS->ICMS60->CST;
// 			$bc_icms = "0,00";	
// 			$pICMS = "0	";
// 			$vlr_icms = "0,00";
// 		}
// 		$IPITrib = $item->imposto->IPI->IPITrib;
// 		if (!empty($IPITrib))
// 		{
// 			$bc_ipi =$item->imposto->IPI->IPITrib->vBC;
// 			$perc_ipi =  $item->imposto->IPI->IPITrib->pIPI;
// 			$perc_ipi = round($perc_ipi,0);
// 			$vlr_ipi = $item->imposto->IPI->IPITrib->vIPI;
// 		}
// 		$IPINT = $item->imposto->IPI->IPINT;
// 		{
// 			$bc_ipi = "0,00";
// 			$perc_ipi =  "0";
// 			$vlr_ipi = "0,00";
// 		}	
// 	?>
 <?php
// }

// var_dump($item); ?>
    
  <?php
//===============================================================================================================================================			
//Autorização
			$xMotivo = $xml->protNFe->infProt->xMotivo;	
			$nProt = $xml->protNFe->infProt->nProt;
			include("salvarBanco.php");

			
			// echo "<script>window.location='upload.php';alert('Nota Fiscal Importada com Sucesso!');</script>";
		}
		else
		{
			echo "<h4>Não existe o arquivo com a chave ".$chave." informada!</h4>";
		}
	}
?>
<?php
 }else{
	echo "<script>window.location='upload.php';alert('XML não Encontrado!');</script>"; 
 }