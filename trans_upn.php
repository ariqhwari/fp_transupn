<?php
include('conn.php');
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
            <h2>Trans Upn</h2>
        </div>
        <div class="kanan">
            <a href="<?php echo "bus.php"; ?>">Bus</a>
            <a href="<?php echo "driver.php"; ?>">Driver</a>
            <a href="<?php echo "kondektur.php"; ?>">Kondektur</a>
            <a href="<?php echo "trans_upn.php"; ?>">Trans Upn</a>
        </div>
    </div>
    <div class="container">
        <table class="rwd-table">
            <tbody>
                <tr>
                    <th>ID Trans UPN</th>
                    <th>ID Kondektur</th>
                    <th>ID Bus</th>
                    <th>ID Driver</th>
                    <th>Jumlah KM</th>
                    <th>Tanggal</th>
                    <th>Opsi</th>
                </tr>
                <div class="buttons">
                    <button onclick="location.href='insert-trans_upn.php'">Insert</button>
                </div>
                <?php
                $query = "SELECT * FROM trans_upn";
                $result = mysqli_query(connection(), $query);
                ?>

                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td>
                            <?php
                            echo $data['id_trans_upn'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $data['id_kondektur'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $data['id_bus'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $data['id_driver'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $data['jumlah_km'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $data['tanggal'];
                            ?>
                        </td>
                        <td class="opsi">
                            <a href="<?php echo "update_trans_upn.php?id_trans_upn=" . $data['id_trans_upn']; ?>" class="update-button">Update</a>
                            <a href="<?php echo "hapus_trans_upn.php?id_trans_upn=" . $data['id_trans_upn']; ?>" class="delete-button">Delete</a>
                        </td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>

</html>