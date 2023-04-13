<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 style="text-align:center;">TModificar los datos de una persona</h1>
<form method="post">
  <label for="id">ID:</label>
  <input type="text" id="id" name="id"><br>
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre"><br>
  <label for="apellido">Apellido:</label>
  <input type="text" id="apellido" name="apellido"><br>
  <label for="edad">Edad:</label>
  <input type="number" id="edad" name="edad"><br>
  <label for="salario">Salario:</label>
  <input type="number" id="salario" name="salario"><br>
  <input type="submit" value="Enviar">
</form>

</body>
</html>
<?php 
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$salario = $_POST['salario'];
$data = array(
    'nombre' => $nombre,
    'apellido' => $apellido,
    'edad' => $edad,
    'salario' => $salario,
);
$json_data = json_encode($data);
$url = 'http://localhost:8000/api/employee/' . $id;
$options = array(
    'http' => array(
        'method' => 'PUT',
        'header' => 'Content-type: application/json',
        'content' => $json_data
    )
);
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);


?>