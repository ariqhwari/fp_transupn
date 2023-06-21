<?php
include('conn.php');

$status = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_driver'])) {
        $id_driver_upd = $_GET['id_driver'];
        $query = "SELECT * FROM driver WHERE id_driver = '$id_driver_upd'";
        $result = mysqli_query(connection(), $query);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];
    $sql = "UPDATE driver SET  id_driver='$id_driver', nama='$nama', no_sim='$no_sim', alamat='$alamat' WHERE id_driver='$id_driver'";
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    header("Location: driver.php?status='.$status");
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
            <h2>Form Drive</h2>
        </div>
        <div class="kanan">
            <a href="<?php echo "bus.php"; ?>">Bus</a>
            <a href="<?php echo "driver.php"; ?>">Driver</a>
            <a href="<?php echo "kondektur.php"; ?>">Kondektur</a>
            <a href="<?php echo "trans_upn.php"; ?>">Trans Upn</a>
        </div>
    </div>
    <div class="content"">
    <form action=" update_driver.php" method="POST">
        <?php while ($data = mysqli_fetch_array($result)) : ?>
        <label>Id Bus:</label>
        <input type="text" placeholder="id_driver" name="id_driver" value="<?php echo $data["id_driver"]; ?>"
            required="required" readonly>

        <label>Nama:</label>
        <input type="text" placeholder="nama" name="nama" value="<?php echo $data["nama"]; ?>" required="required">

        <label>No Sim:</label>
        <input type="text" placeholder="no_sim" name="no_sim" value="<?php echo $data["no_sim"]; ?>"
            required="required">

        <label>Alamat:</label>
        <input type="text" placeholder="alamat" name="alamat" value="<?php echo $data["alamat"]; ?>"
            required="required">

        <input type="submit" name="submit" value="Update">
        <?php endwhile; ?>
        </form>
    </div>
</body>

</html>