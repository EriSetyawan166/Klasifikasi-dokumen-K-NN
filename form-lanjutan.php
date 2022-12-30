<?php
  // Get the classification types and documents from the query parameters
  $classificationTypes = $_GET['classificationTypes'];
  $encodedDocuments = $_GET['documents'];

  // Decode the encoded JSON string and parse it into a PHP array
  $documents = json_decode(urldecode($encodedDocuments), true);
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
      <h1 class="h4 text-gray-900 mb-4">Form Dokumen</h1> 
    </div>

    <!-- Tambahkan tabel di sini -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nomor</th>
          <th scope="col">Teks</th>
          <th scope="col">Jenis Klasifikasi</th>
        </tr>
      </thead>
      <tbody>
        <!-- Buat baris tabel untuk setiap dokumen -->
        <?php $i = 1; ?>
        <?php foreach ($documents as $document): ?>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $document['text']; ?></td>
            <td><?php echo $document['classification']; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

</body>

</html>

<script>
  // Get the classification types and documents from the query parameters
  const searchParams = new URLSearchParams(window.location.search);
  const classificationTypes = searchParams.get('classificationTypes');
  const encodedDocuments = searchParams.get('documents');

  // Decode the encoded JSON string and parse it into a JavaScript object
  const documents = JSON.parse(decodeURIComponent(encodedDocuments));

  // Log the classification types and documents to the console for testing
  console.log(classificationTypes);
  console.log(documents);
</script>