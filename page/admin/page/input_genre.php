<?php $isEdit = isset($data); ?>

<h2><?= $isEdit ? "Edit Genre" : "Tambah Genre" ?></h2>

<form action="index.php?page=genre&action=<?= $isEdit ? 'update&id='.$data['id_genre'] : 'store' ?>" 
      method="POST">

    <?php if ($isEdit): ?>
        <!-- HIDDEN ID DIPERTAHANKAN -->
        <input type="hidden" name="id" value="<?= $data['id_genre'] ?>">
    <?php endif; ?>

    <div class="mb-3">
        <label class="form-label">Nama Genre</label>
        <input type="text" name="nama_genre" class="form-control"
               value="<?= $isEdit ? $data['nama_genre'] : '' ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">
        <?= $isEdit ? "Update" : "Simpan" ?>
    </button>
</form>
