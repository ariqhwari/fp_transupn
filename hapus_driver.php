<?php
include('conn.php');
$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['id_driver'])) {
    $id_driver = $_GET['id_driver'];
    $query = "DELETE FROM driver WHERE id_driver = '$id_driver'";

    $result = mysqli_query(connection(), $query);

    if ($result) {
      $status = 'ok';
    } else {
      $status = 'err';
    }

    header('Location: driver.php?status=' . $status);
  }
}
