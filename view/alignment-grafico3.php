<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
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
    <h1 class="text-center mt-5">Cantidad de SuperHeroes en cada bando por Publishers</h1>
    <div class="container">      
      <div class="p-5">
        <select class="form-select" aria-label="Default select example" id="publisher">                      
        </select>
      </div>
      <div style="width: 70%; margin: auto;">
        <canvas id="lienzo"></canvas>
      </div>              
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <table class="table table-hover">
  <thead>
    <script>

      document.addEventListener("DOMContentLoaded", ()=>{
        function $(id) { return document.querySelector(id)}
        const contexto = document.querySelector("#lienzo")
        const grafico = new Chart(contexto, {
          type: 'bar',
          data: {
            labels: [],
            datasets: [{
              label: "Bandos",
              data: []
            }]
          }
        });
        
        (function (){
            fetch(`../controllers/Publisher.controller.php?operacion=listarPublishers`)
              .then(respuesta => respuesta.json())
              .then(datos => {
                let tagOption;
                console.log(datos)
                datos.forEach(dato => {
                  tagOption = document.createElement("option")
                  tagOption.value = dato.id
                  tagOption.innerHTML = dato.publisher_name
                  $("#publisher").appendChild(tagOption)
                  
                });
              })
          })()

        const buscarBandos = ()=>{          
          const parametros = new FormData()
            parametros.append("operacion", "listarBandosPorPublisher")
            parametros.append("id", $("#publisher").value)

          fetch(`../controllers/Alignment.controller.php`, {
            method: "POST",
            body: parametros
          })
            .then(respuesta => respuesta.json())
            .then(datos => {
              console.log(datos)
              
              console.log(grafico)
              grafico.data.labels = datos.map (bandos => bandos.nombre_bando)
              grafico.data.datasets[0].data = datos.map(bandos => bandos.superheroe)
              grafico.data.labels[[2]] = "NA"
              grafico.update() 
            })
            .catch(e => {
              console.error(e)
            })
          }

          $("#publisher").addEventListener("change", ()=>{
            buscarBandos()
          })

      })
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
