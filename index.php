<?php
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Data Barang</title>
</head>

<body>
  <div class="container">
    <h1>Data Barang</h1>
    <a href="tambah.php" class="button">Tambah Data Barang</a>
    <div class="main">
    <table class="w3-table-all">
    <thead>
      <tr class="w3-blue">
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Katagori</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
          <?php if ($result) : ?>
            <?php while ($row = mysqli_fetch_array($result)) : ?>
              <tr>
              <td><img src="<?php echo $row['gambar']; ?>" width=150px></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['kategori']; ?></td>
                <td><?= $row['harga_jual']; ?></td>
                <td><?= $row['harga_beli']; ?></td>
                <td><?= $row['stok']; ?></td>
                <td>
                  <a href="ubah.php?id=<?= $row['id_barang']; ?>" class="w3-button w3-green" >Ubah</a>
                  <a href="hapus.php?id=<?= $row['id_barang']; ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="w3-button w3-red" >Hapus</a>
                </td>
              </tr>
            <?php endwhile;
          else : ?>
            <tr>
              <td colspan="7">Belum ada data</td>
            </tr>
          <?php endif; ?>
      </table>
    </div>
  </div>
</body>

</html>