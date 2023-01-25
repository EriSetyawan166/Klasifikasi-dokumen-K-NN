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
                                            <input type="text" class="form-control" name="kalimat" id="kalimat"
                                                placeholder="Masukkan Kalimat">
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

        <div class="text-center">
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal"
                data-target="#daftarDokumenModal">Daftar Dokumen</button>
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#daftarKlasifikasiModal">Daftar Klasifikasi</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="daftarDokumenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar Dokumen</h5>


                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#tambahDokumenModal">Tambah Dokumen</button>
                        <table class="table table-bordered table-striped table-hover table-layout:fixed">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="width:72%">Teks</th>
                                    <th>Klasifikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                      // Kodingan untuk menampilkan data dari tabel dokumen dan klasifikasi
                                      $query = "SELECT dokumen.id, dokumen.teks, dokumen.klasifikasi_id, klasifikasi.nama FROM dokumen INNER JOIN klasifikasi ON dokumen.klasifikasi_id = klasifikasi.id";
                                      $result = mysqli_query($conn, $query);
                                      $no = 1;
                                      while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['teks']; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editDokumenModal" data-id="<?php echo $row['id']; ?>"
                                            data-teks="<?php echo $row['teks']; ?>"
                                            data-klasifikasi_id="<?php echo $row['klasifikasi_id']; ?>">Edit</button>
                                        <a href="hapus_dokumen.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="daftarKlasifikasiModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar Klasifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#tambahKlasifikasiModal">Tambah Klasifikasi</button>
                        <table class="table table-bordered table-striped table-hover table-layout:fixed">
                            <thead>
                                <tr>
                                    <th style="width:5%">No</th>
                                    <th>Nama</th>
                                    <th style="width:17%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  // Kodingan untuk menampilkan data dari tabel klasifikasi
                                  $query = "SELECT * FROM klasifikasi";
                                  $result = mysqli_query($conn, $query);
                                  $no = 1;
                                  while($row = mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editKlasifikasiModal" data-id="<?php echo $row['id']; ?>"
                                            data-nama="<?php echo $row['nama']; ?>">Edit</button>
                                        <a href="hapus_klasifikasi.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tambahDokumenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Dokumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="insert_dokumen.php">
                            <div class="form-group">
                                <label for="teks">Teks</label>
                                <textarea class="form-control" name="teks" id="teks" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="klasifikasi_id">Klasifikasi</label>
                                <select class="form-control" name="klasifikasi_id" id="klasifikasi_id">
                                    <?php
                                      $query = mysqli_query($conn, "SELECT id, nama FROM klasifikasi");
                                      while ($data = mysqli_fetch_array($query)) {
                                        echo "<option value='" . $data['id'] . "'>" . $data['nama'] . "</option>";
                                      }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tambahKlasifikasiModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Klasifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="insert_klasifikasi.php">
                            <div class="form-group">
                                <label for="nama">Nama Klasifikasi</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Masukkan nama klasifikasi">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editDokumenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Dokumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="update_dokumen.php">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="teks">Teks</label>
                                <textarea class="form-control" name="teks" id="teks" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="klasifikasi_id">Klasifikasi</label>
                                <select class="form-control" name="klasifikasi_id" id="klasifikasi_id">
                                    <?php
                                      $query = mysqli_query($conn, "SELECT id, nama FROM klasifikasi");
                                      while ($data = mysqli_fetch_array($query)) {
                                        $selected = ($data['id'] == $klasifikasi_id) ? 'selected' : '';
                                        echo "<option value='" . $data['id'] . "' " . $selected . ">" . $data['nama'] . "</option>";
                                      }
                                    ?>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>


        <div class="modal fade" id="editKlasifikasiModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Klasifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="update_klasifikasi.php">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="nama">Nama Klasifikasi</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Masukkan nama klasifikasi">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                            </div>
                        </form>
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

<script>
$('#editDokumenModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var teks = button.data('teks')
    var klasifikasi_id = button.data('klasifikasi_id')
    console.log(klasifikasi_id)
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #teks').text(teks)
    modal.find('.modal-body #klasifikasi_id').val(klasifikasi_id)
})

$('#editKlasifikasiModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var nama = button.data('nama')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #nama').val(nama)
})
</script>