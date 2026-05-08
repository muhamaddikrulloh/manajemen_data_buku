<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Data Buku</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<h1>MadaKu</h1>
<h3>Manajemen Data Buku</h3>

<a href="form.php" style="text-decoration: none;">
    <button type="button">Tambah</button></a>
<br>
<table>
    <tr>
        <th>No</th><th>Foto</th><th>Judul</th><th>Pengarang</th><th>Tahun</th><th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $data = mysqli_query($koneksi, "SELECT * FROM buku");
    while ($r = mysqli_fetch_assoc($data)):
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><img src="uploads/<?= $r['foto'] ?>"></td>
        <td><?= $r['judul'] ?></td>
        <td><?= $r['pengarang'] ?></td>
        <td><?= $r['tahun'] ?></td>
        <td>
            <a href="form.php?id=<?= $r['id'] ?>" style="text-decoration: none;">
                <button type="button" style="display: inline;">Edit</button></a>

            <a href="hapus.php?id=<?= $r['id'] ?>" onclick="return confirm('Yakin hapus?')" style="text-decoration: none;">
                <button type="button" style="display: inline;">Hapus</button></a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<script src="scripts/script.js"></script>
</body>
</html>
