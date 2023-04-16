<?php
// Consumir la API REST de Laravel y obtener la respuesta como un array de objetos
$url = 'http://localhost:8000/api/employee';
$response = file_get_contents($url);
$data = json_decode($response);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Consumo de la API REST</title>
</head>
<body>
    <h1 style="text-align:center;">Tabla de datos de los empleados</h1>
</br>
<table class="table table-dark table-striped" style="height: 200px; text-align:center position:relative; margin:auto; width:50%;">
<thead class="p-2 bd-highlight">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Edad</th>
    <th>Salario</th>
    <th>Acciones</th>
</tr>
</thead>
<tbody class="p-2 bd-highlight">
<?php foreach ($data as $dato): ?>
      <tr>
        <td><?php echo $dato->id; ?></td>
        <td><?php echo $dato->nombre; ?></td>
        <td><?php echo $dato->apellido; ?></td>
        <td><?php echo $dato->edad; ?></td>
        <td><?php echo $dato->salario; ?></td>
        <td>
          <form action="delete.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dato->id; ?>">
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
</tbody>
</table>
<a href="create.php"><input type="button" value="Crear usuario" class="btn btn-primary" style="margin: auto; display: flex; margin-top: 10px;"></a>
<a href="update.php"><button type="button" class="btn btn-success" style="margin: auto; display: flex; margin-right: 550px; margin-top: -37px;">Editar</button></a>
</body>
</html>