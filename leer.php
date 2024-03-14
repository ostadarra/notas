<?php
// Lee el contenido del archivo notas.txt
if (file_exists("notas.txt")) {
    $contenido = file("notas.txt");
}

// Verifica si hay contenido en el archivo
if (!empty($contenido)) {
    // Itera sobre cada línea del contenido
    foreach ($contenido as $linea) {
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
        echo "</tr>";
    }
} else {
    // Si no hay contenido en el archivo, imprime un mensaje indicando que no hay notas
    echo "<tr><td colspan='3'>No hay notas disponibles.</td></tr>";
}
?>