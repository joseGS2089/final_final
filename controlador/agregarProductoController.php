<?php
include ('../modelo/productoDAO.php');
$pr= new ProductoDAO($_POST['nombre'], $_POST['descripcion'], $_POST['id']);
$rta=$pr->addProductos();
echo ("el producto se ha ingresado exitosamente")
?>