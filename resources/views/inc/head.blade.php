<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>SMK NEGRI 5 KENDAL</title>
<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
<link href="{{asset('admin/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('admin/assets/js/loader.js')}}"></script>
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/table/datatable/dt-global_style.css')}}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../assets/img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Paper Dashboard 2 by Creative Tim</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
<link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<link href="{{asset('admin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/select2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/bootstrap-select/bootstrap-select.min.css')}}">
<link href="{{asset('admin/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/dropify/dropify.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

<script src="{{asset('admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<!-- Bootstrap JavaScript dan dependensinya -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Skrip JavaScript untuk menangani perubahan status aktif -->
<script>
    //untuk nampilih gambar
    document.addEventListener("DOMContentLoaded", function() {
        const fileNameDisplay = document.getElementById('fileName');
        const imagePreview = document.getElementById('imagePreview');
        const input = document.querySelector('input[type="file"]'); // Menemukan elemen input file
        const imagePreviewImg = document.createElement('img'); // Membuat elemen img untuk pratinjau gambar
        imagePreview.appendChild(imagePreviewImg);

        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                fileNameDisplay.textContent = file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        // Hitung skala untuk mengatur ukuran gambar menjadi 3x3 cm
                        const scaleFactor = 300 / Math.max(img.width, img.height);
                        canvas.width = img.width * scaleFactor;
                        canvas.height = img.height * scaleFactor;

                        // Gambar gambar di atas kanvas dengan ukuran yang diubah
                        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                        // Ubah elemen img pratinjau menjadi gambar yang telah dimanipulasi
                        imagePreviewImg.src = canvas.toDataURL('image/jpeg');

                        // Tampilkan elemen pratinjau gambar
                        imagePreview.style.display = 'block';
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = "Tidak ada file yang dipilih";
                // Sembunyikan elemen pratinjau gambar jika tidak ada file yang dipilih
                imagePreview.style.display = 'none';
            }
        });
    });
//untuk ubah nama dari masukan gambar ke namafile yang dimasukan
    function previewImage() {
        var fileInput = document.querySelector('.custom-file-container__custom-file__custom-file-input');
        var browseText = document.getElementById('browseText');
        var fileName = document.getElementById('fileName');
        var preview = document.getElementById('imagePreview');

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
                fileName.textContent = 'Nama File: ' + fileInput.files[0].name;
                browseText.textContent = 'Ubah Gambar';
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            preview.innerHTML = '';
            fileName.textContent = 'Tidak ada file yang dipilih';
            browseText.textContent = 'Browse';
        }
    }
//multiple untuk prodi yang dipilih dosen
    document.addEventListener("DOMContentLoaded", function() {
        let selectedProgdis = []; // Array untuk menyimpan progdi yang dipilih

        // Fungsi untuk memperbarui tampilan label dengan data yang dipilih
        function updateSelectedProgdis() {
            document.getElementById('selectedProgdis').innerText = selectedProgdis.join(', ');
        }

        // Event listener untuk memantau perubahan pada dropdown
        document.querySelector('select[name="progdi[]"]').addEventListener('change', function(event) {
            const selectedOptions = event.target.selectedOptions;
            selectedProgdis = []; // Reset array
            for (let i = 0; i < selectedOptions.length; i++) {
                selectedProgdis.push(selectedOptions[i].innerText.trim()); // Menambahkan teks opsi yang dipilih ke dalam array
            }
            updateSelectedProgdis(); // Memperbarui tampilan label
        });
    });
</script>


<style>
    .layout-px-spacing {
        min-height: calc(100vh - 166px) !important;
    }

    .bootstrap-select {
        display: flex !important;
        width: auto !important;
    }
</style>