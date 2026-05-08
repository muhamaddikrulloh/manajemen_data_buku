<?php
include 'koneksi.php';

$id   = $_GET['id'] ?? 0;
$r    = ['judul'=>'','pengarang'=>'','tahun'=>'','foto'=>''];
if ($id) $r = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id"));

if ($_POST) {
    $judul     = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun     = $_POST['tahun'];
    $foto      = $_POST['foto_lama'];

    if ($_FILES['foto']['size'] > 0) {
        $foto = time() . '_' . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/$foto");
    }

    if ($id)
        mysqli_query($koneksi, "UPDATE buku SET judul='$judul',pengarang='$pengarang',tahun='$tahun',foto='$foto' WHERE id=$id");
    else
        mysqli_query($koneksi, "INSERT INTO buku (judul,pengarang,tahun,foto) VALUES ('$judul','$pengarang','$tahun','$foto')");

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2><?= $id ? 'Edit' : 'Tambah' ?> Data Buku</h2>

<form method="POST" enctype="multipart/form-data" onsubmit="return cekForm(<?= $id ? 'true' : 'false' ?>)">
    <input type="hidden" name="foto_lama" value="<?= $r['foto'] ?>">

    Judul     : <input type="text"   id="judul"     name="judul"     value="<?= $r['judul'] ?>" style="margin-bottom: 10px;">
    Pengarang : <input type="text"   id="pengarang" name="pengarang" value="<?= $r['pengarang'] ?>" style="margin-bottom: 10px;">
    Tahun     : <input type="number" id="tahun"     name="tahun"     value="<?= $r['tahun'] ?>" style="margin-bottom: 10px;">
    Foto      : <?php if ($r['foto']): ?><img src="uploads/<?= $r['foto'] ?>"><?php endif; ?>
                <input type="file" id="foto" name="foto" accept="image/*" style="border: 1px solid #000000;">

    <button type="submit" style="margin: 10px 0;">Simpan</button>
</form>

<button type="button" onclick="location.href='index.php'">Kembali</button>
    
<script src="script.js"></script>
</body>
</html>
