<?php
include('conn.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_bus = $_POST['id_bus'];
  $plat = $_POST['plat'];
  $status = $_POST['status'];

  $query = "INSERT INTO bus (id_bus, plat, status) 
        VALUES('$id_bus', '$plat', '$status')";
  $result = mysqli_query(connection(), $query);
  if ($result) {
    $status = 'ok';
  } else {
    $status = 'err';
  }
  header('Location: bus.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Trans UPN</title>
</head>

<body>
  <div class="navbar">
    <div class="kiri">
      <h2>Form Bus</h2>
    </div>
    <div class="kanan">
      <a href="<?php echo "bus.php"; ?>">Bus</a>
      <a href="<?php echo "driver.php"; ?>">Driver</a>
      <a href="<?php echo "kondektur.php"; ?>">Kondektur</a>
      <a href="<?php echo "trans_upn.php"; ?>">Trans Upn</a>
    </div>
  </div>
  <div class="content"">
    <form action=" insert-bus.php" method="POST">
    <label for="id_bus">Id Bus:</label>
    <input type="text" placeholder="id_bus" name="id_bus" required="required">

    <label for="plat">Plat:</label>
    <input type="text" placeholder="plat" name="plat" required="required">

    <label>Status:</label>
    <select name="id_driver">
      <option value="1">Aktif</option>
      <option value="2">Perbaikan</option>
      <option value="0">Tidak Aktif</option>
    </select>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>