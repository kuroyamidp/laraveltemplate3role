	<!--  BEGIN SIDEBAR  -->
	<div class="sidebar-wrapper sidebar-theme">

		<nav id="sidebar">
			<div class="shadow-bottom"></div>
			<ul class="list-unstyled menu-categories" id="accordionExample">
				<li class="menu">
					<a href="/home" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
								<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
								<polyline points="9 22 9 12 15 12 15 22"></polyline>
							</svg>
							<span>Dashboard</span>
						</div>
					</a>
				</li>
				@IsAdmin
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
						<li><a href="/matakuliah"> Mata kuliah</a></li>
						<li><a href="/ruangkelas"> Ruang kelas</a></li>
						<li><a href="/progdi"> Progdi </a></li>
						<li><a href="/dosen"> Dosen </a></li>
						<li><a href="/mahasiswa"> Mahasiswa </a></li>

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
							<span>Kelas</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
						<li>
							<a href="/daftar-kelas"> Semua kelas </a>
						</li>
						<li>
							<a href="/jadwal-kelas"> Jadwal kelas </a>
						</li>
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
							<a href="/user-mahasiswa"> User mahasiswa </a>
						</li>

					</ul>
				</li>
				@endIsAdmin
				@IsMahasiswa
				<li class="menu">
					<a href="/krs" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
								<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
								<polyline points="9 22 9 12 15 12 15 22"></polyline>
							</svg>
							<span>KRS</span>
						</div>
					</a>
				</li>
				@endIsMahasiswa
			</ul>
		</nav>

	</div>
	<!-- </div> -->