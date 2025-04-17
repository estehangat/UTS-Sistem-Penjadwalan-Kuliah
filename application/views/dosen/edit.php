<div class="card">
    <div class="card-header">
        <i class="fas fa-edit me-1"></i> Edit Data Dosen
    </div>
    <div class="card-body">
        <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
        
        <form action="<?= base_url('dosen/edit/'.$dosen->id_dosen) ?>" method="post">
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="<?= set_value('nama_dosen', $dosen->nama_dosen) ?>" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" value="<?= set_value('nip', $dosen->nip) ?>" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('dosen') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>