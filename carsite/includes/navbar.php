<nav class="navbar navbar-expand-lg navbar-light bg-white" style="height: 20px; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
  <div class="container-fluid">
    <div class="row w-100 justify-content-between align-items-center">
      <div class="col-auto ml-auto"> <!-- Dodata klasa ml-auto -->
        <span style="margin-right: 630px;">Euro-018 - rezervni delovi</span>
      </div>
      <div class="col-auto">
      <span><i class="glyphicon glyphicon-earphone" style="margin-right: 5px;"></i><a href="#" style="color: blue; text-decoration: none;">+1234567890</a></span> <!-- Broj za kontakt -->
        <span class="mx-1">|</span> <!-- Separator -->
        <span ><i class="glyphicon glyphicon-envelope" style="color: blue; margin-right: 5px;"></i>info@vasefirme.com</span> <!-- Email za kontakt -->
      </div>
    </div>
  </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Vaš Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Početna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">O nama</a>
        </li>
        <?php if(isset($_SESSION['auth']) && $_SESSION['role_as'] == 1) { ?>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Admin Dashboard</a>
          </li>
        <?php } ?>
        <?php if(isset($_SESSION['auth'])) { ?>
          <li class="nav-item">
            <a href="admin_logout.php" class="btn btn-primary">Logout</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>



