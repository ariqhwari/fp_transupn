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
            <h2>Kondektur</h2>
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
                    <th>ID Kondektur</th>
                    <th>Nama</th>
                    <th>Opsi</th>
                </tr>
                <div class="buttons">
                    <button class="pertama" onclick="location.href='insert-kondektur.php'">Insert</button>
                    <button class="kedua" onclick="location.href='pendapatan-kondektur.php'">Pendapatan</button>
                </div>
                <?php
                $query = "SELECT * FROM kondektur";
                $result = mysqli_query(connection(), $query);
                ?>

                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td>
                            <?php
                            echo $data['id_kondektur'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $data['nama'];
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo "update_kondektur.php?id_kondektur=" . $data['id_kondektur']; ?>" class="update-button">Update</a>
                            <a href="<?php echo "hapus_kondektur.php?id_kondektur=" . $data['id_kondektur']; ?>" class="delete-button">Delete</a>
                        </td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>

</html>