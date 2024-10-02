 <!-- Vendor JS Files -->
 <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="assets/vendor/chart.js/chart.umd.js"></script>
 <script src="assets/vendor/echarts/echarts.min.js"></script>
 <script src="assets/vendor/quill/quill.js"></script>
 <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
 <script src="assets/vendor/tinymce/tinymce.min.js"></script>
 <script src="assets/vendor/php-email-form/validate.js"></script>

 <!-- Template Main JS File -->
 <script src="assets/js/main.js"></script>
 <!-- ======= Sidebar ======= -->

 <aside id="sidebar" class="sidebar">
 	<ul class="sidebar-nav" id="sidebar-nav">
 		@if (Auth::check() && Auth::user()->role_id == 0)
 		<li class="nav-item">
 			<a class="nav-link" data-bs-target="#forms-nav" href="/home">
 				<i class="bi bi-grid"></i>
 				<span>Dashboard</span>
 			</a>
 		</li>

 		<li class="nav-item">
 			<a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
 				<i class="bi bi-journal-text"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
 			</a>
 			<ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
 				<li>
 					<a href="/mahasiswa">
 						<i class="bi bi-circle"></i><span>Mahasiswa</span>
 					</a>
 				</li>
 				<li>
 					<a href="/dosen">
 						<i class="bi bi-circle"></i><span>Dosen</span>
 					</a>
 				</li>

 				<li>
 					<a href="forms-validation.html">
 						<i class="bi bi-circle"></i><span>Form Validation</span>
 					</a>
 				</li>
 			</ul>
 		</li><!-- End Forms Nav -->

 		<li class="nav-item">
 			<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
 				<i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
 			</a>
 			<ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
 				<li>
 					<a href="tables-general.html">
 						<i class="bi bi-circle"></i><span>General Tables</span>
 					</a>
 				</li>
 				<li>
 					<a href="tables-data.html">
 						<i class="bi bi-circle"></i><span>Data Tables</span>
 					</a>
 				</li>
 			</ul>
 		</li><!-- End Tables Nav -->

 		<li class="nav-heading">Pages</li>

 		<li class="nav-item">
 			<a class="nav-link collapsed" href="users-profile.html">
 				<i class="bi bi-person"></i>
 				<span>Profile</span>
 			</a>
 		</li><!-- End Profile Page Nav -->

 		<li class="nav-item">
 			<a class="nav-link collapsed" href="pages-register.html">
 				<i class="bi bi-card-list"></i>
 				<span>Register</span>
 			</a>
 		</li><!-- End Register Page Nav -->

 		<li class="nav-item">
 			<a class="nav-link collapsed" href="pages-login.html">
 				<i class="bi bi-box-arrow-in-right"></i>
 				<span>Login</span>
 			</a>
 		</li><!-- End Login Page Nav -->
 		@endif
 	</ul>
 </aside><!-- End Sidebar -->
 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script>
	// Jalankan setelah DOM sepenuhnya dimuat
	document.addEventListener('DOMContentLoaded', function() {
		// Ambil URL saat ini, hanya bagian pathname untuk menghindari query string atau hash
		const currentPath = window.location.pathname;
		const menuItems = document.querySelectorAll('#sidebar-nav a');

		menuItems.forEach(item => {
			// Periksa apakah path dari item sesuai dengan currentPath
			if (item.pathname === currentPath) {
				item.classList.add('active'); // Tambahkan kelas active pada item yang sesuai
				let parentCollapse = item.closest('.collapse'); // Cari elemen induk collapse
				if (parentCollapse) {
					parentCollapse.classList.add('show'); // Buka collapse jika item ada di dalamnya
				}
			} else {
				item.classList.remove('active'); // Pastikan item lain tidak memiliki kelas active
			}
		});
	});
</script>
