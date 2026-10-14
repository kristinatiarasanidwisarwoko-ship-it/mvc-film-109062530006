<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Film</title>
</head>
<body>
    <h1>Daftar Data Film</h1>

    <?php
    $status = $_GET['status'] ?? '';
    $messages = [
        'created' => 'Data film berhasil ditambahkan.',
        'updated' => 'Data film berhasil diperbarui.',
        'deleted' => 'Data film berhasil dihapus.',
        'not_found' => 'Data film tidak ditemukan.',
    ];

    if (isset($messages[$status])) {
        echo '<p>' . htmlspecialchars($messages[$status]) . '</p>';
    }
    ?>

    <p>
        <a href="index.php?page=film&action=create">
            Tambah Film
        </a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Genre</th>
                <th>Tahun Rilis</th>
                <th>Sutradara</th>
                <th>Durasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($films as $film): ?>
                <tr>
                    <td><?= (int) $film['id'] ?></td>
                    <td><?= htmlspecialchars($film['judul']) ?></td>
                    <td><?= htmlspecialchars($film['genre']) ?></td>
                    <td><?= (int) $film['tahun_rilis'] ?></td>
                    <td><?= htmlspecialchars($film['sutradara']) ?></td>
                    <td><?= (int) $film['durasi'] ?> menit</td>
                    <td>
                        <a href="index.php?page=film&action=edit&id=<?= (int) $film['id'] ?>">
                            Edit
                        </a>

                        <form method="post"
                              action="index.php?page=film&action=delete"
                              onsubmit="return confirm('Hapus data film ini?')">
                            <input type="hidden"
                                   name="id"
                                   value="<?= (int) $film['id'] ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>