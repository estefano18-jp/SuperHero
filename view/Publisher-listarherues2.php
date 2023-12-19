<!doctype html>
<html lang="en">
  <head>
    <title>lista herues</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <h1 class="text-center mt-5">Cantidad de Super heroes por Bandos</h1>
    <div class="conteiner mt-5">
      <div>
        <div style="width: 70%; margin: auto;">
          <canvas id="lienzo"></canvas>
        </div>        
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const contexto = document.querySelector("#lienzo")
      const grafico = new Chart(contexto, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [{
            label: "SuperHeroes",
            data: []
          }]
        }
      });
     
      (function (){
      fetch(`../controllers/Bandos.controller.php?operacion=listarBandos`)
        .then(respuesta => respuesta.json())
        .then(datos => {
          console.log(datos)
          grafico.data.labels = datos.map (bandos => bandos.nombre_bando)
          grafico.data.datasets[0].data = datos.map(bandos => bandos.superheroe)
          
          grafico.update()
        })
        .catch(e => {
          console.error(e)
        })
      })();

    </script>
  
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
