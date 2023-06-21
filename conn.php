<?php
function connection()
{
   global $conn;
   $dbName = "transupn";
   $conn = mysqli_connect("localhost", "ariq", "", "transupn");
   mysqli_select_db($conn, $dbName);

   return $conn;
}
