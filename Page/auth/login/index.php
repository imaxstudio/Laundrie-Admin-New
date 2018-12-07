<!-- AUTHOR ROMADHAN EDY P -->
<!-- RPL - SMKN 10 JAKARTA -->

<?php session_start(); include '../../../API/DATABASE/connectionDb.php' ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Laundrie</title>

    <!-- Scripts -->
    <script src="../../../___/Assets/js/app.js"></script>
    <script src="../../../___/Assets/js/jquery.js"></script>    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="../../../___/Assets/css/app.css" rel="stylesheet">
    <link href="../../../___/Assets/css/custom.css" rel="stylesheet">  
    <link href="../../../___/Assets/css/auth.css" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet" href="../../../___/Assets/fontawesome-free-5.4.2-web/css/all.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="main-header text-align-center">
                    <p class="h1"><i class="fab fa-creative-commons-remix"></i> LAUNDRIE</p>
                </div>
            </div>    
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                          <div class="form-row align-items-center">
                            <div class="header">
                                <i class="fas fa-user header-icon"></i>
                                <p class="h4 header-text"><b>SIGN IN</b></p>
                            </div>
                            <div class="col-12">
                    <?php 
                        if (isset($_POST['login'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            if (empty($username)) {
                                echo "<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Username tidak boleh kosong</p>";
                            }
                            elseif (empty($password)) {
                                echo "<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Password tidak boleh kosong</p>";
                            }
                            else{
                                $q = mysqli_query($conn, "SELECT * FROM masters WHERE nama = '$username' AND password = '$password'");
                                $num = mysqli_num_rows($q);
                                $res = mysqli_fetch_array($q);
                                if ($num != 0 && $num < 2) {
                                    $_SESSION['logged'] = true;
                                    $_SESSION['nama'] = $res['nama'];
                                    ?>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                        </div>
                                    <?php
                                    header("Refresh:5; url=../../../", true, 103);
                                }
                                else{
                                    echo "<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Login gagal</p>";
                                }
                            }

                        }
                    ?>
                            </div>
                            <div class="col-12">
                              <label class="sr-only" for="inlineFormInputGroup">Username</label>
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" name="username">
                              </div>
                            </div>
                            <div class="col-12">
                              <label class="sr-only" for="inlineFormInputGroup">Password</label>
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control" id="inlineFormInputGroup" placeholder="Password" name="password">
                              </div>
                            </div>
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary col-12" name="login">Masuk</button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <div class="footer-copyright text-align-center">
                    <p>Copyright © 2018 Laundrie, RPL SMKN 10 Jakarta</p>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../___/Assets/js/custom.js"></script>
    <script src="../../../___/Assets/js/jquery.js"></script>  
</body>
</html>
