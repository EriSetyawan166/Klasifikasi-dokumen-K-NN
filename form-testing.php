<?php
include 'conn.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">


    <div class="container">
<!-- Outer Row -->
<div class="row justify-content-center">
  <div class="col-xl-10 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Dokumen untuk ditesting</h1> 
              </div>
              <form method="POST">
                <div class="form-group">
                    <label for="kalimat">Masukkan Kalimat</label>
                    <input type="text" class="form-control" name="kalimat" id="kalimat" placeholder="Masukkan Kalimat">
                </div>
                <button type="submit" name="testing" class="btn btn-primary">Testing</button>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_POST['testing'])){   
  $kalimat = $_POST['kalimat'];
  $output = exec("python knn.py $kalimat", $output);
  // Tambahkan kodingan di bawah ini
  $html = "
  <div class='row justify-content-center'>
    <div class='col-xl-10 col-lg-12 col-md-9'>
      <div class='card o-hidden border-0 shadow-lg my-5'>
        <div class='card-body p-0'>
          <!-- Nested Row within Card Body -->
          <div class='row'>
            <div class='col-lg-12'>
              <div class='p-5'>
                <div class='text-center'>
                  <h1 class='h4 text-gray-900 mb-4'>Hasil</h1> 
                </div>Kalimat =    
  ";

  $hasil = "<br>
  <br>
  <br>
  hasil = 
  "
  ;

  // Tampilkan kodingan HTML tersebut
  

  $html2 = "
  <br>
  <a class='btn btn-primary mt-4' href='index.php'>Kembali Ke halaman Awal</a>
  </div>
  
  </div>
</div>
</div>
</div>
</div>
</div>";

echo $html.$kalimat.$hasil.$output.$html2;
}

?>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

</body>

</html>

