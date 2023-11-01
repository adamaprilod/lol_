<?php
include 'header.php';
include 'conn.php';

if (isset($_POST['simpan'])) {
    $nis = htmlspecialchars($_POST['nis']);
    $nama_siswa = htmlspecialchars($_POST['nama_siswa']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $jk = htmlspecialchars($_POST['jk']);
    $tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
    $status = htmlspecialchars($_POST['status']);
    $negara = htmlspecialchars($_POST['negara']);
    $agama = htmlspecialchars($_POST['agama']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $tgl_update = date('Y-m-d');
    $user_update = htmlspecialchars($_POST['user_update']);
    $id_user = htmlspecialchars($_POST['id_user']);

    $query = "UPDATE pendaftaran SET
            nis='$nis',
            nama_siswa='$nama_siswa',
            alamat='$alamat',
            jenis_kelamin='$jk',
            tempat_lahir='$tmp_lahir',
            tgl_lahir='$tgl_lahir',
            `status` ='$status ',
            id_negara='$negara',
            id_agama='$agama',
            id_jurusan='$kelas',
            tgl_update='$tgl_update',
            user_update='$user_update',
            id_user='$id_user'
            WHERE nis='$nis'
            ";

    // var_dump($query);
    // exit();

    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Pendaftaran Berhasil DiUpdate');
                document.location.href='data_pendaftaran.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Pendaftaran Gagal DiUpdate');
                document.location.href='data_pendaftaran.php';
            </script>
            ";
    }
}
$data = mysqli_query($conn, "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update, user.id_user,CONCAT(user.hak_akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang WHERE nis='" . $_GET['nis'] . "'");
$edit = mysqli_fetch_assoc($data);
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
                            <h1 class="h4 text-gray-900 mb-4">Form Input Pendaftaran</h1>
                        </div>
                        <form class="user" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nis" placeholder="NIS" name="nis" value="<?= $edit['nis']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_siswa" placeholder="Nama Siswa" name="nama_siswa" value="<?= $edit['nama_siswa']; ?>" required>
                            </div>
                            <div class="form-group">
                            <textarea type="text" id="alamat" name="alamat" required="required" class="form-control"><?= $edit['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Jenis Kelamin</label>
                                <?php if (
                                    $edit['jenis_kelamin'] ==
                                    'Laki-laki'
                                ) { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk1" name="jk" class="custom-control-input" value="Laki-laki" checked>
                                        <label class="custom-control-label" for="jk1">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk2" name="jk" class="custom-control-input" value="Perempuan">
                                        <label class="custom-control-label" for="jk2">Perempuan</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk1" name="jk" class="custom-control-input" value="Laki-laki">
                                        <label class="custom-control-label" for="jk1">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="jk2" name="jk" class="custom-control-input" value="Perempuan" checked>
                                        <label class="custom-control-label" for="jk2">Perempuan</label>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir" value="<?= $edit['tempat_lahir']; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir"  value="<?= $edit['tgl_lahir']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="<?= $edit['status']; ?>"><?= $edit['status']; ?></option>
                                    <option value="Baru">Baru</option>
                                    <option value="Pindahan">Pindahan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Negara</label>
                                <select class="form-control" name="negara" id="negara">
                                <option value="<?= $edit['id_negara']; ?>"><?= $edit['nama_negara']; ?></option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM kewarganegaraan");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_negara'] ?>"><?= $data['nama_negara'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama" id="agama">
                                <option value="<?= $edit['id_agama']; ?>"><?= $edit['nama_agama']; ?></option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM agama");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_agama'] ?>"><?= $data['nama_agama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelas" id="kelas">
                                <option value="<?= $edit['id_jurusan'] ?>"><?= $edit['kelas'] ?></option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) AS kelas FROM jurusan INNER JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_jurusan'] ?>"><?= $data['kelas'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Tanggal Update</label>
                                <input type="date" class="form-control form-control-user" id="tgl_update" name="tgl_update" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="user_input" name="user_input" placeholder="User Input" value="<?= $edit['user_input']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Akses User</label>
                                <select class="form-control" name="id_user" id="id_user">
                                <option value="<?= $edit['id_user']; ?>"><?= $edit['akses']; ?></option>
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
                            <div class="form-group">
                                <button class="btn btn-danger" type="reset">Reset</button>
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
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
