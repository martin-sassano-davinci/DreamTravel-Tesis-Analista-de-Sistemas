function convertir() {
    const monto = document.getElementById('monto').value;
    const monedaDe = document.getElementById('monedaDe').value;
    const monedaA = document.getElementById('monedaA').value;

    fetch('https://api.bluelytics.com.ar/v2/latest', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        var cotizaciones = 0;
        if(monedaA === "USD"){
             cotizaciones = data.blue["value_avg"];
        } else {
            cotizaciones = data.blue_euro["value_avg"];
        }
        

        // const tasaDe = cotizaciones[monedaDe.toLowerCase()];
        // const tasaA = cotizaciones[monedaA.toLowerCase()];

        const resultado = monto / cotizaciones;
        document.getElementById('resContainer').className = "alert alert-primary container mt-5";
        document.getElementById('resultado').innerText = `${monto} ${monedaDe} son ${resultado.toFixed(2)} ${monedaA}`;

        
    })
    .catch(error => {
        console.log('Error al obtener las tasas de cambio:', error);
    });
}
