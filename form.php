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
<script>
  // Retrieve the classification types and documents from the query string
  const searchParams = new URLSearchParams(window.location.search);
  const classificationTypes = JSON.parse(decodeURIComponent(searchParams.get('classificationTypes').replace(/^\s+/,'')));

  const documents = JSON.parse(decodeURIComponent(searchParams.get('documents')));
  
  // Use the classification types and documents as needed in your code
  console.log(classificationTypes);
  console.log(documents);
</script>

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
              <form>
                <div class="form-group">
                    <label for="classificationTypes">Jenis Klasifikasi</label>
                    <input type="text" class="form-control" id="classificationTypes" placeholder="Masukkan jenis klasifikasi, dipisahkan dengan koma" oninput="updateClassificationOptions()">
                </div>
                <div class="form-group">
                    <label for="numDocuments">Jumlah Dokumen</label>
                    <input type="number" class="form-control" id="numDocuments" placeholder="Masukkan jumlah dokumen" oninput="generateFormFields()" min="0">
                </div>
                <div id="documentFormFields"></div>
                <button type="button" class="btn btn-primary" onclick="submitForm()">Simpan</button>
              </form>
              
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
    function updateClassificationOptions() {
    // Get the classification types from the input field
    const classificationTypes = document.getElementById('classificationTypes').value;

    // Split the classification types on the comma character
    const classificationOptions = classificationTypes.split(',');

    // Update the options for all classification fields
    const classificationFields = document.querySelectorAll('[id^=classification]');
    classificationFields.forEach(field => {
      field.innerHTML = `<option value="">Pilih jenis klasifikasi</option>`;
      classificationOptions.forEach(option => {
        field.innerHTML += `<option value="${option}">${option}</option>`;
      });
    });
  }

  function generateFormFields() {
    // Get the number of documents from the input field
    const numDocuments = document.getElementById('numDocuments').value;

    // Clear any existing form fields
    document.getElementById('documentFormFields').innerHTML = '';

    // Generate the required number of form fields
    for (let i = 0; i < numDocuments; i++) {
      const formFields = `
        <div class="form-row">
          <div class="form-group col-9">
            <label for="text${i}">Teks Dokumen ${i + 1}</label>
            <input type="text" class="form-control" id="text${i}" placeholder="Masukkan teks dokumen">
          </div>
          <div class="form-group col-3">
            <label for="classification${i}">Jenis Klasifikasi ${i + 1}</label>
            <select class="form-control" id="classification${i}"><option value="">Pilih jenis klasifikasi</option></select>
          </div>
        </div>
      `;
      document.getElementById('documentFormFields').innerHTML += formFields;
    }

    // Update the classification options
    updateClassificationOptions();
  }

  function submitForm() {
    // Get the classification types and the number of documents from the input fields
    const classificationTypes = document.getElementById('classificationTypes').value;
    const numDocuments = document.getElementById('numDocuments').value;

    // Initialize an array to store the documents and their classification types
    const documents = [];

    // Iterate over the document form fields and add the text and classification to the documents array
    for (let i = 0; i < numDocuments; i++) {
      const text = document.getElementById(`text${i}`).value;
      const classification = document.getElementById(`classification${i}`).value;
      documents.push({ text, classification });
    }

    // Encode the documents array as a JSON string and URL-encode it
    const encodedDocuments = encodeURIComponent(JSON.stringify(documents));

    // Redirect the user to the next page and pass the classification types and documents as query parameters
    window.location = `form-lanjutan.php?classificationTypes=${classificationTypes}&documents=${encodedDocuments}`;
  }
</script>