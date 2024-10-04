 <!-- Vendor JS Files -->
 <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
 <script src="assets/vendor/chart.js/chart.umd.js"></script>
 <script src="assets/vendor/echarts/echarts.min.js"></script>
 <script src="assets/vendor/quill/quill.js"></script>
 <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
 <script src="assets/vendor/tinymce/tinymce.min.js"></script>
 <script src="assets/vendor/php-email-form/validate.js"></script>

 <!-- Template Main JS File -->
 <script src="assets/js/main.js"></script>
 <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
 <script src="{{ asset('assets/js/main.js') }}"></script>
 <!-- SweetAlert Script -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="assets/js/main.js"></script>

  <!-- paper dashboard -->
   
 <script>
     // Konfirmasi penghapusan menggunakan SweetAlert
     function confirmDelete(event) {
         event.preventDefault(); // Mencegah form untuk submit secara default
         const form = event.target; // Ambil form yang di-submit
         const url = form.action; // Ambil URL form
         const csrfToken = form.querySelector('input[name="_token"]').value; // Ambil token CSRF

         Swal.fire({
             title: 'Apakah Anda yakin?',
             text: "Data ini akan dihapus!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Ya, hapus!',
             cancelButtonText: 'Batal'
         }).then((result) => {
             if (result.isConfirmed) {
                 // Jika pengguna mengonfirmasi, kirim form
                 $.ajax({
                     type: 'POST',
                     url: url,
                     data: {
                         '_method': 'DELETE',
                         '_token': csrfToken
                     },
                     success: function(response) {
                         Swal.fire(
                             'Terhapus!',
                             'Data Anda telah dihapus.',
                             'success'
                         ).then(() => {
                             location.reload(); // Reload halaman setelah penghapusan
                         });
                     },
                     error: function(err) {
                         Swal.fire(
                             'Gagal!',
                             'Terjadi kesalahan saat menghapus data.',
                             'error'
                         );
                     }
                 });
             }
         });
     }
 </script>