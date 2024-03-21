<?php
include_once ('../modelo/productoDAO.php');


// Verificar si los campos 'nombre' y 'descripcion' están presentes en la solicitud POST
if (isset($_POST['nombre']) && isset($_POST['Textarea'])) {
    // Obtener los datos del formulario enviado mediante FormData
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['Textarea'];
    // Crear una instancia de ProductoDAO con los datos del producto
    $pr = new ProductoDAO($nombre, $descripcion);

    // Llamar al método para actualizar el producto en la base de datos
    $rta = $pr->actualizarProducto();

    // Verificar si la actualización fue exitosa y enviar una respuesta al cliente
    if ($rta) {
        echo "El cambio fue agregado correctamente";
    } else {
        echo "Error al actualizar el producto";
    }
} else {
    echo "Error: Los campos 'nombre' y 'descripcion' no están definidos en la solicitud POST";
}
?>