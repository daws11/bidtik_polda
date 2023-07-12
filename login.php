
<?php $pagedesc = "Login"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="Gambar/tik-polri.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <title>BID TIK POLDA METRO JAYA</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/css/bootstrap4/bootstrap.min.css" rel="stylesheet">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/portal/css/portal.css" rel="stylesheet">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300" rel="stylesheet">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/portal/css/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/portal/css/jquery-ui.min.css" rel="stylesheet">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/portal/css/jquery-ui.structure.min.css" rel="stylesheet">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/portal/css/jquery-ui.theme.min.css" rel="stylesheet">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/adminlte/css/select2.min.css" rel="stylesheet">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/css/aos.css" rel="stylesheet">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://kolabjar-asnpintar.lan.go.id/public/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://kolabjar-asnpintar.lan.go.id/public/portal/css/login.css">
</head>

<body class="landing-page landing-page1" style="background: url(&quot;https://kolabjar-asnpintar.lan.go.id/public/img/bg-login.jpg&quot;) center center / cover; backdrop-filter: blur(5px) brightness(0.5);" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">
    <div class="">
        <div class="d-flex  ">
        <div class="container d-flex justify-content-center">
            <div class="login d-flex bg-white box-shadow-1 col-md-10 no-padding" style="background-color: rgba(0,0,0,.5)">
                <div class="col-md-6 d-md-block d-none no-padding no-overflow">
                <center><img src="Gambar/Picture1.jpg"  width="300" height="380" style="margin: 0 0 0px"></center>
                </div>
                <div class="col-md-6 position-relative">
                    <div class="d-block back-button-cust ">
                    <a href="index.php"><img src="Gambar/back.png" width="20" height="30" style="margin right: 0 0 50px">
                    </a>
                    </div>
                    <div class="panel panel-default animate fadeIn login-form pl-md-0 pl-sm-5 pr-5 pt-5 pb-3">
                        <div class="panel-heading text-center animate fadeIn input-one custom-margin-bottom">
                            Silahkan Login                        </div>
                                <div class="panel-body">
                                    <form action="login_auth.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="akses" required>
                                            <option value="">======= Login Sebagai =======</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Polres">Polres</option>
                                            <option value="Satker">Satker</option>
                                            <option value="Anggota">Anggota Bid TIK</option>
                                            <option value="Atasan">KABID/KADIT/KARO</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-block" name="login" value="Login">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    
    <!-- footer-bottom -->
    <!-- Bootstrap Core JavaScript -->
    <script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>