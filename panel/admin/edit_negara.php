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
    $id_negara = htmlspecialchars($_POST['id_negara']);
    $nama_negara = htmlspecialchars($_POST['nama_negara']);
    $tgl_update = date('Y-m-d');
    $user_update = htmlspecialchars($_POST['user_update']);
    $id_user = htmlspecialchars($_POST['id_user']);

    $query = "UPDATE kewarganegaraan SET
            id_negara='$id_negara',
            nama_negara='$nama_negara',
            tgl_update='$tgl_update',
            user_update='$user_update',
            id_user='$id_user'
            WHERE id_negara='$id_negara'
            ";
    // var_dump($query);
    // exit();
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Agama Berhasil DiUpdate');
                document.location.href='data_negara.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Agama Gagal Update');
                document.location.href='data_negara.php';
            </script>
            ";
    }
}

$data = mysqli_query($conn, "SELECT *
FROM kewarganegaraan
INNER JOIN user
ON kewarganegaraan.id_user = user.id_user WHERE id_negara='" . $_GET['id_negara'] . "'");
$edit = mysqli_fetch_assoc($data);
?>
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
                            <h1 class="h4 text-gray-900 mb-4">Edit Agama</h1>
                        </div>
                        <form class="user" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="id_negara"
                                placeholder="Id Negara" name="id_negara" value="<?= $edit['id_negara']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_negara"
                                    placeholder="Nama Agama" name="nama_negara" required value="<?= $edit['nama_negara']; ?>">
                            </div>
                            <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="user_update"
                                    placeholder="User Update" name="user_update" required value="<?= $edit['user_input']; ?>">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="id_user" id="id_user" >
                                <option value="<?= $edit['id_user'] ?>"><?= $edit['hak_akses'] ?> (<?= $edit['nama'] ?>)</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE hak_akses = '$status' AND id_user='$_SESSION[id_user];'");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                    ?>
                                        <option value="<?= $data['id_user'] ?>"><?= $data['hak_akses'] ?> (<?= $data['username'] ?>)</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>