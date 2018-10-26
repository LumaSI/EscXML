<?php include('partes/cabecalho.php'); ?>
<?php include('partes/navbar.php'); ?>

<body class="bg-dark">
  <div id="wrapper">
  <?php include('partes/sidebar.php'); ?>
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Nova Empresa</div>
        <div class="card-body">
          <form name="cadastrar-empresa" action="cadastrar-empresa.php" method="post">
            <div class="form-group">
                <div class="form-label-group">
                    <input type="text" name="razaoSocial" id="razaoSocial" class="form-control" placeholder="text" required="required" autofocus="autofocus">
                    <label for="razaoSocial">Razao Social</label>
                </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="inscricaoEstadual" id="inscricaoEstadual" class="form-control" placeholder="000.000.000-00" required="required">
                    <label for="inscricaoEstadual">Inscrição Estadual</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="00.000.000/0000-00" required="required">
                    <label for="cnpj">CNPJ</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
                  <select id="regime-tributario" name="regime-tributario" class="form-control" >
                    <option value="tributacao">Escolha a Tributação...</option>
                    <option value="Simples Nacional">Simples Nacional</option>
                    <option value="Lucro Presumido">Lucro Presumido</option>
                    <option value="Lucro Real">Lucro Real</option>
                  </select>
            </div>
            <button type="submit" name="cadastrar" class="btn btn-success" >Cadastrar</button>
            <button type="button" class="btn btn-secondary" href="#">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include('partes/rodape.php'); ?>