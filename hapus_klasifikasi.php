<?php
include 'conn.php';

$id = $_GET['id'];

$query = "DELETE FROM klasifikasi WHERE id = '$id'";

if (mysqli_query($conn, $query)) {
  echo "<script>alert('Data berhasil dihapus'); window.location='form-testing.php'</script>";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
    