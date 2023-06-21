<?php
include('conn.php');

$status = '';
$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_trans_upn'])) {
        $id_trans_upn_upd = $_GET['id_trans_upn'];
        $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";
        $result = mysqli_query(connection(), $query);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];
    $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn='$id_trans_upn'";
    $result = mysqli_query(connection(), $sql);

    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    header('Location: trans_upn.php?status=' . $status);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="content">
        <form action="update_trans_upn.php" method="POST">
            <?php while ($data = mysqli_fetch_array($result)) : ?>
            <label>ID Trans UPN</label>
            <input type="text" class="form-control" placeholder="id_trans_upn" name="id_trans_upn"
                value="<?php echo $data['id_trans_upn'];  ?>" required="required" readonly>

            <label>ID Kondektur:</label>
            <select name="id_kondektur">
                <?php
                    $query_kondektur = "SELECT * FROM kondektur";
                    $result_kondektur = mysqli_query(connection(), $query_kondektur);
                    while ($data_kondektur = mysqli_fetch_array($result_kondektur)) {
                        $selected = ($data['id_kondektur'] == $data_kondektur['id_kondektur']) ? 'selected' : '';
                        echo "<option value='" . $data_kondektur['id_kondektur'] . "' " . $selected . ">" . $data_kondektur['nama'] . "</option>";
                    }
                    ?>
            </select>

            <label>ID Bus:</label>
            <select name="id_bus">
                <?php
                    $query_bus = "SELECT * FROM bus";
                    $result_bus = mysqli_query(connection(), $query_bus);
                    while ($data_bus = mysqli_fetch_array($result_bus)) {
                        $selected = ($data['id_bus'] == $data_bus['id_bus']) ? 'selected' : '';
                        echo "<option value='" . $data_bus['id_bus'] . "' " . $selected . ">" . $data_bus['plat'] . "</option>";
                    }
                    ?>
            </select>

            <label>ID Driver:</label>
            <select name="id_driver">
                <?php
                    $query_driver = "SELECT * FROM driver";
                    $result_driver = mysqli_query(connection(), $query_driver);
                    while ($data_driver = mysqli_fetch_array($result_driver)) {
                        $selected = ($data['id_driver'] == $data_driver['id_driver']) ? 'selected' : '';
                        echo "<option value='" . $data_driver['id_driver'] . "' " . $selected . ">" . $data_driver['nama'] . "</option>";
                    }
                    ?>
            </select>

            <label>jumlah KM</label>
            <input type="text" class="form-control" placeholder="jumlah_km" name="jumlah_km"
                value="<?php echo $data['jumlah_km'];  ?>" required="required">

            <label>Tanggal:</label>
            <input type="text" class="form-control" placeholder="tanggal" name="tanggal"
                value="<?php echo $data['tanggal'];  ?>" required="required">

            <input type="submit" name="submit" value="Update">
            <?php endwhile; ?>
        </form>
    </div>

</body>

</html>