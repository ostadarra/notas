<?php
// Verifica si se ha enviado alguna nota
if(isset($_POST['nota'])) {
    // Obtiene la nota enviada desde el formulario
    $nota = $_POST['nota'];

    // Obtiene la fecha y hora actuales
    date_default_timezone_set('Europe/Madrid'); // Establece la zona horaria, ajusta según sea necesario
    $fecha = date('d-m-Y'); 
    $hora = date('H-i-s'); 

    // Concatena la fecha y la hora con la nota
    $contenidoNota = "Fecha: $fecha, Hora: $hora, Nota: $nota\n";

    // Guarda la nota en el archivo notas.txt
    $archivo = 'notas.txt';
    // Abre el archivo en modo de escritura al final del archivo (append)
    $gestorArchivo = fopen($archivo, 'a');
    // Escribe la nota en el archivo
    fwrite($gestorArchivo, $contenidoNota);
    // Cierra el archivo
    fclose($gestorArchivo);
?>
<script>
    window.location.replace("index.php");
</script>

<?
} else {
    echo "Error: No se ha recibido ninguna nota.";
}
?>