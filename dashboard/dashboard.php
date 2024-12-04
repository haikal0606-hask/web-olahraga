<?php
    require('../mysql/koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    

    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-success my-4" onclick="window.location = '../form.html'">Daftar Menjadi Peserta</button>
            </div>
            <form action="" method="GET" class="input-group col-md-6">
                <input type="text" class="form-control border-secondary text-light" placeholder="Masukkan Pencarian" name="search" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </form>
        </div>

    
        <table class="table table-light mt-4">
    
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama Peserta</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jenis Olahraga</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
    
            <tbody>
                <?php

                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                
                    if ($search) {
                        $sql = "SELECT * FROM pendaftar WHERE nama LIKE '%$search%' OR email LIKE '%$search%' OR jenis_olahraga LIKE '%$search%' OR alamat LIKE '%$search%'";
                    } else {
                        $sql = "SELECT * FROM pendaftar";
                    }

                    $result = $koneksi->query($sql);
    
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            ?>
                                <tr>
                                    <th scope="row"><?= $row['id'] ?></th>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['jenis_olahraga'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $row['id']?>" class="btn btn-warning">Edit</a>
                                        <a onclick="konfirmasi(<?= $row['id'] ?>);" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
    
                ?>
            </tbody>
    
    
        </table>
        
    </div>

    <script>
        function konfirmasi(id) {
            var confirmasi = confirm("Apakah anda yakin ingin menghapus data ini?");
            if (confirmasi) {
                window.location = "../mysql/hapus.php?id=" + id;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>