

<?php 
session_start();
include_once('config/config.php'); ?>

<?php 
include_once('vistas/header.php'); 
include_once('vistas/header_admin.php'); 
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>FAQ</title>
    <?php include_once('vistas/css.php'); ?>
  </head>
  <body>
  <main class="container mt-5">
    <h1 class="h1 mb-5 text-center"><b>Preguntas Frecuentes</b></h1>
    <div class="accordion" id="accordionExample">

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    ¿Cómo puedo reservar un paquete?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Debe seleccionar la seccion de "paquetes", elige el que desea, luego lo agrega al carrito y procede a realizar el pago.</strong> 
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    ¿Cuáles son los métodos de pago aceptados?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Tarjetas de credito/debito emitidas por Mastercard, Visa y American Express.</strong> 
                </div>
            </div>
        </div>

        <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      ¿Cuál es la política de cancelación y reembolso?
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>En el caso que se arrepienta de la compra y no haya pasado más de 48 horas, envie con correo indicando dicha solicitud en la seccion de contacto y un asesor le respondera a la brevedad. Tambien puede contactarnos por WhatsApp para realizar dicho proceso.</strong> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
      ¿Cómo puedo obtener mi confirmación de compra?
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>
          Una vez realizada la compra y el pago haya sido exitoso, la informacion de la compra la puede ver en la seccion de "Mis Compras".
        </strong> 
      </div>
    </div>
  </div>
  
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
      ¿Qué documentación necesito para viajar?
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Depende del país al que este viajando. Si tiene alguna duda, contactenos via WhatsApp o correo electronico y le responderemos a la brevedad con la documentacion que va a necesitar. Tenga en cuenta que algunos paises requieren de una visa y dicho tramite puede demorar.</strong> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
      ¿Puedo realizar cambios en mi reserva una vez confirmada?
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>No, una vez realizada la reserva del paquete no se puede modificar.</strong> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
      ¿Cuál es su política en caso de emergencia durante el viaje?
      </button>
    </h2>
    <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>En el caso de una emergencia, tenemos una linea telefonica espefica donde se puede comunicar. El numero es 0800-555-2094</strong> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
      ¿Tienen atención al cliente todos los dias?
      </button>
    </h2>
    <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Los asesores trabajan de 10-18hs de lunes a viernes. Contamos con un horario especial los fines de semana de 10-15hs sabado y domingo.</strong> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
      ¿Puedo reservar vuelos y hoteles por separado?
      </button>
    </h2>
    <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>En caso de requerir un pedido especial como este, puede solicitarlo a un asesor comercial y le ayudara a reservar su vuelo y hotel por separado.</strong> 
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
      ¿Cómo puedo ponerme en contacto con su equipo de atención al cliente?
      </button>
    </h2>
    <div id="collapseEleven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>En la seccion de contacto, puede enviar un correo indicando su nombre, mail, asunto y mensaje y un asesor le respondera a la brevedad. Tambien puede contactarnos por WhatsApp en caso que lo prefiera.</strong> 
      </div>
    </div>
  </div>

</div>

    <p class="h3 m-5 text-center"><a href="aboutus.php"><b>Acerca de Dream Travel</b></a></p>
</main>
<?php include_once('vistas/js.php'); ?>
<?php include_once('vistas/footer.php'); ?>
   
   

   </body>
</html>