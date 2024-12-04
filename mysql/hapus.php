<?php 

require('koneksi.php');

$id = $_GET['id'];

$sql = "DELETE FROM pendaftar WHERE id = $id";

$result = mysqli_query($koneksi, $sql);

if ($result) {
    header("Location: ../dashboard/dahboard.php");
} else {    
    echo "Error deleting record: ". mysqli_error($conn);
}

?>
