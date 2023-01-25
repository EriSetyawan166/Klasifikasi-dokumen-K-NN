<?php
include 'conn.php';
$id = $_POST['id'];
$nama = $_POST['nama'];

$query = "UPDATE klasifikasi SET nama = '$nama' WHERE id = '$id'";
$result = mysqli_query($conn, $query);
if($result){
    echo"<script>alert('Data berhasil diperbarui'); window.location='form-testing.php'</script>";
}else{
    echo "Gagal mengupdate klasifikasi";
}
?>
