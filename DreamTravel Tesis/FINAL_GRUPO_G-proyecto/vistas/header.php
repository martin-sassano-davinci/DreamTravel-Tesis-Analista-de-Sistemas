<style>
.nav-item.active a {
    color: white !important;
  }

  .whatsapp {
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#25d366;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  font-size:30px;
  z-index:100;
}

.whatsapp-icon {
  margin-top:13px;
}

</style>
<?php

  if (!isset($_SESSION['user_role'])) {
    ?>
		<!-- <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">DreamTravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
$currentFile = basename($_SERVER["PHP_SELF"]);
?>

<!-- <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item <?php echo ($currentFile == 'index.php') ? 'active' : ''; ?>">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'paquetes.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="paquetes.php">Paquetes</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'blog.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'contacto.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="contacto.php">Contacto</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'faq.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="faq.php">FAQ</a>
        </li>
    </ul>
</div> -->

      
        <!-- <form action="buscar.php" method="POST" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
  <input type="search" class="form-control form-control-dark" placeholder="Buscar destinos" aria-label="Search" name="q">
</form>
        
        <a href="carrito.php"><i class="bi bi-cart2" style="font-size: 2rem; color: #FFC107; padding-right: 15px;"></i></a>
        <div class="text-end">
          <a button type="button" class="btn btn-outline-light me-2" href="login.php">Login</a>
          <a button type="button" class="btn btn-warning" href="registracion.php">Sign-up</a>
        </div>
        
      </div>
    </div>
  </nav>
</header> --> 

<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">DreamTravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
// Obtener el nombre del archivo actual (página actual)
$currentFile = basename($_SERVER["PHP_SELF"]);
?>

<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item <?php echo ($currentFile == 'index.php') ? 'active' : ''; ?>">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'paquetes.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="paquetes.php">Paquetes</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'blog.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'contacto.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="contacto.php">Contacto</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'faq.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="faq.php">FAQ</a>
        </li>
    </ul>


      
        <form action="buscar.php" method="POST" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
  <input type="search" class="form-control form-control-dark" placeholder="Buscar destinos" aria-label="Search" name="q">
</form>
        
        <a href="carrito.php"><i class="bi bi-cart2" style="font-size: 2rem; color: #FFC107; padding-right: 15px;"></i></a>
        <div class="text-end">
          <a button type="button" class="btn btn-outline-light me-2" href="login.php">Login</a>
          <a button type="button" class="btn btn-warning" href="registracion.php">Sign-up</a>
        </div>
      </div>
    </div>
  </nav>
</header>
<!-- <div class="fixed-bottom fixed-right p-3">
  <a href="https://wa.me/+5491132584344" target="_blank" class="btn btn-success">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
</svg>
    
  </a>
</div> -->

<a href="https://wa.me/5211234567890?text=Me%20gustaría%20saber%20el%20precio%20del%20coche" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>



<?php
	} else {
		if($_SESSION['user_role'] == 'user'){
     
      ?>
			<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">DreamTravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
// Obtener el nombre del archivo actual (página actual)
$currentFile = basename($_SERVER["PHP_SELF"]);
?>

<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item <?php echo ($currentFile == 'index.php') ? 'active' : ''; ?>">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'paquetes.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="paquetes.php">Paquetes</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'blog.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'contacto.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="contacto.php">Contacto</a>
        </li>
        <li class="nav-item <?php echo ($currentFile == 'faq.php') ? 'active' : ''; ?>">
            <a class="nav-link" href="faq.php">FAQ</a>
        </li>
    </ul>


      
        <form action="buscar.php" method="POST" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
  <input type="search" class="form-control form-control-dark" placeholder="Buscar destinos" aria-label="Search" name="q">
</form>
        
        <a href="carrito.php"><i class="bi bi-cart2" style="font-size: 2rem; color: #FFC107; padding-right: 15px;"></i></a>
        
          
          <div class="dropdown">
  <button class="btn btn-outline-light me-2 dropdown-toggle m-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <?php if(isset($_SESSION['user_name'])) {
                      echo $_SESSION['user_name'];
                      //var_dump($_SESSION['user_name']);
                    } 
            ?> 
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="miscompras.php">Mis compras</a></li>
    <li><a class="dropdown-item" href="misresenias.php">Mis reseñas</a></li>
    <li><a class="dropdown-item" href="dltCuenta.php">Borrar cuenta</a></li>
    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
    <!-- <li><a class="dropdown-item" href="#">Something</a></li> -->
  </ul>
</div>
          
        
        
        
      </div>
    </div>
  </nav>
</header>



<a href="https://wa.me/5211234567890?text=Me%20gustaría%20saber%20el%20precio%20del%20coche" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
<?php
		}
	}
?>

