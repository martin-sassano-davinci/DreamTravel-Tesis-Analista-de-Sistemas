<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Blog</title>

    <?php include_once('vistas/css.php'); ?>
    <style>
    @media (min-width: 768px) {
    .modal-dialog {
      min-width: 60%;
    }
  }
  </style>
  </head>
  <body>
    
    <?php 
    session_start();
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>

<!-- Secciones de blog -->

<main>
<div class="container p-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        
      <div class="card">
          <img class="card-img" src="img/blog3.png" alt="#">
          <div class="card-body">
            <h4 class="card-title">10 cosas que no pueden faltar en tu viaje.</h4>
           
            <p class="card-text">Descubre todos los tips necesarios que deberias saber antes de viajar.</p>
            <!-- <a href="" class="btn btn-info btn-warning" data-toggle="modal" data-target="#myModal1">Más info</a> -->
            <button type="button" class="btn btn-info btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Más info
</button>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 16/04/23 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 2.867
              
            </div>
          </div>
        </div>
      </div>


<!-- Modal 1 -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog-centered modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">10 cosas que no pueden faltar en tu viaje.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <h5 class="mb-3">Documentos de viaje:</h5>

    <ul class="list-group">
        <li class="list-group-item">Pasaporte, visa (si es necesario).</li>
        <li class="list-group-item">Tarjetas de identificación y tarjetas de crédito/débito.</li>
        <li class="list-group-item">Reservas de vuelos y alojamiento.</li>
   

    <h5 class="mt-4 mb-3">Dinero en efectivo:</h5>
      <ul class="list-group">
        <li class="list-group-item">Asegúrate de tener suficiente moneda local para gastos pequeños y lugares que no aceptan tarjetas.</li>
      </ul>

    <h5 class="mt-4 mb-3">Medicamentos y kit de primeros auxilios:</h5>
    <ul class="list-group">
        <li class="list-group-item">Medicamentos recetados y de venta libre.</li>
        <li class="list-group-item">Artículos básicos de primeros auxilios como vendajes, desinfectante y analgésicos.</li>
    </ul>

    <h5 class="mt-4 mb-3">Cargadores y adaptadores:</h5>
      <ul class="list-group">
        <li class="list-group-item">Cargadores para dispositivos electrónicos. Adaptadores de corriente si viajas a un país con enchufes diferentes.</li>
      </ul>

    <h5 class="mt-4 mb-3">Ropa adecuada:</h5>
    <ul class="list-group">
        <li class="list-group-item">Ropa cómoda y adecuada para el clima del destino.</li>
        <li class="list-group-item">Calzado cómodo para caminar.</li>
    </ul>

    <h5 class="mt-4 mb-3">Artículos de higiene personal:</h5>
    <ul class="list-group">
        <li class="list-group-item">Cepillo de dientes, pasta dental, jabón, champú, etc.</li>
        <li class="list-group-item">Toallas y pañuelos de papel.</li>
    </ul>

    <h5 class="mt-4 mb-3">Mapas y guías:</h5>
    <ul class="list-group">
        <li class="list-group-item">Mapas del destino o aplicaciones de mapas en tu dispositivo.</li>
        <li class="list-group-item">Guías turísticas para obtener información sobre lugares de interés.</li>
    </ul>

    <h5 class="mt-4 mb-3">Dispositivos electrónicos:</h5>
    <ul class="list-group">
        <li class="list-group-item">Teléfono móvil, tableta, cámara, etc.</li>
        <li class="list-group-item">Auriculares para entretenimiento durante el viaje.</li>
    </ul>

    <h5 class="mt-4 mb-3">Botella de agua reutilizable:</h5>
    <ul class="list-group">
        <li class="list-group-item"> Mantente hidratado en tu viaje llevando contigo una botella de agua reutilizable.</li>
    </ul>

    <h5 class="mt-4 mb-3">Bolsas reutilizables:</h5>
    <ul class="list-group">
        <li class="list-group-item">Útiles para llevar tus pertenencias, hacer compras locales o mantener tus pertenencias organizadas.</li>
    </ul>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog1.png" alt="#">
        
          <div class="card-body">
            <h4 class="card-title">Documentación necesaria para viajar.</h4>
           
            <p class="card-text">Te ofrecemos la mejor información útil y necesaria para poder disfrutar de tu viaje plenamente sin ningun tipo de restricciones .</p>
            <button type="button" class="btn btn-info btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2">
  Más info
</button>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 10/04/23 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 9.347
            </div>
          </div>
        </div>
      </div>

      <!-- Modal 2 -->

      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog-centered modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Documentación necesaria para viajar.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="mt-4 mb-3">Pasaporte:</h5>
        <ul class="list-group">
          <li class="list-group-item">Asegúrate de que tu pasaporte esté válido por al menos seis meses más allá de la fecha de regreso planeada.</li>
        </ul>

        <h5 class="mt-4 mb-3">Visa:</h5>
        <ul class="list-group">
          <li class="list-group-item">Verifica si el país al que viajas requiere una visa para ciudadanos de tu país. Si es así, asegúrate de obtenerla con anticipación.</li>
        </ul>

        <h5 class="mt-4 mb-3">Boletos de vuelo:</h5>
        <ul class="list-group">
          <li class="list-group-item">Confirma y lleva contigo los boletos de avión para la ida y vuelta.</li>
        </ul>

        <h5 class="mt-4 mb-3">Reservas de alojamiento:</h5>
        <ul class="list-group">
          <li class="list-group-item">Pueden solicitarte pruebas de reservas de hotel u otros alojamientos durante tu estancia.</li>
        </ul>

        <h5 class="mt-4 mb-3">Seguro de viaje:</h5>
        <ul class="list-group">
          <li class="list-group-item">Aunque no siempre es obligatorio, es recomendable tener un seguro de viaje que cubra gastos médicos y otros imprevistos.</li>
        </ul>

        <h5 class="mt-4 mb-3">Tarjetas de identificación:</h5>
        <ul class="list-group">
          <li class="list-group-item">Lleva contigo tu documento de identificación nacional, licencia de conducir u otros documentos de identificación según sea necesario.</li>
        </ul>

        <h5 class="mt-4 mb-3">Tarjetas de crédito/débito:</h5>
        <ul class="list-group">
          <li class="list-group-item">Asegúrate de tener tarjetas de crédito o débito válidas y notifica a tu banco sobre tu viaje para evitar problemas con transacciones en el extranjero.</li>
        </ul>
        
        <h5 class="mt-4 mb-3">Carné de vacunación:</h5>
        <ul class="list-group">
          <li class="list-group-item">En algunos destinos, especialmente en regiones donde hay riesgo de enfermedades, es posible que necesites un carné de vacunación actualizado. </li>
        </ul>

        <h5 class="mt-4 mb-3">Permiso de conducir internacional:</h5>
        <ul class="list-group">
          <li class="list-group-item">Si planeas conducir en el extranjero, verifica si necesitas obtener un permiso de conducir internacional.</li>
        </ul>

        <h5 class="mt-4 mb-3">Papeles adicionales:</h5>
        <ul class="list-group">
          <li class="list-group-item">Dependiendo de la naturaleza de tu viaje, es posible que necesites otros documentos como cartas de invitación, confirmación de empleo, entre otros.</li>
        </ul>

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog2.png" alt="#">
          
          <div class="card-body">
            <h4 class="card-title">¿Por qué es importante contratar un seguro de viaje?</h4>
           
            <p class="card-text">Durante los preparativos de viaje, contratar un seguro ya es una parte indispensable.</p>
            <button type="button" class="btn btn-info btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal3">
  Más info
</button>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 09/04/23 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 30.965
            </div>
          </div>
        </div>
      </div>


<!-- Modal 3 -->

<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog-centered modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Por qué es importante contratar un seguro de viaje?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h5 class="mt-4 mb-3">Cobertura médica:</h5>
    <ul class="list-group">
        <li class="list-group-item">En caso de enfermedad o lesión durante el viaje, un seguro médico de viaje puede cubrir los gastos médicos, incluyendo consultas, hospitalizaciones, medicamentos y evacuaciones médicas.</li>
    </ul>

    <h5 class="mt-4 mb-3">Cancelación del viaje:</h5>
    <ul class="list-group">
        <li class="list-group-item">Los seguros de viaje pueden cubrir los gastos en caso de tener que cancelar o interrumpir tu viaje debido a emergencias médicas, eventos inesperados o problemas en el lugar de destino.</li>
    </ul>

    <h5 class="mt-4 mb-3">Pérdida de equipaje:</h5>
    <ul class="list-group">
        <li class="list-group-item">Muchos seguros de viaje ofrecen cobertura contra la pérdida, robo o daño de equipaje, proporcionando reembolsos para artículos esenciales.</li>
    </ul>

    <h5 class="mt-4 mb-3">Retrasos y cancelaciones de vuelos:</h5>
    <ul class="list-group">
        <li class="list-group-item">Si tu vuelo se retrasa o se cancela, un seguro de viaje puede cubrir los costos adicionales, como alojamiento, comidas y transporte alternativo.</li>
    </ul>

    <h5 class="mt-4 mb-3">Asistencia legal:</h5>
    <ul class="list-group">
        <li class="list-group-item">Algunos seguros de viaje ofrecen asistencia legal en el extranjero, lo cual puede ser útil en situaciones legales inesperadas.</li>
    </ul>

    <h5 class="mt-4 mb-3">Repatriación:</h5>
    <ul class="list-group">
        <li class="list-group-item">En situaciones graves, como enfermedad grave o fallecimiento, un seguro de viaje puede cubrir los costos de repatriación del viajero a su país de origen.</li>
    </ul>

    <h5 class="mt-4 mb-3">Actividades específicas:</h5>
    <ul class="list-group">
        <li class="list-group-item">Si planeas realizar actividades de riesgo o deportes extremos, un seguro de viaje especializado puede ofrecer cobertura adicional para tales actividades.</li>
    </ul>

    <h5 class="mt-4 mb-3">Responsabilidad civil:</h5>
    <ul class="list-group">
        <li class="list-group-item">Algunos seguros de viaje brindan cobertura por responsabilidad civil en caso de causar daños a terceros durante tu viaje.</li>
    </ul>

    <h5 class="mt-4 mb-3">Emergencias y asistencia las 24 horas:</h5>
    <ul class="list-group">
        <li class="list-group-item">La mayoría de los seguros de viaje proporcionan líneas de asistencia telefónica las 24 horas, lo que puede ser crucial en situaciones de emergencia.</li>
    </ul>

    <h5 class="mt-4 mb-3">Paz mental:</h5>
    <ul class="list-group">
        <li class="list-group-item">Contar con un seguro de viaje brinda tranquilidad, ya que sabes que estás protegido en caso de situaciones imprevistas, lo que te permite disfrutar más plenamente de tu viaje.</li>
    </ul>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog4.png" alt="#">
          
          <div class="card-body">
            <h4 class="card-title">Disfruta de las mejores excursiones del mundo.</h4>
          
            <p class="card-text">Descubre los mejores sitios para realizar y disfrutar diferentes excursiones.</p>
            <button type="button" class="btn btn-info btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal4">
  Más info
</button>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 02/04/23 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 20.978
            </div>
          </div>
        </div>
      </div>

      <!-- Modal 4 -->

<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog-centered modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Las mejores excursiones del mundo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h5 class="mt-4 mb-3">Naturaleza y Aventura:</h5>
        <ul class="list-group">
        <p class="h6 mt-4 mb-3">Parques Nacionales en Estados Unidos:</p>
          <li class="list-group-item">
            Explora el Gran Cañón en Arizona, el Parque Nacional de Yellowstone en Wyoming, o el Parque Nacional de Yosemite en California para experimentar la belleza natural.
          </li>

          <p class="h6 mt-4 mb-3">Montañas de Suiza:</p>
          <li class="list-group-item">
            Realiza excursiones alpinas en los Alpes suizos, como en Zermatt (Cervino) o la región de Jungfrau.
          </li>
          
          <p class="h6 mt-4 mb-3">Safaris en África:</p>
          <li class="list-group-item">
            Embárcate en safaris en parques nacionales de África, como el Parque Nacional Kruger en Sudáfrica o el Serengueti en Tanzania.
          </li>
        </ul>

        <h5 class="mt-4 mb-3">Cultura e Historia:</h5>
        <ul class="list-group">
          <p class="h6 mt-4 mb-3">Ruta de la Seda en Asia Central:</p>
          <li class="list-group-item">
            Descubre la antigua Ruta de la Seda, explorando ciudades como Samarcanda en Uzbekistán o Bujará en Turkmenistán.
          </li>

          <p class="h6 mt-4 mb-3">Sitios Arqueológicos en Grecia:</p>
          <li class="list-group-item">
           Visita la Acrópolis en Atenas, el Templo de Apolo en Delfos y el Teatro de Epidauro para sumergirte en la antigua historia griega.
          </li>

          <p class="h6 mt-4 mb-3">Ciudades Históricas en Italia:</p>
          <li class="list-group-item">
            Recorre Roma para ver el Coliseo y el Foro Romano, visita Florencia para apreciar el arte renacentista y explora la antigua Pompeya cerca de Nápoles.
          </li>
        </ul>

        <h5 class="mt-4 mb-3">Aventuras Urbanas:</h5>
        <ul class="list-group">
          <p class="h6 mt-4 mb-3">Nueva York, Estados Unidos:</p>
          <li class="list-group-item">
            Realiza excursiones por los diversos barrios de Nueva York, visita museos como el MoMA y disfruta de la vida nocturna en Broadway.
          </li>

          <p class="h6 mt-4 mb-3">Tokio, Japón:</p>
          <li class="list-group-item">
           Explora la mezcla única de tradición y modernidad en Tokio, visitando templos antiguos, barrios modernos como Shibuya y disfrutando de la gastronomía japonesa.
          </li>

          <p class="h6 mt-4 mb-3">Berlín, Alemania:</p>
          <li class="list-group-item">
            Descubre la historia moderna y la cultura artística de Berlín, visitando el Muro de Berlín, la Puerta de Brandeburgo y museos como la Isla de los Museos.
          </li>
        </ul>

        <h5 class="mt-4 mb-3">Playa y Relax:</h5>
        <ul class="list-group">
          <p class="h6 mt-4 mb-3">Islas Griegas:</p>
          <li class="list-group-item">
            Relájate en las playas de las Islas Griegas, como Santorini y Mykonos, y explora las aguas cristalinas del Mar Egeo.
          </li>

          <p class="h6 mt-4 mb-3">Playa del Carmen, México:</p>
          <li class="list-group-item">
           Disfruta de las hermosas playas de la Riviera Maya, explora los cenotes cercanos y visita las ruinas mayas de Tulum.
          </li>

          <p class="h6 mt-4 mb-3">Islas Maldivas:</p>
          <li class="list-group-item">
            Sumérgete en el lujo de las villas sobre el agua en las Maldivas, y disfruta de la belleza del océano Índico.
          </li>
        </ul>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog5.png" alt="#">
         
          <div class="card-body">
            <h4 class="card-title">Qué ver en Bruselas en 3 días.</h4>
           
            <p class="card-text"> Recomendaciones y consejos para no perderte sus lugares imprescindibles para visitar Belgica.
            </p>
            <button type="button" class="btn btn-info btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal5">
  Más info
</button>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 21/03/23 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 19.476
            </div>
          </div>
        </div>
      </div>

         <!-- Modal 5 -->

<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog-centered modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Qué ver en Bruselas en 3 días</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h5 class="mt-4 mb-3">Día 1: Explorando el Centro Histórico</h5>
    <ul class="list-group">
      <p class="h6 mt-4 mb-3">Grand Place (Grote Markt):</p>
        <li class="list-group-item">
            Comienza tu visita en la hermosa Grand Place, declarada Patrimonio de la Humanidad por la UNESCO. Disfruta de la arquitectura impresionante de la plaza y visita la Casa del Rey y el Ayuntamiento.
        </li>

        <p class="h6 mt-4 mb-3">Manneken Pis:</p>
        <li class="list-group-item">
            Dirígete a la estatua más famosa de Bruselas, el Manneken Pis. Aunque es pequeña, es un símbolo icónico de la ciudad.
        </li>

        <p class="h6 mt-4 mb-3">Catedral de San Miguel y Santa Gúdula:</p>
        <li class="list-group-item">
            Visita esta impresionante catedral gótica, que ha sido testigo de muchos eventos históricos a lo largo de los siglos.
        </li>

        <p class="h6 mt-4 mb-3">Museo Magritte:</p>
        <li class="list-group-item">
            Si eres fanático del surrealismo, visita el Museo Magritte para explorar la obra del famoso pintor René Magritte.
        </li>
    </ul>

    <h5 class="mt-4 mb-3">Día 2: Atomium y Barrios Modernos</h5>
<ul class="list-group">
    <p class="h6 mt-4 mb-3">Atomium:</p>
    <li class="list-group-item">
        Dedica la mañana al Atomium, un símbolo de la Exposición Universal de Bruselas de 1958. Puedes explorar las esferas y disfrutar de vistas panorámicas desde la cima.
    </li>

    <p class="h6 mt-4 mb-3">Mini-Europe:</p>
    <li class="list-group-item">
        Ubicado cerca del Atomium, Mini-Europe es un parque temático con réplicas en miniatura de famosos monumentos europeos.
    </li>

    <p class="h6 mt-4 mb-3">Parc du Cinquantenaire:</p>
    <li class="list-group-item">
        Disfruta de una tarde tranquila en el Parc du Cinquantenaire. Explora el arco del triunfo y visita los museos situados en el parque.
    </li>

    <p class="h6 mt-4 mb-3">Barrio Europeo:</p>
    <li class="list-group-item">
        Pasea por el Barrio Europeo, donde encontrarás edificios modernos y las instituciones de la Unión Europea.
    </li>
</ul>

<h5 class="mt-4 mb-3">Día 3: Gastronomía y Museos</h5>
<ul class="list-group">
    <p class="h6 mt-4 mb-3">Les Galeries Royales Saint-Hubert:</p>
    <li class="list-group-item">
        Comienza tu día explorando estas elegantes galerías comerciales, hogar de tiendas de lujo y encantadores cafés.
    </li>

    <p class="h6 mt-4 mb-3">Museos Reales de Bellas Artes:</p>
    <li class="list-group-item">
        Dedica la mañana a visitar los Museos Reales de Bellas Artes. Hay dos museos: uno dedicado a arte antiguo y otro a arte moderno.
    </li>

    <p class="h6 mt-4 mb-3">Cervecerías y Chocolate:</p>
    <li class="list-group-item">
        No puedes dejar Bruselas sin probar su cerveza y chocolate. Visita una cervecería para degustar algunas cervezas belgas y una tienda de chocolate para llevar algunos souvenirs dulces.
    </li>

    <p class="h6 mt-4 mb-3">Mont des Arts:</p>
    <li class="list-group-item">
        Termina tu viaje en el Mont des Arts, un hermoso mirador con vistas a la ciudad. Es un lugar perfecto para relajarse y reflexionar sobre tu experiencia en Bruselas.
    </li>
</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog6.png" alt="#">
          
          <div class="card-body">
            <h4 class="card-title">Qué ver en París en 3 días</h4>
            
            <p class="card-text">Un recorrido por  París. Los lugares más importantes que ver en la capital francesa.</p>
            <button type="button" class="btn btn-info btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal6">
  Más info
</button>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 06/03/23 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 61.347
            </div>
          </div>
        </div>
      </div>

         <!-- Modal 6 -->

<div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog-centered modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Qué ver en París en 3 días</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <h5 class="mt-4 mb-3">Día 1: Explorando el Corazón de París</h5>
<ul class="list-group">
    <p class="h6 mt-4 mb-3">Torre Eiffel:</p>
    <li class="list-group-item">
        Comienza tu visita en la icónica Torre Eiffel. Puedes subir para disfrutar de impresionantes vistas de la ciudad.
    </li>

    <p class="h6 mt-4 mb-3">Paseo por el Sena:</p>
    <li class="list-group-item">
        Da un relajante paseo a lo largo del río Sena. Considera hacer un crucero para ver los monumentos desde el agua.
    </li>

    <p class="h6 mt-4 mb-3">Museo del Louvre:</p>
    <li class="list-group-item">
        Dedica la tarde al Louvre, uno de los museos más grandes y famosos del mundo. No olvides ver la Mona Lisa y otras obras maestras.
    </li>
</ul>

<h5 class="mt-4 mb-3">Día 2: Arte y Arquitectura</h5>
<ul class="list-group">
    <p class="h6 mt-4 mb-3">Montmartre y la Basílica del Sagrado Corazón:</p>
    <li class="list-group-item">
        Explora el bohemio barrio de Montmartre y visita la Basílica del Sagrado Corazón. Disfruta de las calles empedradas y las vistas panorámicas.
    </li>

    <p class="h6 mt-4 mb-3">Museo de Orsay:</p>
    <li class="list-group-item">
        Este museo alberga una impresionante colección de arte impresionista y postimpresionista. Dedica tiempo a admirar las obras maestras de artistas como Van Gogh y Monet.
    </li>

    <p class="h6 mt-4 mb-3">Catedral de Notre-Dame:</p>
    <li class="list-group-item">
        Aunque la catedral sufrió un incendio en 2019, sigue siendo un lugar histórico y arquitectónico significativo. Contempla su belleza desde el exterior.
    </li>
</ul>

<h5 class="mt-4 mb-3">Día 3: Cultura y Compras</h5>
<ul class="list-group">
    <p class="h6 mt-4 mb-3">Sainte-Chapelle y la Isla de la Cité:</p>
    <li class="list-group-item">
        Visita la Sainte-Chapelle, conocida por sus impresionantes vidrieras. Explora la Isla de la Cité, hogar de Notre-Dame.
    </li>

    <p class="h6 mt-4 mb-3">Museo Rodin:</p>
    <li class="list-group-item">
        Sumérgete en la escultura y los jardines del Museo Rodin. No te pierdas la famosa escultura "El Pensador".
    </li>

    <p class="h6 mt-4 mb-3">Champs-Élysées y Arco de Triunfo:</p>
    <li class="list-group-item">
        Camina por la glamorosa avenida Champs-Élysées y llega al imponente Arco de Triunfo. Puedes subir para obtener vistas panorámicas.
    </li>

    <p class="h6 mt-4 mb-3">Torre Montparnasse:</p>
    <li class="list-group-item">
       Para vistas impresionantes de París que incluyen la Torre Eiffel, visita la Torre Montparnasse.
    </li>

    <p class="h6 mt-4 mb-3">Compras en Le Marais:</p>
    <li class="list-group-item">
        Termina tu día explorando las tiendas de la vibrante zona de Le Marais.
    </li>
</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
      
    </div>
  </div>
</main>

  <?php include_once('vistas/footer.php'); ?>    

  <script src="https://kit.fontawesome.com/265d4bfb92.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
  </body>
</html>
