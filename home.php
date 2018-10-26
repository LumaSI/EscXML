<?php include('partes/cabecalho.php'); ?>
<?php include('partes/navbar.php'); ?>


<div id="wrapper">
	<?php include('partes/sidebar.php'); ?>
	

      <div id="content-wrapper">

        <div class="container-fluid">
          <!-- Area Chart Example-->
          <div class="card mb-4">
              <div class="card-body">
              <div class="card bg-dark text-white">
              <img class="card-img" src="./partes/img/Logo 04.PNG" alt="Imagem do card" width="80%" height="400">
          </div>
        </div>
          <div class="card-footer small text-muted"></div>
        </div>
<!-- 
          <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div> -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>EscXML 2018</span>
            </div>
          </div>
        </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Encerrar a Sessão?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <!-- <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div> -->
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-success" href="logout.php">Sair</a>
          </div>
        </div>
      </div>
    </div>
    
<?php include('partes/rodape.php'); ?>
