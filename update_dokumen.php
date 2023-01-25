<?php
include 'conn.php';

$id = $_POST['id'];
$teks = $_POST['teks'];
$klasifikasi_id = $_POST['klasifikasi_id'];

$query = "UPDATE dokumen SET teks = '$teks', klasifikasi_id = '$klasifikasi_id' WHERE id = '$id'";
$hasil = mysqli_query($conn, $query);

if ($hasil) {
    // jika berhasil, redirect ke halaman dokumen.php
    echo"<script>alert('Data berhasil diperbarui'); window.location='form-testing.php'</script>";
} else {
    // jika gagal, tampilkan pesan error
    echo "Gagal mengupdate data: " . mysqli_error($conn);
}
//   $query = "INSERT INTO dokumen (teks, klasifikasi_id) VALUES ('$teks', '$klasifikasi_id')";

//   if (mysqli_query($conn, $query)) {
//     echo "<script>alert('Data berhasil ditambahkan'); window.location='form-testing.php'</script>";
//   } else {
//     echo "Error: " . $query . "<br>" . mysqli_error($conn);
//   }


// mysqli_close($conn);
?>
