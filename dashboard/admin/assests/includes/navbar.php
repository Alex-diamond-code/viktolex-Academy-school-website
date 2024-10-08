<nav class="navbar bg-body-tertiary fixed-top z-3">
  <div class="container-fluid">
    <div class="navbar-brand i-name">
      <p class="mb-0">Dashboard</p>
      <span class="text-white"><?php echo date("D d/M/Y ") ?></span>
    </div>

    <a href="./reports.php" class="btn btn-primary position-relative rounded-4">
      <i class="fas fa-bell" title="Notifications"></i>
      <span
        class="position-absolute top-0 start-100 translate-middle badge rounded bg-danger pb-0 m-0">
        <?php
        $query = "SELECT * FROM report";
        $run_query = mysqli_query($con, $query);

        $result = mysqli_num_rows($run_query);

        if ($result) {
        ?>
          <p class="mb-1"><?= $result ?></p>
        <?php } elseif ($result <= 0) {
        ?>
          <p class="mb-1">0</p>
        <?php } ?>
      </span>
    </a>

    <!-- Button trigger modal -->
    <button type="button" class="btn main_btn mx-2 ms-auto text-white" id="main_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</button>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon menu-btn"></span>
    </button>
  </div>
</nav>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Trying to logout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        are you sure you want to logout from your dashboard
      </div>
      <div class="modal-footer d-flex align-items-center justify-content-center">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
        <a href="../logout.php" class="btn btn-success">Logout</a>
      </div>
    </div>
  </div>
</div>