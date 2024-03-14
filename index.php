<?php
    // Lee el contenido del archivo notas.txt
    if (file_exists("notas.txt")){
        $contenido = file("notas.txt");
    }
 
?>
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
                        <h4 class="text-center mt-4">Formulario PHP puro</h4>
                    </div>
                    <div class="card-body">
                        <form action="notas.php" method="post">
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
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Nota</th>
                                <!-- <th>Acciones</th> -->
                            </tr>
                        </thead>
                        <tbody>
<?php
                        if(!empty($contenido)){
                            foreach($contenido as $linea) {
                                // Divide la línea en partes separadas por la coma
                                $partes = explode(",", $linea);
                                // Extrae la fecha, hora y nota de las partes
                                $fecha = trim(explode(":", $partes[0])[1]);
                                $tiempo = trim(explode(":", $partes[1])[1]);
                                $hora = explode("-", $tiempo)[0];
                                $minutos = explode("-", $tiempo)[1];
                                $hora_minutos = $hora . ':' . $minutos;
                                $nota = trim(explode(":", $partes[2])[1]);
                                // Imprime una fila de la tabla con los datos
                                echo "<tr>";
                                echo "<td>$fecha</td>";
                                echo "<td>$hora_minutos</td>";
                                echo "<td>$nota</td>";
                                // echo "<td></td>";
                                echo "</tr>";
                            }
                        } else {
                            ?>
                            <p>No hay ninguna nota aún.
                            Usa el formulario para crearlas</p>
                            <?
                        }
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>