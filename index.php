<script src="asset/vendor/jquery/jquery.min.js"></script>


<?php 
include 'conn.php';

$query = "SELECT * FROM dokumen";
$result = mysqli_query($conn, $query);
$dokumen = mysqli_num_rows($result);

$query = "SELECT * FROM klasifikasi";
$result = mysqli_query($conn, $query);
$klasifikasi = mysqli_num_rows($result);

if($dokumen > 0 || $klasifikasi > 0) {
  echo "<script>
  $(document).ready(function() {
      $('#exampleModal').modal('show');
  });
</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KNN</title>

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
                                <!-- Modal -->

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sudah ada data</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Sudah ada data di dalam program, lanjutkan langsung ke dashboard?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tidak</button>
                                                <a href="form-testing.php" class="btn btn-primary">Ya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Aplikasi Klasifikasi Menggunakan K Nearest
                                            Neighbour</h1>
                                        <h1 class="h4 text-gray-900 mb-4">UAS Strategi Bahasa Alamiah Kelompok 8</h1>


                                        <p>Muhammad Eri Setyawan - 2011501778</p>
                                        <p>Dzulfikar Saif assalam - 2011500770</p>

                                    </div>

                                    <hr>
                                    <div class="text-center">
                                        <a href="form.php" class="btn btn-primary btn-lg active" role="button"
                                            aria-pressed="true">Mulai</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

</body>

</html>