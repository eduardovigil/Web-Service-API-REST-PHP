
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
<h1 style="text-align:center;">Crearcion de una perfil de los empleados</h1>
<form method="post">
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
<?php 

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$salario=$_POST['salario'];
$data = array(
    'nombre' => $nombre,
    'apellido' => $apellido,
    'edad' => $edad,
    'salario' => $salario,
);
$json_data = json_encode($data);
$url = 'http://localhost:8000/api/employee';
$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-type: application/json',
        'content' => $json_data
    )
);
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

?>
</body>
</html>