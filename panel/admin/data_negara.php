<?php
include 'header.php';

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
            <h2>Data <small>Kewarganegaraan</small></h2>
    </div>
    <div class="text-muted font-12 m-b-30 mb-2">
        <a href="form_negara.php" type="button" class="btn btn-round btn-primary ml-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
    </div>
    
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Negara</th>
                <th>Tgl Input</th>
                <th>User Input</th>
                <th>Tgl Update</th>
                <th>User Update</th>
                <th>Akses</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'conn.php';
            $no = 1;
            $query = "SELECT *
            FROM kewarganegaraan
            INNER JOIN user
            ON kewarganegaraan.id_user = user.id_user";
            $sql = mysqli_query($conn, $query);
            while ($data = mysqli_fetch_assoc($sql)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama_negara']; ?></td>
                <td><?= $data['tgl_input']; ?></td>
                <td><?= $data['user_input']; ?></td>
                <td><?= $data['tgl_update']; ?></td>
                <td><?= $data['user_update']; ?></td>
                <td><?= $data['hak_akses']; ?> (<?= $data['username']; ?>)</td>
                <td><a class="btn btn-warning" type="button" href="edit_negara.php?id_negara=<?= $data['id_negara']; ?>"><i class="far fa-edit" aria-hidden="true"></i></a></td>
                <td><a class="btn btn-danger" type="button" onclick="return confirm('Data akan di Hapus?')" href="hapus_negara.php?id_negara=<?= $data['id_negara']; ?>"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></td>
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