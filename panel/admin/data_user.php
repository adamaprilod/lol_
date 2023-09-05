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
            <h2>Data <small>Admin & Operator</small></h2>
    </div>
    <div class="text-muted font-12 m-b-30 mb-2">
        <a href="register.php" type="button" class="btn btn-round btn-dark ml-2"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
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
            FROM user ";
            $sql = mysqli_query($conn, $query);
            while ($data = mysqli_fetch_assoc($sql)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['username']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['email']; ?></td>
            <td><?= $data['hak_akses']; ?></td>
            <td align="center"><a class="btn btn-warning btn-sm" type="button" href="edit_user.php?id_user=<?= $data['id_user']; ?>"><i class="far fa-edit"></i></a></td>
            <td align="center"><a class="btn btn-danger btn-sm" type="button" onclick="return confirm('Data akan di Hapus?')" href="hapus_user.php?id_user=<?= $data['id_user']; ?>"><i class="fas fa-trash-alt"></i></a></td>
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