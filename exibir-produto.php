<?php include("conexao.php");?>
<?php include('partes/cabecalho.php'); ?>
<?php include('partes/navbar.php'); ?>
<?php include("banco/banco-xml.php");?>

<body class="bg-dark">
  <div id="wrapper">
   <?php include('partes/sidebar.php');?>
    <div class="container">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Descrição</th>
              <th>NCM</th>
              <th>CST</th> 
              <th>CFOP</th>
              <th>Aliquota</th>
              <th>Base Calculo</th>
              <th>Valor Produto</th>
              <th>Vlr ICMS</th> 
              <th>Vlr IPI</th>     
            </tr>
          </thead>
          <?php $produtos = agrupaProduto($conexao);
            $subTotalProd = 0;
            $subTotalBase = 0;
            $subTotalIcms = 0;
            $subTotalIpi = 0;?>
    
          
        <?php foreach ($produtos as $produto){?> 

            <?php if($produto['cst']==0 && $produto['percentual_icms']==18){
                $subTotalProd += (double) str_replace(",", ".", $produto['vlr_produto']);
                $subTotalBase += (double) str_replace(",", ".", $produto['vlr_base']);
                $subTotalIcms += (double) str_replace(",", ".", $produto['vlr_icms']);
                $subTotalIpi += (double) str_replace(",", ".",  $produto['vlr_ipi']);?>
            <tbody>
                <tr>
                    <td><?php echo $produto['id_produto']; ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php echo $produto['ncm']; ?></td>
                    <td><?php echo $produto['cst'];?></td>
                    <td><?php echo $produto['cfop']; ?></td>
                    <td><?php echo $produto['percentual_icms']; ?></td>
                    <td><?php echo $produto['vlr_produto']; ?></td>
                    <td><?php echo $produto['vlr_base']; ?></td>
                    <td><?php echo $produto['vlr_icms']; ?></td>
                    <td><?php echo $produto['vlr_ipi']; ?></td>
                </tr>
            </tbody>        
            <?php }  
        }?>
<?php 

mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi);?>

<?php foreach ($produtos as $produto){?> 
            <?php if($produto['cst']==0 && $produto['percentual_icms']==7){
                $subTotalProd += (double) str_replace(",", ".", $produto['vlr_produto']);
                $subTotalBase += (double) str_replace(",", ".", $produto['vlr_base']);
                $subTotalIcms += (double) str_replace(",", ".", $produto['vlr_icms']);
                $subTotalIpi += (double) str_replace(",", ".",  $produto['vlr_ipi']);?>
            <tbody>
                <tr>
                    <td><?php echo $produto['id_produto']; ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php echo $produto['ncm']; ?></td>
                    <td><?php echo $produto['cst'];?></td>
                    <td><?php echo $produto['cfop']; ?></td>
                    <td><?php echo $produto['percentual_icms']; ?></td>
                    <td><?php echo $produto['vlr_produto']; ?></td>
                    <td><?php echo $produto['vlr_base']; ?></td>
                    <td><?php echo $produto['vlr_icms']; ?></td>
                    <td><?php echo $produto['vlr_ipi']; ?></td>
                </tr>
            </tbody>        
            <?php }?> 
        <?php }?>

<?php mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi);?>

<?php foreach ($produtos as $produto){?> 
            <?php if($produto['cst']==0 && $produto['percentual_icms']==12){
                $subTotalProd += (double) str_replace(",", ".", $produto['vlr_produto']);
                $subTotalBase += (double) str_replace(",", ".", $produto['vlr_base']);
                $subTotalIcms += (double) str_replace(",", ".", $produto['vlr_icms']);
                $subTotalIpi += (double) str_replace(",", ".",  $produto['vlr_ipi']);?>
            <tbody>
                <tr>
                    <td><?php echo $produto['id_produto']; ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php echo $produto['ncm']; ?></td>
                    <td><?php echo $produto['cst'];?></td>
                    <td><?php echo $produto['cfop']; ?></td>
                    <td><?php echo $produto['percentual_icms']; ?></td>
                    <td><?php echo $produto['vlr_produto']; ?></td>
                    <td><?php echo $produto['vlr_base']; ?></td>
                    <td><?php echo $produto['vlr_icms']; ?></td>
                    <td><?php echo $produto['vlr_ipi']; ?></td>
                </tr>
            </tbody>        
        <?php }?> 
    <?php }?>

<?php mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi);?>

<?php $subTotalProd = 0;
$subTotalBase = 0;
$subTotalIcms = 0;
$subTotalIpi = 0;?>

<?php foreach ($produtos as $produto){?> 
            <?php if($produto['cst']==60 && $produto['percentual_icms']==0){
              
                $subTotalProd += (double) str_replace(",", ".", $produto['vlr_produto']);
                $subTotalBase += (double) str_replace(",", ".", $produto['vlr_base']);
                $subTotalIcms += (double) str_replace(",", ".", $produto['vlr_icms']);
                $subTotalIpi += (double) str_replace(",", ".",  $produto['vlr_ipi']);?>
            <tbody>
                <tr>
                    <td><?php echo $produto['id_produto']; ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php echo $produto['ncm']; ?></td>
                    <td><?php echo $produto['cst'];?></td>
                    <td><?php echo $produto['cfop']; ?></td>
                    <td><?php echo $produto['percentual_icms']; ?></td>
                    <td><?php echo $produto['vlr_produto']; ?></td>
                    <td><?php echo $produto['vlr_base']; ?></td>
                    <td><?php echo $produto['vlr_icms']; ?></td>
                    <td><?php echo $produto['vlr_ipi']; ?></td>
                </tr>
            </tbody>        
            <?php }  
        }?>
    <?php mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi);?>

    <?php $subTotalProd = 0;
$subTotalBase = 0;
$subTotalIcms = 0;
$subTotalIpi = 0;?>

    <?php foreach ($produtos as $produto){?> 
            <?php if($produto['cst']==40 && $produto['percentual_icms']==0){
                $subTotalProd += (double) str_replace(",", ".", $produto['vlr_produto']);
                $subTotalBase += (double) str_replace(",", ".", $produto['vlr_base']);
                $subTotalIcms += (double) str_replace(",", ".", $produto['vlr_icms']);
                $subTotalIpi += (double) str_replace(",", ".",  $produto['vlr_ipi']);?>
            <tbody>
                <tr>
                    <td><?php echo $produto['id_produto']; ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php echo $produto['ncm']; ?></td>
                    <td><?php echo $produto['cst'];?></td>
                    <td><?php echo $produto['cfop']; ?></td>
                    <td><?php echo $produto['percentual_icms']; ?></td>
                    <td><?php echo $produto['vlr_produto']; ?></td>
                    <td><?php echo $produto['vlr_base']; ?></td>
                    <td><?php echo $produto['vlr_icms']; ?></td>
                    <td><?php echo $produto['vlr_ipi']; ?></td>
                </tr>
            </tbody>        
            <?php }  
        }?>
    <?php mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi);?> 
  </div>
</div>

<?php function mostrarSubTotal($subTotalProd, $subTotalBase, $subTotalIcms, $subTotalIpi) { ?>
    <tr>
        <th colspan="6">SUBTOTAL</th>
        <th><?= number_format((double) $subTotalProd, 2, ",", ".") ?></th>
        <th><?= number_format((double) $subTotalBase, 2, ",", ".") ?></th>
        <th><?= number_format((double) $subTotalIcms, 2, ",", ".") ?></th>
        <th><?= number_format((double) $subTotalIpi, 2, ",", ".") ?></th>
    </tr>
 <?php
 }
?>
<?php include('partes/rodape.php'); ?>