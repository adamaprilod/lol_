<?php
include '../conn.php';
$waktu = date('d-m-Y');
$nama = "laporan-data-excel-jejang-" . $waktu . ".xls";
header("Content-Disposition: attachment; filename='$nama'");
header("Content-Type: application/vnd-ms-excel");
?>
<h5>Laporan Data Jenjang</h5>
<table id="datatable" border="1px" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama Jenjang</th>
            <th>Tgl Input</th>
            <th>User Input</th>
            <th>Tgl Update</th>
            <th>User Update</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../conn.php';
        $no = 1;
        $query = "SELECT *
        FROM jenjang";
        $sql = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_assoc($sql)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['id_jenjang']; ?></td>
                <td><?= $data['nama_jenjang']; ?></td>
                <td><?= $data['tgl_input']; ?></td>
                <td><?= $data['user_input']; ?></td>
                <td><?= $data['tgl_update']; ?></td>
                <td><?= $data['user_update']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>