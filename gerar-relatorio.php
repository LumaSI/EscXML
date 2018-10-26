<?php
    include("conexao.php");
	include("mpdf60/mpdf.php");

    $html="
        
    
    ";


$mpdf=new mPDF(); 
	$mpdf->SetDisplayMode('fullpage');
	$css = file_get_contents("scss/estilo.css");
	$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();
 
	exit;