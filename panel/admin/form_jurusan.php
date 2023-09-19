<?php
include 'header.php';
include 'conn.php';
if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Tidak Memiliki Akses, DILARANG MASUK!');
        document.location.href='index.php';
    </script>
    ";
}

if (isset($_POST['simpan'])) {
    $id_jurusan = htmlspecialchars($_POST['id_jurusan']);
    $nama_jurusan = htmlspecialchars($_POST['nama_jurusan']);
    $tgl_input = htmlspecialchars($_POST['tgl_input']);
    $user_input = htmlspecialchars($_POST['user_input']);
    $id_user = htmlspecialchars($_POST['id_user']);
    $id_jenjang = htmlspecialchars($_POST['id_jenjang']);

    //cek id sudah terdaftar belum
    $result = mysqli_query($conn, "SELECT id_jurusan FROM jurusan WHERE id_jurusan = '$id_jurusan'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('ID sudah terdaftar, silahkan ganit!');
            document.location.href='form_jurusan.php';
        </script>
        ";
        return false;
    }

    mysqli_query($conn, "INSERT INTO jurusan VALUES('$id_jurusan','$nama_jurusan','$id_jenjang','$tgl_input','$user_input','','','$id_user')");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data Jurusan Berhasil dibuat');
            document.location.href='data_jurusan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Jurusan Gagal dibuat');
            document.location.href='form_jurusan.php';
        </script>
        ";
    }
}
?>

<!-- page content -->
<body id="page-top">
    <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-2 d-none d-lg-block "></div>
                <div class="col-lg-8">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Form Jurusan</h1>
                        </div>
                        <form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="id_jurusan">ID Jurusan<span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" name="id_jurusan" id="id_jurusan" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="nama_jurusan">Nama Jurusan <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="nama_jurusan" name="nama_jurusan" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Jenjang</label>
                            <div class="col-md-6">
                                <select class="form-control" name="id_jenjang" id="id_jenjang">
                                    <option>Pilih Jenjang</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM jenjang");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_jenjang'] ?>"><?= $data['nama_jenjang'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Tanggal Input <span class="required">*</span></label>
                            <div class="col-md-6">
                                <input id="tgl_input" name="tgl_input" class="date-picker form-control" type="date" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="user_input">User Input<span class="required">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="user_input" name="user_input" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">Akses User</label>
                            <div class="col-md-6">
                                <select class="form-control" name="id_user" id="id_user">
                                    <option>Pilih Akses User</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE hak_akses = '$status' AND id_user='$_SESSION[id_user];'");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_user'] ?>"><?= $data['hak_akses'] ?> (<?= $data['nama'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <button class="btn btn-danger" type="reset">Reset</button>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php
include 'footer.php';
?>
