
<?php include('partes/cabecalho.php'); ?>

  <body class="bg-dark">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Entrar</div>
        <div class="card-body">
          <form action = "login.php" method = "POST">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Endereço de Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Senha</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                    Lembrar Senha
                </label>
              </div>
            </div>
            <input class="btn btn-success btn-block" type="submit" value="Login">
            <!-- <a class="btn btn-primary btn-block" href="home.php">Login</a> -->
          </form>
          <div class="text-center">
            <a  data-toggle="modal" data-target="#modal-cadastrar-usuario" class="d-block small mt-3" href="#">Nova Conta</a>
              <!-- <a class="d-block small mt-3" href="form-cadastrar-usuario.php">Nova Conta</a> -->
            <a class="d-block small" href="forgot-password.html">Esqueceu a senha?</a>
          </div>
        </div>
      </div>
    </div>
<?php include("modal-cadastrar-usuario.php"); ?>
<?php include('partes/rodape.php'); ?>