<?php
include '../conn.php';
$waktu = date('d-m-Y');
$nama = "laporan-data-excel-jurusan-" . $waktu . ".xls";
header("Content-Disposition: attachment; filename='$nama'");
header("Content-Type: application/vnd-ms-excel");
?>
<h5>Laporan Data Jurusan</h5>
<table id="datatable" border="1px" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Kelas</th>
            <th>Tgl Input</th>
            <th>User Input</th>
            <th>Tgl Update</th>
            <th>User Update</th>
            <th>Akses</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../conn.php';
        $no = 1;
        $query = "SELECT id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, jurusan.tgl_input,jurusan.user_input,jurusan.tgl_update,jurusan.user_update,CONCAT(user.hak_akses,' (',user.nama,')') as akses
        FROM jurusan
        LEFT JOIN jenjang
        ON jurusan.id_jenjang = jenjang.id_jenjang LEFT JOIN user ON jurusan.id_user = user.id_user";
        $sql = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_assoc($sql)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['id_jurusan']; ?></td>
                <td><?= $data['kelas']; ?></td>
                <td><?= $data['tgl_input']; ?></td>
                <td><?= $data['user_input']; ?></td>
                <td><?= $data['tgl_update']; ?></td>
                <td><?= $data['user_update']; ?></td>
                <td><?= $data['akses']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>