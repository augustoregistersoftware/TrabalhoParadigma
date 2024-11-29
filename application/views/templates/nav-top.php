<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">FinAR <i class="fa-solid fa-money-bill">, <?php echo $this->session->userdata('name'); ?></i></a>
	<div>
	</div>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?=base_url()?>login">Sair</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Menu</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>dashboard">
              <span data-feather="file"><img src="\finar\imagens\Dashboard_40953.png"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>CadastroLogin">
              <span data-feather="file"><img src="\finar\imagens\users_21945.png"></span>
              Login
            </a>
          </li>
					<li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>obra">
              <span data-feather="file"><img src="\finar\imagens\obras.png"></span>
              Obras
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>endereco">
              <span data-feather="file"><img src="\finar\imagens\house.png"></span>
              Endereços
            </a>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>Ouvidoria  ">
              <span data-feather="file"><img src="\finar\imagens\ouvidoria.png"></span>
              Ouvidoria
            </a> 

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Copyright © 2024 - Ouvidoria Publica ltda.</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        </ul>
      </div>
    </nav>

    <style>
  .sub-menu {
    margin-left: 20px;
    display: none; /* Esconda o submenu inicialmente */
}

.nav-item:hover .sub-menu {
    display: block; /* Mostre o submenu quando o item pai for passado com o mouse */
}

</style>