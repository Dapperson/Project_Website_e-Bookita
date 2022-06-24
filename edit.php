<?php
include 'koneksi.php';
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
    <title>Edit Profil - e-Bookita</title>
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
                                        <h2 class="card-title text-start mb-3" style="color:#800000"><b>Edit Profil</b>
                                        </h2>
                                        <?php
                $id = $_SESSION['id'];
                $data = mysqli_query($connect, "SELECT * FROM user WHERE id = '$id'") or die(mysqli_error($connect));
                $baris = mysqli_fetch_array($data); ?>
                                        <a onclick="return confirm('Anda yakin ingin menghapus akun?');"
                                            href="hapus_profil.php?id=<?php echo $baris['id']; ?>"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg></a>
                                    </nav>

                                    <?php
            $id = $_SESSION['id'];
            $data = mysqli_query($connect,"SELECT * FROM user WHERE id = '$id' ") or die(mysqli_errno($connect));
            $baris = mysqli_fetch_array($data);
        ?>
                                    <div class="container">
                                        <form class="form-horizontal" action="proses_edit.php?id=<?php echo $id;?>"
                                            method="post">
                                            <div class="form-group" style="color:#800000">
                                                <label class="control-label col-sm-2 mb-2" for="id">
                                                    <h6>ID:</h6>
                                                </label>
                                                <fieldset disabled>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control mb-4" id="id" name="id"
                                                            value="<?php echo $baris['id'];?>">
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="form-group" style="color:#800000">
                                                <label class="control-label col-sm-2 mb-2" for="username">
                                                    <h6>Username:</h6>
                                                </label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control mb-4" id="username"
                                                        name="username" value="<?php echo $baris['username'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group" style="color:#800000">
                                                <label class="control-label col-sm-2 mb-2" for="nama">
                                                    <h6>Nama:</h6>
                                                </label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control mb-4" id="nama" name="nama"
                                                        value="<?php echo $baris['nama'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group" style="color:#800000">
                                                <label class="control-label col-sm-2 mb-2" for="email">
                                                    <h6>Email:</h6>
                                                </label>
                                                <fieldset disabled>
                                                    <div class="col-sm-12">
                                                        <input type="email" class="form-control mb-4" id="email"
                                                            name="email" value="<?php echo $baris['email'];?>">
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-warning" name="button"
                                                        onclick="return confirm('Simpan Perubahan?');"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                                                        </svg> Simpan</button>

                                                    <a class="btn btn-danger" href="profil.php"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-x-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                            <path
                                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                        </svg> Batal</a>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
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