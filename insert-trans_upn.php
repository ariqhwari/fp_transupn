<?php
include('conn.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal) 
        VALUES('$id_trans_upn', '$id_kondektur', '$id_bus','$id_driver','$jumlah_km', '$tanggal')";

    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
    header('Location: trans_upn.php');
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
            <h2>Form Trans UPN</h2>
        </div>
        <div class="kanan">
            <a href="<?php echo "bus.php"; ?>">Bus</a>
            <a href="<?php echo "driver.php"; ?>">Driver</a>
            <a href="<?php echo "kondektur.php"; ?>">Kondektur</a>
            <a href="<?php echo "trans_upn.php"; ?>">Trans Upn</a>
        </div>
    </div>
    <form class="content" action="insert-trans_upn.php" method="POST">
        <label>id_trans_upn</label>
        <input type="text" class="form-control" placeholder="id_trans_upn" name="id_trans_upn" required="required">

        <label>Id Kondektur:</label>
        <select name="id_kondektur">
            <?php
            $query_kondektur = "SELECT * FROM kondektur";
            $result_kondektur = mysqli_query(connection(), $query_kondektur);
            while ($data_kondektur = mysqli_fetch_array($result_kondektur)) {
                echo "<option value='" . $data_kondektur['id_kondektur'] . "'>" . $data_kondektur['nama'] . "</option>";
            }
            ?>
        </select>

        <label>ID Bus:</label>
        <select name="id_bus">
            <?php
            $query_bus = "SELECT * FROM bus";
            $result_bus = mysqli_query(connection(), $query_bus);
            while ($data_bus = mysqli_fetch_array($result_bus)) {
                echo "<option value='" . $data_bus['id_bus'] . "'>" . $data_bus['plat'] . "</option>";
            }
            ?>
        </select>

        <label>ID Driver:</label>
        <select name="id_driver">
            <?php
            $query_driver = "SELECT * FROM driver";
            $result_driver = mysqli_query(connection(), $query_driver);
            while ($data_driver = mysqli_fetch_array($result_driver)) {
                echo "<option value='" . $data_driver['id_driver'] . "'>" . $data_driver['nama'] . "</option>";
            }
            ?>
        </select>

        <label>Jumlah KM</label>
        <input type="text" class="form-control" placeholder="jumlah_km" name="jumlah_km" required="required">

        <label>Tanggal</label>
        <input type="text" class="form-control" placeholder="tanggal" name="tanggal" required="required">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>