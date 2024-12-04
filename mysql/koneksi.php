<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_pendaftar');

if (!$koneksi) {
    die("Connection failed: ". mysqli_connect_error());
}

?>