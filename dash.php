<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BID TIK Polda Metro Jaya</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <div class="col-lg-3 bg-dark d-none d-lg-block">
                <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <!--<h1 class="m-0 display-4 text-primary text-uppercase">BID TIK</h1>-->     
                    <img src="img/BID-TIK.png" style="width: 100px" height="110px">
                </a>
            </div>
            <div class="col-lg-9">
                <div class="row gx-0 bg-secondary d-none d-lg-flex">
                    <div class="col-lg-7 px-5 text-start">
                        <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                            <i class="fa fa-envelope text-primary me-2"></i>
                            <h6 class="mb-0">info trianapanji@gmail.com</h6>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center py-2">
                            <i class="fa fa-phone-alt text-primary me-2"></i>
                            <h6 class="mb-0">+62 859 7253 9666</h6>
                        </div>
                    </div>
                    <div class="col-lg-5 px-5 text-end">
                        <div class="d-inline-flex align-items-center py-2">
                            <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="btn btn-light btn-square rounded-circle me-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="btn btn-light btn-square rounded-circle" href="">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                    <a href="index.html" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-4 text-primary text-uppercase">BID TIK</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.html" class="nav-item nav-link active">Beranda</a>
                            <a href="about.html" class="nav-item nav-link">Tentang</a>
                            <a href="class.html" class="nav-item nav-link">Giat Harian</a>
                            <a href="dash.php" class="nav-item nav-link">Kamtibmas</a>
                            <!--<div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                    <a href="detail.html" class="dropdown-item">Blog Detail</a>
                                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>-->
                        </div>
                        <a href="login.php" class="btn btn-primary py-md-2 px-md-5 d-none d-lg-block">Login</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->

				 

    <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 minimum-scale=1" />	
    <script type="text/javascript" src="scripts/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="scripts/demos.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdata.js"></script>
    <style type="text/css">
        .chart-inner-text
        {
            fill: #00BAFF;
            color: #00BAFF;
            font-size: 30px;
            font-family: Verdana;
        }    
    </style>
   
<?php
	include("dist/config/koneksi.php");
require_once"fungsiIO.php";
$TABEL="kamtibmas_umum";

$sqlc="select distinct(`Jenis_ppgk`) from $TABEL order by rand()";
$arrc = getData($conn, $sqlc);
	$gab="";
	$K=0;
	foreach ($arrc as $dc) {
		$Jenis_ppgk = $dc["Jenis_ppgk"]; 
		
			$sqlc2="select distinct(`nama_user`) from `employee` where `active` ='Aktif' and `hak_akses`='Polres' and (`nama_user` like '%Jakarta%' or `nama_user` like '%Seribu%') order by `nama_user` asc";
			$arrc2 = getData($conn, $sqlc2);
			$jmax=0;
			$tot=0;
			$ada=0;
				foreach ($arrc2 as $dc2) {
					$nama_user = $dc2["nama_user"];  
						$sqld="select No_Lp from $TABEL where `Jenis_ppgk`='$Jenis_ppgk' and `Polsek`='$nama_user'";
						$jumlah=getJuml($conn,$sqld);
						if($jmax<$jumlah){$jmax=$jumlah;}
						$tot+=$jumlah;
						$ada++;
				}
				$avg=ceil($tot/$ada);
		
		$gab.="{ name: '$Jenis_ppgk',value: $avg, max: $jmax},";	
		$K++;
	} 
	$gab=POT($gab);
	
?>	
    <script type="text/javascript">
        $(document).ready(function () {

            function displayClusterMetrics() {
                var metrics = [<?php echo $gab;?>];

                for (var i = 0; i < metrics.length; i++) {

                    var data = [];

                    data.push({ text: 'Rata-Rata Case', value: metrics[i].value }); // current
                    data.push({ text: 'Selisih Dengan Case Tertinggi', value: metrics[i].max - metrics[i].value }); // remaining

                    var settings = {
                        title: metrics[i].name,
                        description: '',
                        enableAnimations: true,
                        showLegend: false,
                        showBorderLine: true,
                        backgroundColor: '#FAFAFA',
                        padding: { left: 5, top: 5, right: 5, bottom: 5 },
                        titlePadding: { left: 5, top: 5, right: 5, bottom: 5 },
                        source: data,
                        showToolTips: true,
                        seriesGroups:
                        [
                            {
                                type: 'donut',
                                useGradientColors: false,
                                series:
                                    [
                                        {
                                            showLabels: false,
                                            enableSelection: true,
                                            displayText: 'text',
                                            dataField: 'value',
                                            labelRadius: 120,
                                            initialAngle: 90,
                                            radius: 160,
                                            innerRadius: 50,
                                            centerOffset: 0
                                        }
                                    ]
                            }
                        ]
                    };

                    var selector = '#chartContainer' + (i + 1).toString();

                    var valueText = metrics[i].value.toString();

                    settings.drawBefore = function (renderer, rect) {
                        sz = renderer.measureText(valueText, 0, { 'class': 'chart-inner-text' });

                        renderer.text(
                        valueText,
                        rect.x + (rect.width - sz.width) / 2,
                        rect.y + rect.height / 2,
                        0,
                        0,
                        0,
                        { 'class': 'chart-inner-text' }
                        );
                    }

                    $(selector).jqxChart(settings);
                    $(selector).jqxChart('addColorScheme', 'customColorScheme', ['#00BAFF', '#EDE6E7']);
                    $(selector).jqxChart({ colorScheme: 'customColorScheme' });
                }
            }

            function displayServerResponseMetrics() {
                var data =[
                        { hour: 0, latency: 235, requests: 3500 },
                        { hour: 1, latency: 231, requests: 3400 },
                        { hour: 2, latency: 217, requests: 3350 },
                        { hour: 3, latency: 215, requests: 3260 },
                        { hour: 4, latency: 225, requests: 3320 },
                        { hour: 5, latency: 235, requests: 3400 },
                        { hour: 6, latency: 239, requests: 3550 },
                        { hour: 7, latency: 255, requests: 4100 },
                        { hour: 8, latency: 251, requests: 4200 },
                        { hour: 9, latency: 259, requests: 4500 },
                        { hour: 10, latency: 265, requests: 4560 },
                        { hour: 11, latency: 257, requests: 4500 },
                        { hour: 12, latency: 265, requests: 4490 },
                        { hour: 13, latency: 261, requests: 4400 },
                        { hour: 14, latency: 258, requests: 4350 },
                        { hour: 15, latency: 257, requests: 4340 },
                        { hour: 16, latency: 255, requests: 4200 },
                        { hour: 17, latency: 245, requests: 4050 },
                        { hour: 18, latency: 241, requests: 4020 },
                        { hour: 19, latency: 239, requests: 3900 },
                        { hour: 20, latency: 237, requests: 3810 },
                        { hour: 21, latency: 236, requests: 3720 },
                        { hour: 22, latency: 235, requests: 3610 },
                        { hour: 23, latency: 239, requests: 3550 },
                    ];

                var latencyThreshold = 260;

                var settings = {
                    title: 'Get request per second & response latencies',
                    description: '(Aggregated values for the last 24h)',
                    enableAnimations: true,
                    showLegend: false,
                    showBorderLine: true,
                    backgroundColor: '#FAFAFA',
                    padding: { left: 5, top: 5, right: 5, bottom: 5 },
                    titlePadding: { left: 5, top: 5, right: 5, bottom: 5 },
                    source: data,
                    xAxis:
                    {
                        dataField: 'hour',
                        displayText: 'Hour',
                    },
                    seriesGroups:
                        [
                            {
                                type: 'column',
                                valueAxis:
                                {
                                    title: { text: 'Request Latency [ms]<br>' },
                                    position: 'left'
                                },
                                toolTipFormatSettings: { sufix: ' ms'},
                                series:
                                    [
                                        {
                                            dataField: 'latency',
                                            displayText: 'Request latency',
                                            colorFunction: function (value, itemIndex, serie, group) {
                                                return (value > latencyThreshold) ? '#CC1133' : '#55CC55';
                                            }
                                        }
                                    ],
                                bands:
                                [
                                    {
                                        minValue: latencyThreshold,
                                        maxValue: latencyThreshold,
                                        lineWidth: 1,
                                        color: 'red'
                                    }
                                ]
                            },
                            {
                                type: 'spline',
                                valueAxis:
                                {
                                    title: { text: 'Get Requests per second' },
                                    position: 'right'
                                },
                                toolTipFormatSettings: { sufix: ' req/s'},
                                series:
                                    [
                                        {
                                            dataField: 'requests',
                                            displayText: 'Get requests',
                                            lineColor: '#343F9B',
                                            lineWidth: 2
                                        }
                                    ]
                            },

                        ]
                };

                $(chartContainerX).jqxChart(settings);
            }

            displayClusterMetrics();
            displayServerResponseMetrics();
        });
    </script>  
	
	  <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/BACKGROUND-1.jpg"  width="100%" height="600" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase">BID TIK</h5>
                            <h1 class="display-2 text-white text-uppercase mb-md-4">MENGABDI DENGAN INTEGRASI MELAYANI DENGAN TEKNOLOGI</h1>
                            <a href="login.html" class="btn btn-primary py-md-3 px-md-5 me-3">Login</a>
                            <a href="about.html" class="btn btn-light py-md-3 px-md-5">Tentang BID TIK</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/BACKGROUND.jpg"  width="100%" height="600" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase">BID TIK</h5>
                            <h1 class="display-2 text-white text-uppercase mb-md-4">MENGABDI DENGAN INTEGRASI MELAYANI DENGAN TEKNOLOGI</h1>
                            <a href="login.html" class="btn btn-primary py-md-3 px-md-5 me-3">Login</a>
                            <a href="about.html" class="btn btn-light py-md-3 px-md-5">Tentang BID TIK</a>
                        </div>
                    </div>
            </div>
            <div class="carousel-item">
                    <img class="w-100" src="img/BACKGROUND-2.jpg"  width="100%" height="600" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase">BID TIK</h5>
                            <h1 class="display-2 text-white text-uppercase mb-md-4">MENGABDI DENGAN INTEGRASI MELAYANI DENGAN TEKNOLOGI</h1>
                            <a href="login.html" class="btn btn-primary py-md-3 px-md-5 me-3">Login</a>
                            <a href="about.html" class="btn btn-light py-md-3 px-md-5">Tentang BID TIK</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

<h2><a href="dash.php">Rerata Case Terhadap Maksimum Case Kamtibmas Umum</a> | <a href="dash2.php">Khusus</a></h2>

 
    <div class="container-fluid p-5">
	<h3>Data Kamtibmas Umum</h3>  
     <div class="row gx-5">
<table border="0" cellpadding="0" cellspacing="0">
<?php
$mod3=$K%3;
if($mod3 !=0){
	$K=$K-$mod3;	
}
for($i=0;$i<$K;$i=$i+3){
	$N=$i+1;
	$M=$N+1;
	$L=$M+1;
echo" <tr><td><div id='chartContainer$N' style='width: 500px; height: 380px;'></div></td>
            <td><div id='chartContainer$M' style='width: 500px; height: 380px;'></div></td>
			 <td><div id='chartContainer$L' style='width: 500px; height: 380px;'></div></td>
</tr>
<tr><td colspan='3'>&nbsp;</tr>
";	
	
}
?>

    </table>
    <div class="example-description">
    <br />
    <h2>Description</h2>
    <br />
   Adalah nilai perbandingan antara nilai rata-rata Kasus / Kategori / Jenis PPGK
   terhadap nilai Maksimum yang pernah terjadi dari setiap kasus PPGK tersebut... 
   <br>Sehingga adalah suatu prestasi yang baik jika wujud grafik menunjukkan Kurang Dari setengah Grafik case yang bersangkutan...
    </div>

 
        </div>
    </div>
    <!-- About End -->
 

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary px-5 mt-5">
        <div class="row gx-5">
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">Jl. Jenderal Sudirman Kav. 55 Jakarta Selatan, Kota Jakarta Selatan, DKI Jakarta</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">trianapanji@gmail.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">+62 859 7253 9666</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">Quick Links</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Beranda</a>
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Tentang</a>
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Giat Harian</a>
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Kamtibmas</a>
                            <a class="text-secondary" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Hubungi Kami</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-uppercase text-light mb-4">Popular Links</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Beranda</a>
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Tentang</a>
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Giat Harian</a>
                            <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Kamtibmas</a>
                            <a class="text-secondary" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-5">
                    <h4 class="text-uppercase text-white mb-4">Newsletter</h4>
                    <h6 class="text-uppercase text-white">Subscribe Our Newsletter</h6>
                    <p class="text-light">Enter your email right now</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                            <button class="btn btn-dark">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 py-lg-0 px-5" style="background: #111111;">
        <div class="row gx-5">
            <div class="col-lg-8">
                <div class="py-lg-4 text-center">
                    <p class="text-secondary mb-0">&copy; <a class="text-light fw-bold" href="#">www.papahtampan.com</a>. All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="py-lg-4 text-center credit">
                    <p class="text-light mb-0">Designed by <a class="text-light fw-bold" href="https://papahtampan.com">PAPAH Tampan</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

 