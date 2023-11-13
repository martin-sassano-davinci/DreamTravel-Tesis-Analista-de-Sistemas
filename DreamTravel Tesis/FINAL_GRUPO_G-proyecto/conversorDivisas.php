<!DOCTYPE html>
<html>
<head>
    <title>Conversor de Moneda</title>
    
    <?php include_once('vistas/css.php'); ?>
</head>
<body>
<?php 
    
    include_once('config/config.php'); ?>
    
    <?php 
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>
    <div class="container">
        <h1 class="mt-5 text-center"><b>Conversor de Divisas</b></h1>
        <div class="form-group mt-4">
            <label for="monto">Monto:</label>
            <input type="number" id="monto" class="form-control" placeholder="Ingrese el monto" min=0>
        </div>
        <div class="form-group mt-3">
            <label for="monedaDe">De:</label>
            <select id="monedaDe" class="form-control">
            <option value="ARS">Peso Argentino (ARS)</option>
                
                <!-- Agrega más opciones según tus necesidades -->
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="monedaA">A:</label>
            <select id="monedaA" class="form-control">
                <option value="USD">Dólar estadounidense (USD)</option>
                <option value="EUR">Euro (EUR)</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select>
        </div>
        <button onclick="convertir()" class="btn btn-primary mt-3">Convertir</button>

        <div id="resContainer">
            <p id="resultado" class="mt-3 h3"><b></b></p>
        </div>
    </div>

    <?php include_once('vistas/footer.php'); ?>
   
   <?php include_once('vistas/js.php'); ?>
   <script src="conversion.js"></script>
</body>
</html>
