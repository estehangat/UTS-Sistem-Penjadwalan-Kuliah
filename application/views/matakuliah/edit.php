<div class="card">
    <div class="card-header">
        <i class="fas fa-edit me-1"></i> Edit Data Mata Kuliah
    </div>
    <div class="card-body">
        <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
        
        <form action="<?= base_url('matakuliah/edit/'.$matkul->id_matkul) ?>" method="post">
            <div class="mb-3">
                <label for="kode_matkul" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" value="<?= set_value('kode_matkul', $matkul->kode_matkul) ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_matkul" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" value="<?= set_value('nama_matkul', $matkul->nama_matkul) ?>" required>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="number" class="form-control" id="sks" name="sks" value="<?= set_value('sks', $matkul->sks) ?>" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('matakuliah') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>