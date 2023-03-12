<!DOCTYPE html>
<html>
<head>
	<title>Editar un producto existente</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<h1>Editar un producto existente</h1>
	<?php
	// Conectar a la base de datos
	$conexion = mysqli_connect("localhost", "root", "", "ecommerce");

	// Obtener el ID del producto a editar
	$id = $_GET['id'];

	// Obtener los datos del producto a editar
	$resultado = mysqli_query($conexion, "SELECT * FROM productos WHERE id=$id");
	$producto = mysqli_fetch_array($resultado);

	// Cerrar la conexión a la base de datos
	mysqli_close($conexion);
	?>
    <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h3>Editar producto</h3>
      </div>
      <div class="card-body">
        <form action="procesar.php" method="POST">
        <div class="mb-3">
            <label for="id" class="form-label">ID del producto</label>
            <input type="text" class="form-control" name="id" id="id" value="<?php echo $producto['id']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo $producto['descripcion']; ?></textarea></textarea>
          </div>
          <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" id="precio" step=".01" required value="<?php echo $producto['precio']; ?>">
          </div>
          <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="text" class="form-control" name="imagen" id="imagen" value="<?php echo $producto['imagen']; ?>">
          </div>
          <input type="submit" class="btn btn-success mt-2" value="Guardar cambios"/>
        </form>
      </div>
    </div>
    <a class="btn btn-primary mt-2" href="index.php">Volver a la lista de productos</a>
  </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>