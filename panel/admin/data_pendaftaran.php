<?php include "header.php";
if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Tidak Memiliki Akses, DILARANG MASUK!');
        document.location.href='index.php';
    </script>
    ";
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<body id="page-top">
    <div class="container">
        <div class="x_title">
            <h2>Data <small>Jurusan</small></h2>
    </div>
    <div class="text-muted font-12 m-b-30 mb-2">
        <a href="form_pendaftaran.php" type="button" class="btn btn-round btn-primary ml-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
        <a href="laporan/excel_jurusan.php" type="button" class="btn btn-round btn-success ml-2"><i class="fa fa-print" aria-hidden="true"></i> Cetak Data</a>
    </div>
    
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Detail</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Cetak</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'conn.php';
            $no = 1;
            if ($status == 'admin') {
                $query = "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update,CONCAT(user.hak_akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang";
            } else {
                $query = "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update,CONCAT(user.hak_akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang WHERE user.hak_akses = '$status' AND user.id_user='$_SESSION[id_user];'";
            }
            // var_dump($query);
            // exit;
            $sql = mysqli_query($conn, $query);

            while ($data = mysqli_fetch_assoc($sql)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nis']; ?></td>
                    <td><?= $data['nama_siswa']; ?></td>
                    <td><?= $data['kelas']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td><?= $data['jenis_kelamin']; ?></td>
                    <!-- <td align="center"><a class="btn btn-primary" type="button" name="view" value="View" data-id="<?php echo $data["nis"]; ?>" class="btn btn-info btn-xs view_data"><i class="fa fa-bars"></i></a></td> -->
                    <td><a data-toggle="modal" data-target="#detailDaftar" data-id="<?= $data['nis']; ?>" type="submit" class="btn btn-success btn-sm Detai_Pendaftaran">view</a></td>
                    <td align="center"><a class="btn btn-warning btn-sm" type="button" href="edit_pendaftaran.php?nis=<?= $data['nis']; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td align="center"><a class="btn btn-danger btn-sm" type="button" onclick="return confirm('Data akan di Hapus?')" href="hapus_pendaftaran.php?nis=<?= $data['nis']; ?>"><i class="fa fa-trash-o"></i></a></td>
                    <td> <a href="cetak_surat/surat.php?nis=<?= $data['nis']; ?>" target="_blank" type="button" name="cetak" class="btn btn-primary btn-sm text-white" data-dismiss="modal"><i class="fa fa-print" aria-hidden="true"></i></a></td>
                </tr>
        <?php
        }
        ?>
        </tbody>
    </table><br><br><br>
    </div>
    <!-- script -->
    <script>
        $(document).ready(function(){
        new DataTable('#example');
    })
    </script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    
<?php include "footer.php";?>