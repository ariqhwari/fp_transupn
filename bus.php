<?php
include "conn.php"; ?>

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
            <h2>Bus</h2>
        </div>
        <div class="kanan">
            <a href="<?php echo "bus.php"; ?>">Bus</a>
            <a href="<?php echo "driver.php"; ?>">Driver</a>
            <a href="<?php echo "kondektur.php"; ?>">Kondektur</a>
            <a href="<?php echo "trans_upn.php"; ?>">Trans Upn</a>
        </div>
    </div>
    <div class="container">
        <table>
            <div class="buttons">
                <button class="buttoninsert" onclick="location.href='insert-bus.php'">Insert</button>
            </div>
            <tbody>
                <tr>
                    <th>ID Bus</th>
                    <th>Plat</th>
                    <th>Status</th>
                    <th>Total KM</th>
                    <th>Action</th>
                </tr>
                <div class="button-container">
                    <?php
                    $query = "SELECT * FROM bus";
                    if (isset($_GET["status"]) && $_GET["status"] != "all") {
                        $status = $_GET["status"];
                        $query .= " WHERE status='$status'";
                    }
                    $result = mysqli_query(connection(), $query);
                    ?>

                    <?php $statuses = [
                        ["id" => "all", "name" => "Semua"],
                        ["id" => "1", "name" => "Aktif"],
                        ["id" => "2", "name" => "Cadangan"],
                        ["id" => "0", "name" => "Rusak"],
                    ]; ?>
                    <form method="GET" style="float: right;">
                        <select name="status" id="status">
                            <?php foreach ($statuses as $status) : ?>
                                <option value="<?php echo $status["id"]; ?>" <?php echo $status["id"] == @$_GET["status"]
                                                                                    ? "selected"
                                                                                    : ""; ?>>
                                    <?php echo $status["name"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit">Filter</button>
                    </form>
                </div>

                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td><?php echo $data["id_bus"]; ?></td>
                        <td><?php echo $data["plat"]; ?></td>
                        <td>
                            <?php
                            $status = $data["status"];
                            if ($status == 1) {
                                $color = "green";
                            } elseif ($status == 2) {
                                $color = "yellow";
                            } elseif ($status == 0) {
                                $color = "red";
                            }
                            echo "<button style='background-color: $color;'>$status</button>";
                            ?>
                        <td>
                            <?php
                            $query_km =
                                "SELECT SUM(jumlah_km) as total_km FROM trans_upn WHERE id_bus=" .
                                $data["id_bus"];
                            $result_km = mysqli_query(connection(), $query_km);
                            $data_km = mysqli_fetch_array($result_km);
                            echo $data_km["total_km"];
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo "update_bus.php?id_bus=" .
                                            $data["id_bus"]; ?>" class="update-button">Update</a>
                            <a href="<?php echo "hapus_bus.php?id_bus=" .
                                            $data["id_bus"]; ?>" class="delete-button">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


</body>

</html>