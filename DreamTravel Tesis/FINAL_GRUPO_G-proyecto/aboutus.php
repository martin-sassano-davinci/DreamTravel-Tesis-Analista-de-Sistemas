

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dreamtravel . Contacto</title>

    <?php include_once('vistas/css.php'); ?>
</head>

<body>

    <?php 
    session_start();
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>


    
    <!-- Default form contact -->
    <section class="p-0 mt-5 mb-5 style="background-color: #eee;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-10 ">
                                    <form class="text-center border border-light p-5" action="validar_form_contacto.php" method="post">

                                        <img class="mb-4" src="img/paper-plane.png" alt="">
                                        <p class="h1 mb-4">Sobre Nosotros</p>

                                        <!-- Name -->
                                        <div class="row">
                                           
    
                                            
                                                <p class="h3 mt-4">Misión</p>
                                                <p class="mb-4">Facilitar y enriquecer las experiencias de viajes excepcionales de nuestros clientes, ofreciendo una amplia gama de destinos, servicios personalizados y comodidad a la hora de reservar en línea.</p>
                                            
                                        

                                        <!-- Email -->
                                        <p class="h3 mt-4">Visión</p>
                                        <p class="mb-4">Convertirnos en la opción preferida de viajes online, destacando por nuestra gran innovación tecnológica, un excepcional y exclusivo servicio al cliente y una amplia gama de opciones de viajes especializados que satisfagan sus necesidades,  comprometiéndonos con la sostenibilidad en la industria del turismo.</p>
                                        <!-- Subject -->
                                        
                                        <h2 class="h3 mt-4">Valores</h2>
                                        <p class="mb-4">En nuestra empresa priorizamos la satisfacción y comodidad de nuestros clientes, ofreciendo un servicio excelente y personalizado, eficiente y agradable ​​inspirandolos a explorar nuevos destinos y experiencias. Buscamos constantemente maneras de mejorar e innovar.</p>
                                        <!-- Message -->
                                        

                                        <!-- Copy -->
                                        <!-- <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy" >
                                            <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
                                        </div> -->

                                        <!-- Send button -->
                                        

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Default form contact -->
    

    <?php include_once('vistas/footer.php'); ?>

    <?php include_once('vistas/js.php'); ?>
</body>

</html>