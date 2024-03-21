<?php
include ('../modelo/productoDAO.php');
$pr = new ProductoDAO();
$rta=$pr->traerDatosProducto ();
echo (json_encode($rta));
?>