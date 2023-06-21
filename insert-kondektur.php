<?php
include('conn.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];
    $query = "INSERT INTO kondektur (id_kondektur, nama) 
        VALUES('$id_kondektur', '$nama')";
    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
    header('Location: kondektur.php');
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
    <form class="content" action="insert-kondektur.php" method="POST">
        <label>ID Kondektur</label>
        <input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" required="required">
        <label>Nama</label>
        <input type="text" class="form-control" placeholder="nama" name="nama" required="required">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>