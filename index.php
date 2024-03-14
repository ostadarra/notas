<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Notas</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">Gestión de notas</h2>
        <div class="row align-items-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center mt-4">Formulario Ajax</h4>
                    </div>
                    <div class="card-body">
                        <form action="notas.php" method="post" id="formulario">
                            <label for="nota">Nota:</label><br>
                            <textarea id="nota" name="nota" rows="4" cols="50"></textarea><br><br>
                            <input type="submit" value="Guardar Nota">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center mt-4">Listado de Notas</h4>
                </div>
                <div class="card-body">
                    <table class="table table-success table-striped" id="tabla">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                            include 'leer.php'; 
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
  <script>
        $(document).ready(function(){
            // Escuchar el evento submit del formulario
            $('#formulario').submit(function(e){
                e.preventDefault(); // Evitar envío tradicional del formulario
                // Realizar la solicitud Ajax
                $.ajax({
                    type: 'POST',
                    url: 'notas.php',
                    data: $(this).serialize(), // Serializar el formulario
                    success: function(response) {
                        if(response === '1') {
                            // Cargar el contenido de leer.php y agregarlo a la tabla existente
                            $.get('leer.php', function(data) {
                                $('#tabla tbody').html(data);
                            });
                            // Limpiar el formulario después de la inserción exitosa
                            $('#nota').val('');
                        } else {
                            alert('Error al guardar la nota.');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>