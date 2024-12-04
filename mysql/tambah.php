<?php
    require('koneksi.php'); // Pastikan file koneksi sudah ada dan benar.

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari formulir
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $jenis_olahraga = $_POST['jenis_olahraga'];
        $alamat = $_POST['alamat'];

        // Validasi sederhana
        if (!empty($nama) && !empty($email) && !empty($no_hp) && !empty($jenis_olahraga) && !empty($alamat)) {
            // Query untuk menambahkan data ke database
            $sql = "INSERT INTO pendaftar (nama, email, no_hp, jenis_olahraga, alamat) 
                    VALUES ('$nama', '$email', '$no_hp', '$jenis_olahraga', '$alamat')";

            if ($koneksi->query($sql) === TRUE) {
                echo "<script>
                        alert('Data anda sudah masuk kedalam sistem kami, harap tunggu balasan email dari kami :)');
                        window.location.href = '../index.html';
                      </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        } else {
            echo "Semua kolom wajib diisi!";
        }
    }
?>
