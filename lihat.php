<?php
session_start(); // Start session nya
include "koneksi.php";

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
    <title>E-Book - e-Bookita</title>
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
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
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
                <div data-aos="zoom-out" data-aos-duration="1000" class="container">
                    <div class="card mt-3 border-5 pt-2 active pb-0 px-3">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 ">
                                    <nav class="navbar">
                                        <?php
            $id_ebook = mysqli_real_escape_string($connect,$_GET['id_ebook']);
        $query = mysqli_query($connect,"SELECT * FROM ebook WHERE id_ebook='$id_ebook' ");
        while($data  = mysqli_fetch_array($query)){

        ?>
                                        <h4 class="card-title text-start mb-3" style="color:#800000">
                                            <b><?php echo $data['judul'];?></b>
                                        </h4>
                                    </nav>
                                    <p class="card-text">
                                        <small>
                                            <?php echo $data['penulis'];?> <br>
                                            <?php echo $data['penerbit'];?> <br>
                                            <?php echo $data['jenis'];?>
                                        </small>
                                    </p>
                                    <hr>
                                    <embed src="ebook/<?php echo $data['nama_file'];?>"
                                        type="application/pdf" width="100%" height="600">

                                </div>
                                <?php
        }
        ?>

                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <div>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center small">
                            <div class="text-muted">Copyright &copy; ApperunsBW</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
        </script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>
</body>

</html>