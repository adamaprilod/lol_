<?php
include 'conn.php';
if (isset($_GET['Id_Agama'])) {
    mysqli_query($conn, "DELETE FROM agama WHERE Id_Agama='" . $_GET['Id_Agama'] . "'");
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href='data_agama.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href='data_agama.php';
            </script>
            ";
    }
}
?>