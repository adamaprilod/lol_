

<!-- Page Wrapper -->
<?php include "header.php";
include 'conn.php';
$RPL = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='Rekayasa Perangkat Lunak'"));
$MM = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='Multimedia'"));
$AKL = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='Akuntansi dan Keuangan Lembaga'"));
$BDP = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='Bisnis Daring dan Pemasaran'"));
$OTKP = mysqli_num_rows(mysqli_query($conn, "SELECT jurusan.id_jurusan, jurusan.nama_jurusan, pendaftaran.id_jurusan FROM pendaftaran JOIN jurusan ON jurusan.id_jurusan=pendaftaran.id_jurusan WHERE jurusan.nama_jurusan='Otomatisasi dan Tata Kelola Perkantoran'"));
?>
<body id="page-top">
    <div id="wrapper">
        <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Home</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- rpl -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Rekayasa Perangkat Lunak</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $RPL; ?></div>
                                            </div>
                                            <div class="col-auto">
                                            <i class="fas fa-laptop"></i>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- mm -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Multimedia</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $MM; ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-video"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- akl -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left-color:#800080">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#800080">Akuntansi dan Keuangan Lembaga
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $MM; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-money-check-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Bisnis Daring dan Pemasaran</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $BDP; ?></div>
                                            </div>
                                        <div class="col-auto">
                                        <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   
            <?php include "footer.php";?>
        
    

