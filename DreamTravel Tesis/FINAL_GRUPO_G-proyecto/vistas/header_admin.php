<?php
  if (!isset($_SESSION['user_role'])) {
		
	} else {
		if($_SESSION['user_role'] == 'admin'){
      ?>
			<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">DreamTravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="paquetes.php">Paquetes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacto.php">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Admin</a>
          </li>
        </ul>

    
        <a href="compra.php"><i class="bi bi-cart2" style="font-size: 2rem; color: #FFC107; padding-right: 15px;"></i></a>
        <div class="text-end">
          <a button type="button" class="btn btn-outline-light me-2" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </nav>
</header>
<?php
		} 
	}
?>

