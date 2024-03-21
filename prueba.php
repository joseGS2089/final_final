<?php
include_once('modelo/productoDAO.php');
$pr = new ProductoDAO();
$rta = $pr->traerDatosProducto();
echo json_encode($rta); // Devolver los datos como JSON
?>
