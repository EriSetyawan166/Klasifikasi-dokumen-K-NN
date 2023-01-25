<?php
    include 'conn.php';
    $nama = $_POST['nama'];
    $query = "INSERT INTO klasifikasi (nama) VALUES ('$nama')";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"<script>alert('Data berhasil ditambah'); window.location='form-testing.php'</script>";
    }else{
        echo "Gagal menambah klasifikasi";
    }
?>
