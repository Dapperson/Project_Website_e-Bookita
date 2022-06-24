<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - e-Bookita</title>
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

<body style="background-color: #800000;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div data-aos="zoom-out" data-aos-duration="1000" class="text-center mt-4">
                                <img src="Logo.png" alt="" width="150" height="150">
                            </div>
                            <?php
					// Cek apakah terdapat cookie dengan nama message
					if(isset($_COOKIE["message"])){ // Jika ada
						?>
                            <div class="alert alert-danger">
                                <?php
							// Tampilkan pesannya
							echo $_COOKIE["message"];
							?>
                            </div>
                            <?php
					}
					?>
                            <div class="card-body">
                                <form method="post" action="login.php">
                                    <div data-aos="fade-down" data-aos-duration="1000" class="form-floating mb-3">
                                        <input class="form-control" name="username" id="inputText" type="text"
                                            placeholder="Username" />
                                        <label for="inputText">Username</label>
                                    </div>
                                    <div data-aos="fade-down" data-aos-duration="1000" class="form-floating mb-3">
                                        <input class="form-control" name="password" id="inputPassword" type="password"
                                            placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div data-aos="fade-down" data-aos-duration="1000" class="form-check mb-3">
                                        <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                            value="" />
                                        <label class="form-check-label" for="inputRememberPassword"
                                            style="color: yellow;">Remember Password</label>
                                    </div>
                                    <div data-aos="zoom-in" data-aos-duration="1000"
                                        class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                        <button class="btn btn-warning btn-lg form-control" type="submit"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-box-arrow-in-right"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                                <path fill-rule="evenodd"
                                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                            </svg> Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="text-center" style="margin-top: 10px;margin-bottom: 10px; color: yellow;">
                                atau login dengan
                            </div>
                            <div data-aos="zoom-in" data-aos-duration="1000" class="text-center">
                                <a href="google.php" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-google"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                    </svg></i> Google</a>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mt-5 mb-3 text-muted text-center">&copy; ApperunsBW</p>
            </main>
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