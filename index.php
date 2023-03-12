<!DOCTYPE html>
<html>
<head>
	<title>Productos de Tecnología</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
	<h1 class="mb-3">Productos de Tecnología</h1>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Precio</th>
				<th>Imagen</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// Conectar a la base de datos
			$conexion = mysqli_connect("localhost", "root", "", "ecommerce");

			// Consultar los productos
			$resultado = mysqli_query($conexion, "SELECT * FROM productos");

			// Mostrar los productos en una tabla
			while ($producto = mysqli_fetch_array($resultado)) {
				echo "<tr>";
				echo "<td>" . $producto['id'] . "</td>";
				echo "<td>" . $producto['nombre'] . "</td>";
				echo "<td>" . $producto['descripcion'] . "</td>";
				echo "<td>" . $producto['precio'] . "</td>";
				echo "<td><img src='" . $producto['imagen'] . "'></td>";
				echo "<td>";
				echo "<a class='btn btn-success mx-1' href='editar.php?id=" . $producto['id'] . "'><i class='fa-sharp fa-solid fa-pen'></i></a>";
                echo "<a class='btn btn-danger mx-1' href='eliminar.php?id=" . $producto['id'] . "'><i class='fa-sharp fa-solid fa-trash'></i></a>";

				echo "</td>";
				echo "</tr>";
			}

			// Cerrar la conexión a la base de datos
			mysqli_close($conexion);
			?>
		</tbody>
	</table>
	<a href="agregar.php" class="btn btn-primary">Agregar un nuevo producto</a>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/0477044c9a.js" crossorigin="anonymous"></script>
</body>
</html>