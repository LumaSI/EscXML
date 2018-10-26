<?php include("conexao.php");?>
<?php include('partes/cabecalho.php'); ?>
<?php include('partes/navbar.php'); ?>
<?php include("banco/banco-xml.php");?>


  <body class="bg-dark">
  <div id="wrapper">
  <?php include('partes/sidebar.php'); ?>
    <div class="container">
    <form action="conferir.php" method = "post">
    <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-file"></i>
              Notas Fiscais</div>
            <div class="card-body">
              <div class="table-responsive">
              <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="dataTable_length">
                      <label>Mostrar<select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select>
                    </label>
                  </div>
                </div><div class="col-sm-12 col-md-6">
                  <div id="dataTable_filter" class="dataTables_filter">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-bordered dataTable no-footer" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Número</th>
                  <th>Chave de acesso</th>
                  <th>Emitente</th>
                  <th>Data de Emissão</th> 
                </tr>
              </thead>
              <?php $nfes = buscaNfe($conexao);?>
              <?php $chave;?>
              <?php foreach ($nfes as $nfe) {?>
              <?php $chave = $nfe['chave_acesso'];?>
              <tbody>
                <tr>
                <td><input type="checkbox" name="selecaoNfe[]" value="<?= $chave; ?>"</td>
                <td><?php echo $nfe['numero_nfe']; ?></td>
                <td><?php echo $nfe['chave_acesso']; ?></td>
                <td><?php echo $nfe['razao_social'];?></td>
                <td><?php echo $nfe['data_emissao']; ?></td>
              </tr>
              </tbody>
              <?php
                }?>
          </table>
          <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Anterior</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Próxima</span>
            </a>
          </li>
        </ul>
      </nav>
         <div align = "right">
          <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>Conferir</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<?php include('partes/rodape.php'); ?>
