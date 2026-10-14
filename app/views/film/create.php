<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Film</title>
</head>
<body>
    <h1>Tambah Data Film</h1>

    <form method="post" action="index.php?page=film&action=store">
        <label>Judul Film</label><br>
        <input type="text" name="judul" required><br><br>

        <label>Genre</label><br>
        <input type="text" name="genre" required><br><br>

        <label>Tahun Rilis</label><br>
        <input type="number" name="tahun_rilis"
               min="1888" max="<?= date('Y') ?>" required><br><br>

        <label>Sutradara</label><br>
        <input type="text" name="sutradara" required><br><br>

        <label>Durasi (menit)</label><br>
        <input type="number" name="durasi" min="1" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php?page=film">Kembali</a>
    </form>
</body>
</html>