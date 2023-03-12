<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "ecommerce");

// Obtener los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];

// Verificar si es un nuevo producto o uno existente
if ($id == "") {
	// Insertar un nuevo producto en la base de datos
	mysqli_query($conexion, "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES ('$nombre', '$descripcion', $precio, '$imagen')");
} else {
	// Actualizar un producto existente en la base de datos
	mysqli_query($conexion, "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio=$precio, imagen='$imagen' WHERE id=$id");
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Redirigir al usuario a la página de inicio
header("Location: index.php");
exit();
?>