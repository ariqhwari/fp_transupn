<?php
include('conn.php');

$status = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_kondektur'])) {
        $id_kondektur_upd = $_GET['id_kondektur'];
        $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";
        $result = mysqli_query(connection(), $query);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];
    $sql = "UPDATE kondektur SET id_kondektur='$id_kondektur', nama='$nama' WHERE id_kondektur='$id_kondektur'";
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    header('Location: kondektur.php?status=' . $status);
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
            <h2>Form Kondektur</h2>
        </div>
        <div class="kanan">
            <a href="<?php echo "bus.php"; ?>">Bus</a>
            <a href="<?php echo "driver.php"; ?>">Driver</a>
            <a href="<?php echo "kondektur.php"; ?>">Kondektur</a>
            <a href="<?php echo "trans_upn.php"; ?>">Trans Upn</a>
        </div>
    </div>
    <div class="content"">
    <form action=" update_kondektur.php" method="POST">
        <?php while ($data = mysqli_fetch_array($result)) : ?>
        <label>Id Kondektur:</label>
        <input type="text" placeholder="id_kondektur" name="id_kondektur" value="<?php echo $data["id_kondektur"]; ?>"
            required="required" readonly>

        <label>Nama:</label>
        <input type="text" placeholder="nama" name="nama" value="<?php echo $data["nama"]; ?>" required="required">

        <input type="submit" name="submit" value="Update">
        <?php endwhile; ?>
        </form>
    </div>
</body>

</html>