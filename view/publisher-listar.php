<!doctype html>
<html lang="es">
  <head>
    <title>Vista publisher</title>
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
    <div class="container">
      <div class="alert alert-info mt-3">
      <div class="card mt-2">  
        <div class="card-body">
          <form action="" id="formpublisher" autocomplete="off">
  
            <div class="mb-3">
              <label for="superhero.publisher">publisher</label>
              <select name="superhero.publisher" id="superhero.publisher" class="form-select" required>
                <option value="">Seleccione</option>
              </select>
            </div>

      <script>
      document.addEventListener("DOMContentLoaded", () => {
        (function () {
          fetch(`../controllers/publisher_.controller.php?operacion=listar`,{})
            .then(respuesta => respuesta.json())
            .then(datos => {
              datos.forEach(element => {
                const tagOption = document.createElement("option")
                tagOption.value = element.publisher
                tagOption.innerHTML = element.publisher 
                $("#publisher").appendChild(tagOption)
              });

            })
            .catch(e => {
              console.error(e)
            })
        })();

        $("#formpublisher").addEventListener("submit", (event) => {
          //Evitamos el envio por ACTION
          event.preventDefault();

          //Enviaré por AJAX (fetch)
          if (confirm("¿Desea registrar este publisher?")){

            const parametros = new FormData()
            parametros.append("operacion", "add") //¡IMPORTANTE!
            // A partir de este punto las variable que requiere el SPU
            parametros.append("id", $("#marca").value)
            parametros.append("superhero_name", $("#Nonbre").value)
            parametros.append("full_name", $("#nombre ").value)
            parametros.append("gender_id", $("#gender").value)
            parametros.append("race_id", $("#race").value)


            fetch(`../controllers/publisher.controller.php`, {
              method: "POST",
              body: parametros
            })
              .then(respuesta => respuesta.json())
              .then(datos => {
                if(datos.idvehiculo > 0){
                  $("#formVehiculo").reset()
                  alert(`Vehiculo registrado con ID: ${datos.idvehiculo}`)
                }
              })
              .catch(e => {
                console.error(e)
              })
          }
        })
      })
  </body>
</html>
