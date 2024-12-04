<?php
    require('koneksi.php'); // Pastikan file koneksi sudah ada dan benar.

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari formulir
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $jenis_olahraga = $_POST['jenis_olahraga'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE pendaftar SET nama='$nama', email='$email', email='$email', no_hp='$no_hp', jenis_olahraga='$jenis_olahraga', alamat='$alamat' WHERE id=$id";

        if ($koneksi->query($sql) === TRUE) {
            echo "<script>
                    window.location.href = '../dashboard/dashboard.php';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
?>
