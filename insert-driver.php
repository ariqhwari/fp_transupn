<?php
include('conn.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_driver = $_POST['id_driver'];
  $nama = $_POST['nama'];
  $no_sim = $_POST['no_sim'];
  $alamat = $_POST['alamat'];

  $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) 
        VALUES('$id_driver', '$nama', '$no_sim', '$alamat')";
  $result = mysqli_query(connection(), $query);
  if ($result) {
    $status = 'ok';
  } else {
    $status = 'err';
  }
  header('Location: driver.php');
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
            <h2>Form Driver</h2>
        </div>
        <div class="kanan">
            <a href="<?php echo "bus.php"; ?>">Bus</a>
            <a href="<?php echo "driver.php"; ?>">Driver</a>
            <a href="<?php echo "kondektur.php"; ?>">Kondektur</a>
            <a href="<?php echo "trans_upn.php"; ?>">Trans Upn</a>
        </div>
    </div>
    <form class="content" action="insert-driver.php" method="POST">
        <label>ID Driver</label>
        <input type="text" class="form-control" placeholder="id_driver" name="id_driver" required="required">
        <label>Nama</label>
        <input type="text" class="form-control" placeholder="nama" name="nama" required="required">
        <label>No Sim</label>
        <input type="text" class="form-control" placeholder="no_sim" name="no_sim" required="required">
        <label>Alamat</label>
        <input type="text" class="form-control" placeholder="alamat" name="alamat" required="required">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>