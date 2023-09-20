<?php
include 'conn.php';
mysqli_query($conn, "DELETE FROM jurusan WHERE id_jurusan='" . $_GET['id_jurusan'] . "'");
if (mysqli_affected_rows($conn) > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href='data_jurusan.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href='data_jurusan.php';
        </script>
        ";
}
?>
