<?php include('partes/cabecalho.php'); ?>
<body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Criar Nova Conta</div>
        <div class="card-body">
          <form name="cadastrar-usuario" action="cadastrar-usuario.php" method="post">
            <div class="form-group">
                  <div class="form-label-group">
                    <input type="text" name="nome" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="firstName">Nome</label>
                  </div>
                </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Senha</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirme a Senha</label>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" name="cadastrar" class="btn btn-success" >Cadastrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </form> 
        </div>
      </div>
    </div>
</div>
<?php include('partes/rodape.php'); ?>
