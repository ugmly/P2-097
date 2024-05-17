<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hasil Pencarian Mahasiswa</title>
</head>
<body>
<h1>Hasil Pencarian Mahasiswa</h1>

<?php if (!empty($mahasiswa)): ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Angkatan</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Mata Kuliah Favorit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td><?php echo $mhs['id']; ?></td>
                    <td><?php echo $mhs['nama']; ?></td>
                    <td><?php echo $mhs['npm']; ?></td>
                    <td><?php echo $mhs['angkatan']; ?></td>
                    <td><?php echo $mhs['kelas']; ?></td>
                    <td><?php echo $mhs['alamat']; ?></td>
                    <td><?php echo $mhs['mata_kuliah_favorit']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Tidak ada hasil yang ditemukan.</p>
<?php endif; ?>

<p><a href="<?php echo base_url('mahasiswa'); ?>">Kembali</a> ke halaman utama.</p>

</body>
</html>
