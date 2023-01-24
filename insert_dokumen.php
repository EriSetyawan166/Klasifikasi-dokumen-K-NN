<?php
include 'conn.php';

if (isset($_POST['submit'])) {
  $teks = $_POST['teks'];
  $klasifikasi_id = $_POST['klasifikasi_id'];

  $query = "INSERT INTO dokumen (teks, klasifikasi_id) VALUES ('$teks', '$klasifikasi_id')";

  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil ditambahkan'); window.location='form-testing.php'</script>";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
