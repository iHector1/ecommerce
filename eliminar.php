<!DOCTYPE html>
<html>
<head>
	<title>Eliminar un producto existente</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
	<h1 class='mb-3'>Eliminar un producto existente</h1>
	<?php
	// Conectar a la base de datos
	$conexion = mysqli_connect("localhost", "root", "", "ecommerce");

	// Obtener el ID del producto a eliminar
	$id = $_GET['id'];

	// Obtener los datos del producto a eliminar
	$resultado = mysqli_query($conexion, "SELECT * FROM productos WHERE id=$id");
	$producto = mysqli_fetch_array($resultado);

	// Eliminar el producto de la base de datos
	mysqli_query($conexion, "DELETE FROM productos WHERE id=$id");

	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);
	?>
	<p>El siguiente producto ha sido eliminado:</p>
	<table class='table'>
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Precio</th>
				<th>Imagen</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $producto['id']; ?></td>
				<td><?php echo $producto['nombre']; ?></td>
				<td><?php echo $producto['descripcion']; ?></td>
				<td><?php echo $producto['precio']; ?></td>
				<td><img src="<?php echo $producto['imagen']; ?>"></td>
			</tr>
		</tbody>
	</table>
	<a href="index.php" class="btn btn-primary">Volver a la lista de productos</a>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>