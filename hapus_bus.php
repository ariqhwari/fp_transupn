<?php
include('conn.php');
$id_bus = $_GET['id_bus'];

$query1 = "DELETE FROM trans_upn WHERE id_bus='$id_bus'";
$result1 = mysqli_query(connection(), $query1);

$query2 = "DELETE FROM bus WHERE id_bus='$id_bus'";
$result2 = mysqli_query(connection(), $query2);

if ($result2) {
    header("Location:bus.php");
} else {
    echo "Error deleting record: " . mysqli_error(connection());
}