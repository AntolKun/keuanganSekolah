<!DOCTYPE html>
<html lang="en">

<head>
	<!--  Title -->
	<title>Keuangan Sekolah | SMAN 1 Gedong Tataan</title>
	<!--  Required Meta Tag -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="handheldfriendly" content="true" />
	<meta name="MobileOptimized" content="width" />
	<meta name="description" content="Web keuangan sekolah SMAN 1 Gedong Tataan" />
	<meta name="author" content="MARZOEKI" />
	<meta name="keywords" content="Web keuangan sekolah SMAN 1 Gedong Tataan" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" type="image/png" href="{{ asset('dist/images/logosma.png') }}" />
	<link rel="stylesheet" href="{{ asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
	<link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
	@yield('css')
</head>

<body>
	<div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
		<aside class="left-sidebar">
			<!-- Sidebar scroll-->
			<div>
				<div class="brand-logo d-flex align-items-center justify-content-between">
					<a href="index.html" class="text-nowrap logo-img">
						<img src="{{ asset('dist/images/logosma.png') }}" class="dark-logo" width="180" alt="" />
						<img src="{{ asset('dist/images/logosma.png') }}" class="light-logo" width="180" alt="" />
					</a>
					<div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
						<i class="ti ti-x fs-8 text-muted"></i>
					</div>
				</div>
				<nav class="sidebar-nav scroll-sidebar" data-simplebar>
					<ul id="sidebarnav">
						<!-- ============================= -->
						<!-- Home -->
						<!-- ============================= -->
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Home</span>
						</li>
						<!-- =================== -->
						<!-- Dashboard -->
						<!-- =================== -->
						<li class="sidebar-item">
							<a class="sidebar-link" href="/" aria-expanded="false">
								<span>
									<i class="ti ti-home"></i>
								</span>
								<span class="hide-menu">Beranda</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dataAdmin" aria-expanded="false">
								<span>
									<i class="ti ti-book"></i>
								</span>
								<span class="hide-menu">Tambah Admin</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dataSiswa" aria-expanded="false">
								<span>
									<i class="ti ti-medal"></i>
								</span>
								<span class="hide-menu">Data Siswa</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dataTahunPelajaran" aria-expanded="false">
								<span>
									<i class="ti ti-medal"></i>
								</span>
								<span class="hide-menu">Data Tahun Pelajaran</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dataPembayaran" aria-expanded="false">
								<span>
									<i class="ti ti-medal"></i>
								</span>
								<span class="hide-menu">Pembayaran SPP</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="/dataPengeluaran" aria-expanded="false">
								<span>
									<i class="ti ti-medal"></i>
								</span>
								<span class="hide-menu">Pengeluaran Sekolah</span>
							</a>
						</li>
					</ul>
				</nav>
				<!-- End Sidebar navigation -->
				<div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
					<div class="hstack gap-3">
						<div class="john-img">
							<img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="40" height="40" alt="">
						</div>
						<div class="john-title">
							<h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
							<span class="fs-2 text-dark">Designer</span>
						</div>
						<button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
							<i class="ti ti-power fs-6"></i>
						</button>
					</div>
				</div>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
		</aside>
		<!--  Sidebar End -->
		<!--  Main wrapper -->
		<div class="body-wrapper">
			<!--  Header Start -->
			<header class="app-header">
				<nav class="navbar navbar-expand-lg navbar-light">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
								<i class="ti ti-menu-2"></i>
							</a>
						</li>
					</ul>
					<div class="d-block d-lg-none">
						<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg" class="dark-logo" width="180" alt="" />
						<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/light-logo.svg" class="light-logo" width="180" alt="" />
					</div>
					<button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="p-2">
							<i class="ti ti-dots fs-7"></i>
						</span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
						<div class="d-flex align-items-center justify-content-between">
							<a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
								<i class="ti ti-align-justified fs-7"></i>
							</a>
							<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
								<li class="nav-item dropdown">
									<a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
										<div class="d-flex align-items-center">
											<div class="user-profile-img">
												<img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="35" height="35" alt="" />
											</div>
										</div>
									</a>
									<div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
										<div class="profile-dropdown position-relative" data-simplebar>
											<div class="py-3 px-7 pb-0">
												<h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
											</div>
											<div class="d-flex align-items-center py-9 mx-7 border-bottom">
												<img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="80" height="80" alt="" />
												<div class="ms-3">
													<h5 class="mb-1 fs-3">Mathew Anderson</h5>
													<span class="mb-1 d-block text-dark">Designer</span>
													<p class="mb-0 d-flex text-dark align-items-center gap-2">
														<i class="ti ti-mail fs-4"></i> info@modernize.com
													</p>
												</div>
											</div>
											<div class="message-body">
												<a href="page-user-profile.html" class="py-8 px-7 mt-8 d-flex align-items-center">
													<span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
														<img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-account.svg" alt="" width="24" height="24">
													</span>
													<div class="w-75 d-inline-block v-middle ps-3">
														<h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
														<span class="d-block text-dark">Account Settings</span>
													</div>
												</a>
											</div>
											<div class="d-grid py-4 px-7 pt-8">
												<a href="authentication-login.html" class="btn btn-outline-primary">Log Out</a>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
			<!--  Header End -->

			<!--  Main Content Start -->
			<div class="container-fluid">
				@yield('content')
			</div>
			<!--  Main Content Start -->

		</div>
		<div class="dark-transparent sidebartoggler"></div>
		<div class="dark-transparent sidebartoggler"></div>
	</div>

	<!--  Customizer -->
	<button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
		<i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Settings"></i>
	</button>
	<div class="offcanvas offcanvas-end customizer" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" data-simplebar="">
		<div class="d-flex align-items-center justify-content-between p-3 border-bottom">
			<h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body p-4">
			<div class="theme-option pb-4">
				<h6 class="fw-semibold fs-4 mb-1">Opsi Tema</h6>
				<div class="d-flex align-items-center gap-3 my-3">
					<a href="javascript:void(0)" onclick="toggleTheme('{{ asset('dist/css/style.min.css') }}')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
						<i class="ti ti-brightness-up fs-7 text-primary"></i>
						<span class="text-dark">Light</span>
					</a>
					<a href="javascript:void(0)" onclick="toggleTheme('{{ asset('dist/css/style-dark.min.css') }}')" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
						<i class="ti ti-moon fs-7 "></i>
						<span class="text-dark">Dark</span>
					</a>
				</div>
			</div>
			<div class="theme-colors pb-4">
				<h6 class="fw-semibold fs-4 mb-1">Warna Tema</h6>
				<div class="d-flex align-items-center gap-3 my-3">
					<ul class="list-unstyled mb-0 d-flex gap-3 flex-wrap change-colors">
						<li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
							<a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin1-bluetheme-primary active-theme " onclick="toggleTheme('{{ asset('dist/css/style.min.css') }}')" data-color="blue_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME"><i class="ti ti-check text-white d-flex align-items-center justify-content-center fs-5"></i></a>
						</li>
						<li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
							<a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin2-aquatheme-primary " onclick="toggleTheme('{{ asset('dist/css/style-aqua.min.css') }}')" data-color="aqua_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
						</li>
						<li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
							<a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin3-purpletheme-primary" onclick="toggleTheme('{{ asset('dist/css/style-purple.min.css') }}')" data-color="purple_theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
						</li>
						<li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
							<a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin4-greentheme-primary" onclick="toggleTheme('{{ asset('dist/css/style-green.min.css') }}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
						</li>
						<li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
							<a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin5-cyantheme-primary" onclick="toggleTheme('{{ asset('dist/css/style-cyan.min.css') }}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
						</li>
						<li class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
							<a href="javascript:void(0)" class="rounded-circle position-relative d-block customizer-bgcolor skin6-orangetheme-primary" onclick="toggleTheme('{{ asset('dist/css/style-orange.min.css') }}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME"><i class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="sidebar-type pb-4">
				<h6 class="fw-semibold fs-4 mb-1">Tipe Sidebar</h6>
				<div class="d-flex align-items-center gap-3 my-3">
					<a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 fullsidebar">
						<i class="ti ti-layout-sidebar-right fs-7"></i>
						<span class="text-dark">Full</span>
					</a>
					<a href="javascript:void(0)" class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center text-dark sidebartoggler gap-2">
						<i class="ti ti-layout-sidebar fs-7"></i>
						<span class="text-dark">Collapse</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!--  Customizer -->
	<!--  Import Js Files -->
	<script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
	<script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
	<!--  core files -->
	<script src="{{ asset('dist/js/app.min.js') }}"></script>
	<script src="{{ asset('dist/js/app.init.js')}}"></script>
	<script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
	<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
	<script src="{{ asset('dist/js/custom.js') }}"></script>
	<!--  current page js files -->
	<script src="{{ asset('dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
	<script src="{{ asset('dist/js/dashboard.js') }}"></script>
	<script src="{{ asset('dist/js/dashboard3.js') }}"></script>
	<script src="{{ asset('dist/libs/fullcalendar/index.global.min.js') }}"></script>
	<script src="{{ asset('dist/js/apps/calendar-init.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	@yield('js')

	@if ($message = session()->get('success'))
	<script type="text/javascript">
		Swal.fire({
			icon: 'success',
			title: 'Sukses!',
			text: '{{ $message }}',
		})
	</script>
	@endif

	@if ($message = session()->get('error'))
	<script type="text/javascript">
		Swal.fire({
			icon: 'error',
			title: 'Waduh!',
			text: '{{ $message }}',
		})
	</script>
	@endif
</body>

</html>