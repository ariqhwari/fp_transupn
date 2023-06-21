<?php
include('conn.php');

$status = '';
$result = '';
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id_bus"])) {
        $id_bus_upd = $_GET["id_bus"];
        $query = "SELECT * FROM bus WHERE id_bus = '$id_bus_upd'";
        $result = mysqli_query(connection(), $query);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_bus = $_POST["id_bus"];
    $plat = $_POST["plat"];
    $status = $_POST["status"];
    $sql = "UPDATE bus SET  plat='$plat', status='$status' WHERE id_bus='$id_bus'";
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        $status = "ok";
    } else {
        $status = "err";
    }

    header("Location: bus.php");
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
    <form action=" update_bus.php" method="POST">
        <?php while ($data = mysqli_fetch_array($result)) : ?>
        <label>Id Bus:</label>
        <input type="text" placeholder="id_bus" name="id_bus" value="<?php echo $data["id_bus"]; ?>" required="required"
            readonly>

        <label>Plat:</label>
        <input type="text" placeholder="plat" name="plat" value="<?php echo $data["plat"]; ?>" required="required">

        <label>Status:</label>
        <select name="status" required>
            <option value="1" <?php if ($data["status"] == 1) {
                                        echo "selected";
                                    } ?>>Aktif</option>
            <option value="2" <?php if ($data["status"] == 2) {
                                        echo "selected";
                                    } ?>>Perbaikan</option>
            <option value="0" <?php if ($data["status"] == 0) {
                                        echo "selected";
                                    } ?>>Nonaktif</option>
        </select>

        <input type="submit" name="submit" value="Update">
        <?php endwhile; ?>
        </form>
    </div>
</body>

</html>