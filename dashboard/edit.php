<?php

    require('../mysql/koneksi.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM pendaftar WHERE id=$id";

    $result = $koneksi->query($sql);

    $row  = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    
    <section id="form">
        <h2>Form Pendaftaran</h2>
        <form action="../mysql/update.php" method="post">
          <label for="name">Nama Lengkap:</label>
          <input type="text" id="name" value="<?= $row['nama'] ?>" name="nama" required><br>
    
          <label for="email">Email:</label>
          <input type="email" id="email" value="<?= $row['email'] ?>" name="email" required><br>
    
          <label for="phone">Nomor Telepon:</label>
          <input type="tel" id="phone" value="<?= $row['no_hp'] ?>" name="no_hp" required><br>
    
          <label for="sport">Jenis Olahraga:</label>
          <select id="sport" name="jenis_olahraga" required>
            <option value="<?= $row['jenis_olahraga'] ?>"><?= $row['jenis_olahraga'] ?></option>
            <option value="sepak bola">Sepak Bola</option>
            <option value="basket">Basket</option>
            <option value="bulu tangkis">Bulu Tangkis</option>
            <option value="voli">Voli</option>
          </select><br>
    
          <label for="alamat">Alamat</label>
          <textarea id="alamat" name="alamat" rows="4" cols="50"><?= $row['alamat'] ?></textarea><br>

          <input type="hidden" name="id" value="<?= $row['id'] ?>">
    
          <button type="submit">Daftar</button>
        </form>
      </section>

</body>
</html>
