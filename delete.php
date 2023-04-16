<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
  $id = $_POST['id'];
  
  $url = 'http://localhost:8000/api/employee/' . $id;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);

  if ($status == 200) {
    // El registro fue eliminado exitosamente
    header('Location: index.php');
    exit;
  } else {
    // Ocurrió un error al eliminar el registro
    echo 'Ocurrió un error al eliminar el registro.';
  }
} else {
  // No se recibió el ID del registro a eliminar
  echo 'No se recibió el ID del registro a eliminar.';
}
?>