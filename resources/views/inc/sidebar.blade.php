<style>
	.nav .active {
		background-color: rgba(0, 0, 0, 0.3);
		/* Warna latar belakang untuk item aktif dengan opasitas 50% */
	}

	.nav .nav-item.active .nav-link {
		transition: background-color 1s ease;
		/* Atur transisi untuk background-color */
	}
	.sidebar-wrapper1.sidebar-theme {
  background-color: black;
 
}

/* Untuk menyesuaikan warna teks di dalam sidebar */


</style>

<div class="sidebar-wrapper1 sidebar-theme">
	<nav id="sidebar">
		<div class="shadow-bottom"></div>
		<ul class="list-unstyled menu-categories" id="accordionExample">
			@IsAdmin
			<div class="wrapper">
				<div class="sidebar" data-color="white" data-active-color="danger">
					<div class="logo">
						<a href="https://www.creative-tim.com" class="simple-text logo-mini">
							<div class="logo-image-small">
								<img src="../assets/img/skema.jpeg">
							</div>
						</a>
						<a href="/home" class="simple-text logo-normal" style="font-weight: bold;">
							SISKEMA
						</a>

					</div>
					<div class="sidebar-wrapper">
						<li class="menu">
							<a href="/home" aria-expanded="false" class="dropdown-toggle">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
										<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
										<polyline points="9 22 9 12 15 12 15 22"></polyline>
									</svg>
									<span>Dashboard</span>
								</div>
							</a>
						</li>
						<li class="menu">
							<a href="#components" data-toggle="collapse1" aria-expanded="false" class="dropdown-toggle">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
										<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
										<polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
										<line x1="12" y1="22.08" x2="12" y2="12"></line>
									</svg>
									<span>Master data</span>
								</div>
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
										<polyline points="9 18 15 12 9 6"></polyline>
									</svg>
								</div>
							</a>
							<ul class="collapse submenu list-unstyled" id="components" data-parent="#accordionExample">
								<li><a href="/matakuliah"> Mapel</a></li>
								<li><a href="/kelas"> Kelas</a></li>
								<li><a href="/ruangkelas"> Ruang kelas</a></li>
								<li><a href="/progdi"> Jurusan </a></li>
								<li><a href="/waktu"> Waktu </a></li>
								<!-- <li><a href="/dosen"> Guru </a></li>
      						  <li><a href="/mahasiswa"> Siswa </a></li> -->
							</ul>
						</li>

						<li class="menu">
							<a href="/mahasiswa" aria-expanded="false" class="dropdown-toggle">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
										<path d="M17 8a4 4 0 0 1 4-4M2 15s3-1 5-1c2 0 5 1 5 1M6 9a7.5 7.5 0 0 1 9 0"></path>
										<circle cx="12" cy="4" r="2"></circle>
										<circle cx="12" cy="15" r="9"></circle>
									</svg>
									<span>Siswa</span>
								</div>
							</a>
						</li>
						<li class="menu">
							<a href="/dosen" aria-expanded="false" class="dropdown-toggle">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
										<circle cx="12" cy="7" r="4"></circle>
										<path d="M5 22h14a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-4l-3-3-3 3H5a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2z"></path>
									</svg>
									<span>Guru</span>
								</div>
							</a>
						</li>


						<li class="menu">
							<a href="#app" data-toggle="collapse1" aria-expanded="false" class="dropdown-toggle">
								<div class="">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu">
										<rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
										<rect x="9" y="9" width="6" height="6"></rect>
										<line x1="9" y1="1" x2="9" y2="4"></line>
										<line x1="15" y1="1" x2="15" y2="4"></line>
										<line x1="9" y1="20" x2="9" y2="23"></line>
										<line x1="15" y1="20" x2="15" y2="23"></line>
										<line x1="20" y1="9" x2="23" y2="9"></line>
										<line x1="20" y1="14" x2="23" y2="14"></line>
										<line x1="1" y1="9" x2="4" y2="9"></line>
										<line x1="1" y1="14" x2="4" y2="14"></line>
									</svg>
									<span>Penjadwalan</span>
								</div>
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
										<polyline points="9 18 15 12 9 6"></polyline>
									</svg>
								</div>
							</a>
							<ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
								<li>
									<a href="/daftar-kelas"> Jadwal Kelas </a>
								</li>
								<li>
									<a href=""> Optimize Jadwal </a>
								</li>
								<li>
									<a href="/absensi"> Absensi </a>
								</li>
								<!-- <li>
									<a href="/jadwal-kelas"> Jadwal kelas </a>
								</li>
								<li>
									<a href="/jadwalujian"> Jadwal Ujian </a>
								</li>
								<li>
									<a href="/nilaiujian"> Nilai Ujian </a>
								</li> -->
							</ul>
						</li>
						<li class="menu">
							<a href="#users" data-toggle="collapse1" aria-expanded="false" class="dropdown-toggle">
								<div class="">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
										<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
										<polyline points="22 4 12 14.01 9 11.01"></polyline>
									</svg>
									<span>Data pengguna</span>
								</div>
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
										<polyline points="9 18 15 12 9 6"></polyline>
									</svg>
								</div>
							</a>
							<ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
								<li>
									<a href="/user-mahasiswa"> User Siswa </a>
								</li>
								<li>
									<a href="/user-dosen"> User Guru </a>
								</li>
							</ul>
						</li>

					</div>
					@endIsAdmin
					@IsMahasiswa
					<div class="wrapper">
						<div class="sidebar" data-color="white" data-active-color="danger">
							<div class="logo">
								<a href="https://www.creative-tim.com" class="simple-text logo-mini">
									<div class="logo-image-small">
										<img src="../assets/img/skema.jpeg">
									</div>
								</a>
								<a href="/home" class="simple-text logo-normal" style="font-weight: bold;">
									SISKEMA
								</a>

							</div>
							<div class="sidebar-wrapper">
								<li class="menu">
									<a href="/home" aria-expanded="false" class="dropdown-toggle">
										<div>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
												<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
												<polyline points="9 22 9 12 15 12 15 22"></polyline>
											</svg>
											<span>Dashboard</span>
										</div>
									</a>
								</li>
								<div class="sidebar-wrapper">
									<li class="menu">
										<a href="/absensi" aria-expanded="false" class="dropdown-toggle">
											<div>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
													<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
													<polyline points="9 22 9 12 15 12 15 22"></polyline>
												</svg>
												<span>Absen</span>
											</div>
										</a>
									</li>
									@endIsMahasiswa
									@IsDosen
									<div class="wrapper">
										<div class="sidebar" data-color="white" data-active-color="danger">
											<div class="logo">
												<a href="https://www.creative-tim.com" class="simple-text logo-mini">
													<div class="logo-image-small">
														<img src="../assets/img/skema.jpeg">
													</div>
												</a>
												<a href="/home" class="simple-text logo-normal" style="font-weight: bold;">
													SISKEMA
												</a>

											</div>
											<div class="sidebar-wrapper">
												<li class="menu">
													<a href="/home" aria-expanded="false" class="dropdown-toggle">
														<div>
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
																<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
																<polyline points="9 22 9 12 15 12 15 22"></polyline>
															</svg>
															<span>Dashboard</span>
														</div>
													</a>
												</li>
												<li class="menu">
													<a href="#app" data-toggle="collapse1" aria-expanded="false" class="dropdown-toggle">
														<div class="">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu">
																<rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
																<rect x="9" y="9" width="6" height="6"></rect>
																<line x1="9" y1="1" x2="9" y2="4"></line>
																<line x1="15" y1="1" x2="15" y2="4"></line>
																<line x1="9" y1="20" x2="9" y2="23"></line>
																<line x1="15" y1="20" x2="15" y2="23"></line>
																<line x1="20" y1="9" x2="23" y2="9"></line>
																<line x1="20" y1="14" x2="23" y2="14"></line>
																<line x1="1" y1="9" x2="4" y2="9"></line>
																<line x1="1" y1="14" x2="4" y2="14"></line>
															</svg>
															<span>Penjadwalan</span>
														</div>
														<div>
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
																<polyline points="9 18 15 12 9 6"></polyline>
															</svg>
														</div>
													</a>
													<ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
														<li>
															<a href="/absensi"> Absensi </a>
														</li>
														@endIsDosen
	</nav>
</div>
<script>
	$(document).ready(function() {
		$('.menu a[data-toggle="collapse1"]').click(function() {
			$($(this).attr('href')).collapse('toggle');
		});
	});
</script>