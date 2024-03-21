<?php
include ('../modelo/productoDAO.php');
$pr = new ProductoDAO($_POST['id']);
$rta=$pr->traerDatosProductoXid();
echo (json_encode($rta));
?>