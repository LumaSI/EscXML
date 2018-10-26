<?php include("conexao.php");?>
<?php include('partes/cabecalho.php'); ?>
<?php include('partes/navbar.php'); ?>
<?php include("banco/banco-empresa.php");?>

<body class="bg-dark">
  <div id="wrapper">
    <?php include('partes/sidebar.php'); ?>
        <div class="container">
          <div class="card card-register mx-auto mt-5">
            <div class="card-header">Importar Arquivos XML</div>
              <div class="card-body">
              <form  action="salvar-xml.php"  method="POST" enctype="multipart/form-data">
               <div class="form-group">
                <label for="selecionar-empresa"></label>
                  <select name="selecionar-empresa" class="form-control" id="selecionar-empresa">
                    <option>Selecione uma Empresa</option>
                  <?php $empresas = buscaEmpresaNome($conexao);?>
                  <?php foreach ($empresas as $empresa) {?>
                    <option><?php echo $empresa['razao_social']; ?></option>
                    <?php
                  }?>
                  </select>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                <label for="datainicio" class="col-sm-6 col-form-label">Data Inicial</label>
                  <div class="form-label-group">
                        <input class="form-control" type="date" value="0000/00/00" id="datainicio">
                </div>
                </div>
                <div class="col-md-6">
                  <label for="datafim" class="col-sm-6 col-form-label">Data Final</label>
                    <div class="form-label-group">
                    <input class="form-control" type="date" value="0000/00/00" id="datafim">
              </div>
            </div>
                </div>
                </div>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="xml_nfe" class="custom-file-input" id="inputGroupFile04">
                  <label class="custom-file-label" for="file">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button class="btn btn-success btn-block" type="submit" name="btn-importar"><i class="fa fa-upload"></i>Upload</button>
                </div>
            </div>
          </form>    
        </div>
      </div>
    </div>
  </div>

<?php include('partes/rodape.php'); ?>
