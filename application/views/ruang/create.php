<div class="card">
    <div class="card-header">
        <i class="fas fa-plus me-1"></i> Tambah Data Ruang
    </div>
    <div class="card-body">
        <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
        
        <form action="<?= base_url('ruang/create') ?>" method="post">
            <div class="mb-3">
                <label for="nama_ruang" class="form-label">Nama Ruang</label>
                <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" value="<?= set_value('nama_ruang') ?>" required>
            </div>
            <div class="mb-3">
                <label for="gedung" class="form-label">Gedung</label>
                <input type="text" class="form-control" id="gedung" name="gedung" value="<?= set_value('gedung') ?>" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('ruang') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>