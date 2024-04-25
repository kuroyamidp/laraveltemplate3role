<style>
	.nav .active {
		background-color: rgba(0, 0, 0, 0.3);
		/* Warna latar belakang untuk item aktif dengan opasitas 50% */
	}

	.nav .nav-item.active .nav-link {
		transition: background-color 1s ease;
		/* Atur transisi untuk background-color */
	}
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
							<a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
								<div class="">
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
								<li><a href="/dosen"> Guru </a></li>
								<li><a href="/mahasiswa"> Siswa </a></li>

							</ul>
						</li>
						<li class="menu">
							<a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
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
							<a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
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
								<!-- <li class="menu">
									<a href="/krs" aria-expanded="false" class="dropdown-toggle">
										<div class="">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
												<path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
											</svg>
											<span>KRS</span>
										</div>
									</a>
								</li>
								<li class="menu">
									<a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
										<div class="">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-event" viewBox="0 0 16 16">
												<path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
												<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
												<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
											</svg>
											<span>Jadwal Kuliah</span>
										</div>
										<div>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
												<polyline points="9 18 15 12 9 6"></polyline>
											</svg>
										</div>
									</a>
									<ul class="collapse submenu list-unstyled" id="components" data-parent="#accordionExample">
										<li>
										<a href="/lihatjadwal">Semua Mata Kuliah</a>
										</li>
										<li>
											<a href="/semesterini"> Mata Kuliah Semester Ini </a>
										</li>
									</ul>
								</li>
								<li class="menu">
									<a href="/lihatjadwalujian" aria-expanded="false" class="dropdown-toggle">
										<div class="">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
												<path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
												<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
											</svg>
											<span>Jadwal Ujian</span>
										</div>
									</a>
								</li>

								<li class="menu">
									<a href="/khs" aria-expanded="false" class="dropdown-toggle">
										<div class="">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
												<path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
											</svg>
											<span>KHS</span>
										</div>
									</a>
								</li>
								<li class="menu">
									<a href="" aria-expanded="false" class="dropdown-toggle">
										<div class="">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
												<path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
											</svg>
											<span>Transkip Nilai</span>
										</div>
									</a>
								</li>
								<li class="menu">
									<a href="/daftarsidang" aria-expanded="false" class="dropdown-toggle">
										<div class="">

											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
												<path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z" />

											</svg>
											<span>Daftar Sidang</span>
										</div>
									</a>
								</li>

								<li class="menu">
									<a href="/daftarwisuda" aria-expanded="false" class="dropdown-toggle">
										<div class="">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
												<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
												<path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
											</svg>
											<span>Daftar Wisuda</span>
										</div>
									</a>
								</li> -->
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
											<!-- <li class="menu">
												<a href="/lihatjadwal" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
													<div class="">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-event" viewBox="0 0 16 16">
															<path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
															<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
															<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
														</svg>
														<span>Jadwal Kuliah</span>
													</div>
												</a>
											<li class="menu">
												<a href="" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
													<div class="">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-event" viewBox="0 0 16 16">
															<path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
															<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
															<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
														</svg>
														<span>Jadwal Ujian</span>
													</div>
												</a>
											<li class="menu">
												<a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
													<div class="">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-event" viewBox="0 0 16 16">
															<path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
															<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
															<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
														</svg>
														<span>Input Nilai</span>
													</div>
													<div>
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
															<polyline points="9 18 15 12 9 6"></polyline>
														</svg>
													</div>
												</a>
												<ul class="collapse submenu list-unstyled" id="components" data-parent="#accordionExample">
													<li>
														<a href="/lihatjadwal"> Uts</a>
													</li>
													<li>
														<a href="/semesterini">Uas</a>
													</li>
												</ul>
											</li>
											<li class="menu">
												<a href="" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
													<div class="">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-event" viewBox="0 0 16 16">
															<path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
															<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
															<path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
														</svg>
														<span>Data Mahasiswa</span>
													</div>
												</a> -->
												@endIsDosen
	</nav>
</div>