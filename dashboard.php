<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
	header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - e-Bookita</title>
    <link rel="icon" href="Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="sidebar.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a80ad92363.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;500;700;900&family=Ubuntu:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav data-aos="fade-down" data-aos-duration="1000" class="sb-topnav navbar navbar-expand"
        style="background-color: #800000;">
        <!-- Navbar Brand-->
        <a href="dashboard.php"><img style="margin-left: 10px;" href="dashboard.php" width="75" height="75"
                src="Logo.png" alt="Perpustakaan Online Unsika"></a>
        <a class="navbar-brand ps-3 text-warning" href="dashboard.php">e-Bookita</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-warning text-opacity-75"
            id="sidebarToggle" href="#!"><i class="fas fa-bars shover"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="text-end navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-warning" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw text-warning"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a style="color: #800000;" class="dropdown-item" href="profil.php">Profil</a></li>
                    <?php 
                $username = $_SESSION['username'];
                if($username == 'admin'){
                ?>
                    <li><a style="color: #800000;" class="dropdown-item" href="manage.php">Aktivitas</a></li>
                    <?php
                }
                ?>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a style="color: #800000;" class="dropdown-item" href="logout.php"
                            onclick="return confirm('Anda yakin ingin keluar?');">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav data-aos="fade-right" data-aos-duration="1000"
                class="sb-sidenav accordion text-warning text-opacity-75" id="sidenavAccordion"
                style="background-color: #800000;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link text-warning text-opacity-75" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            <div class="shover">Dashboard</div>
                        </a>
                        <a class="nav-link collapsed text-warning text-opacity-75" href="ebook.php"
                            data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                            aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            <div class="shover">E-Books</div>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link text-warning text-opacity-75" href="ebook.php">
                                    <div class="shover">Semua</div>
                                </a>
                                <a class="nav-link text-warning text-opacity-75" href="ebook_ilmiah.php">
                                    <div class="shover">Ilmiah</div>
                                </a>
                                <a class="nav-link text-warning text-opacity-75" href="ebook_non_ilmiah.php">
                                    <div class="shover">Non-Ilmiah</div>
                                </a>
                            </nav>
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <div class="nav">
                        <a class="nav-link text-warning text-opacity-75" href="tentang.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                            <div class="shover">Tentang</div>
                        </a>
                    </div>
                </div>
                <hr class="sidebar-divider">
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $_SESSION['username'] ?></td>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="container col-xxl-8 px-4 py-8">
                        <div class="row flex-lg-row-reverse align-items-center g-5 py-10">
                            <div data-aos="fade-left" data-aos-duration="1000" class="col-12 col-sm-8 col-lg-6">
                                <img src="569.png" class="d-block mx-lg-auto img-fluid" alt="Perpustakaan Online Unsika"
                                    width="700" height="700" loading="lazy">
                            </div>
                            <div class="col-lg-6">
                                <h1 data-aos="fade-right" data-aos-duration="1000" style="color: #800000;"
                                    class="display-6 fw-bold lh-1 mb-3">Selamat Datang di Perpustakaan Online Unsika
                                </h1>
                                <p data-aos="fade-right" data-aos-duration="1000" class="lead">Website ini menyediakan
                                    berbagai macam e-book untuk kamu baca</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <div class="section-title text-center m-4">
                <h2 data-aos="fade-up" data-aos-duration="500" style="color: #800000;"
                    class="display-7 fw-bold lh-1 mt-3 mb-3">Fitur
                </h2>
            </div>
            <div class="row m-2 text-center" style="color:#800000">
                <div data-aos="fade-up" data-aos-duration="500" class="col-sm-4 mb-3 mt-3">
                    <div class="card border-2">
                        <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-book" viewBox="0 0 16 16">
                                <path
                                    d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                            </svg>
                            <h5 class="card-title">E-BOOK</h5>
                            <p class="card-text">Lihat ebook yang kami punya
                            </p>
                            <a href="ebook.php" class="btn btn-warning"> E-Book</a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="750" class="col-sm-4 mb-3 mt-3">
                    <div class="card  border-2">
                        <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                                <path
                                    d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z" />
                                <path
                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                            </svg>
                            <h5 class="card-title">UPLOAD</h5>
                            <p class="card-text">Upload ebook kamu disini
                            </p>
                            <a href="upload.php" class="btn btn-warning"> Upload</a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000" class="col-sm-4 mb-3 mt-3">
                    <div class="card  border-2">
                        <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>
                            <h5 class="card-title">TENTANG</h5>
                            <p class="card-text">Ketahui kami lebih lanjut
                            </p>
                            <a href="tentang.php" class="btn btn-warning">
                                Tentang</a>
                        </div>
                    </div>
                </div>
            </div>

            <section class="ftco-section">
                <div class="container">
                    <div class="section-title text-center m-4">
                        <h2 data-aos="fade-up" data-aos-duration="500" style="color: #800000;"
                            class="display-7 fw-bold lh-1 mt-3 mb-3">Kontak
                        </h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="wrapper">
                                <div class="row no-gutters">
                                    <div style="color: #800000;" data-aos="fade-up" data-aos-duration="1000"
                                        class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                        <div class="contact-wrap w-100 p-md-5 p-4">
                                            <h3 class="mb-4">Kirim Pesan</h3>
                                            <div id="form-message-warning" class="mb-4"></div>

                                            <?php
                                            if(isset($_COOKIE["message3"])){ // Jika ada
						?>
                                            <div class="alert alert-primary">
                                                <?php
							// Tampilkan pesannya
                                echo $_COOKIE['message3'];
							?>
                                            </div>
                                            <?php
					}
					?>
                                            <form method="post" action="pesan.php" id="contactForm" name="contactForm"
                                                class="contactForm">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label mb-2" for="nama">
                                                                <h6>Nama</h6>
                                                            </label>
                                                            <input type="text" class="form-control mb-2" name="nama"
                                                                id="nama" placeholder="Nama">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label mb-2" for="email">
                                                                <h6>Email</h6>
                                                            </label>
                                                            <input type="email" class="form-control mb-2" name="email"
                                                                id="email" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label mb-2" for="subjek">
                                                                <h6>Subjek</h6>
                                                            </label>
                                                            <input type="text" class="form-control mb-2" name="subjek"
                                                                id="subjek" placeholder="Subjek">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label mb-2" for="pesan">
                                                                <h6>Pesan</h6>
                                                            </label>
                                                            <textarea name="pesan" class="form-control mb-2"
                                                                id="pesan" cols="30" rows="4"
                                                                placeholder="Pesan"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-warning">Kirim</button>
                                                            <div class="submitting"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div data-aos="zoom-in" data-aos-duration="1000"
                                        class="col-lg-4 col-md-5 d-flex align-items-stretch ">
                                        <div style="background-color: #800000;"
                                            class="text-warning text-opacity-75 info-wrap w-100 p-md-5 p-4 rounded-3">
                                            <h3>Hubungi</h3>
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fas fa-map-marker-alt"></span>
                                                </div>
                                                <div class="text pl-3 ms-2">
                                                    <p><span>Alamat :</span> Jl. HS. Ronggo Waluyo, Telukjambe Timur,
                                                        Karawang, Jawa Barat, Indonesia - 41361</p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-phone"></span>
                                                </div>
                                                <div class="text pl-3 ms-2">
                                                    <p><span>Telepon :</span> <a class="text-warning" href="#"> (0267)
                                                            641177</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                                <div class="text pl-3 ms-2">
                                                    <p><span>Email :</span> <a class="text-warning" href="#"><span>
                                                                info@unsika.ac.id</span></a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-globe"></span>
                                                </div>
                                                <div class="text pl-3 ms-2">
                                                    <p><span>Website :</span> <a class="text-warning"
                                                            href="https://unsika.ac.id/" target="_blank">
                                                            unsika.ac.id</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">Copyright &copy; ApperunsBW</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>