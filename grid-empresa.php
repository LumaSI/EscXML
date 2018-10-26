<?php include("conexao.php");?>
<?php include('partes/cabecalho.php'); ?>
<?php include('partes/navbar.php'); ?>
<?php include("banco/banco-empresa.php");?>


  <body class="bg-dark">
  <div id="wrapper">
  <?php include('partes/sidebar.php'); ?>
    <div class="container">
    <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-address-card"></i>
              Empresas</div>
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
                      <th>Razão Social</th>
                      <th>CNPJ</th>
                      <th>Inscrição Estadual</th>
                      <th>Regime Tributário</th>
                      <th>Editar</th>
                      <th>Excluir</th>
                    </tr>
                  </thead>
                <?php $empresas = buscaEmpresa($conexao);?>
                <?php foreach ($empresas as $empresa) {?>
                <tbody>
                  <tr>
                    <td><?php echo $empresa['razao_social']; ?></td>
                    <td><?php echo $empresa['cnpj']; ?></td>
                    <td><?php echo $empresa['inscricao_estadual']; ?></td>
                    <td><?php echo $empresa['regime_tributario']; ?></td>
                    <div class="center">
                      <td><button type="button" class="btn btn-secondary"><i class="fas fa-edit"></i></button></td>
                      <td><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                    </div>
                    <!-- <?php echo "<a href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                    <?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?> -->
                </tr>
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
      </div>
    </div>
  </div>
</div>

<?php include('partes/rodape.php'); ?>