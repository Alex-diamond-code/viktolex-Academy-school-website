<?php

include "server.php";

?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Hey</strong> <?php echo $_SESSION['message'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<br>