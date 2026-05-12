<h2>Data Genre</h2>

<a href="index.php?page=genre&action=create" class="btn btn-success mb-3">Tambah Genre</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Nama Genre</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php 
        $no = 1;
        while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['id_genre'] ?></td>
            <td><?= $row['nama_genre'] ?></td>
            <td>
                <!-- ROUTE BENAR : pakai id= -->
                <a href="index.php?page=genre&action=edit&id=<?= $row['id_genre'] ?>" 
                   class="btn btn-warning btn-sm">Edit</a>

                <a href="index.php?page=genre&action=delete&id=<?= $row['id_genre'] ?>" 
                   onclick="return confirm('Yakin hapus?')" 
                   class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
