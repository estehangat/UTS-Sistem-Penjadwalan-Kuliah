<div class="card">
    <div class="card-header">
        <i class="fas fa-plus me-1"></i> Tambah Data Jadwal
    </div>
    <div class="card-body">
        <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
        
        <form action="<?= base_url('jadwal/create') ?>" method="post">
        <div class="mb-3">
                <label for="id_dosen" class="form-label">Dosen</label>
                <select name="id_dosen" id="id_dosen" class="form-control" required>
                    <option value="">-- Pilih Dosen --</option>
                    <?php foreach($dosen as $d): ?>
                        <option value="<?= $d->id_dosen ?>" <?= set_select('id_dosen', $d->id_dosen) ?>><?= $d->nama_dosen ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('id_dosen', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="mb-3">
                <label for="id_matkul" class="form-label">Mata Kuliah</label>
                <select name="id_matkul" id="id_matkul" class="form-control" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    <?php foreach($matakuliah as $m): ?>
                        <option value="<?= $m->id_matkul ?>" <?= set_select('id_matkul', $m->id_matkul) ?>><?= $m->nama_matkul ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('id_matkul', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" maxlength="1" placeholder="Contoh: A, B, C" value="<?= set_value('kelas') ?>" required>
                <?= form_error('kelas', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="mb-3">
                <label for="id_ruang" class="form-label">Ruang</label>
                <select name="id_ruang" id="id_ruang" class="form-control" required>
                    <option value="">-- Pilih Ruang --</option>
                    <?php foreach($ruang as $r): ?>
                        <option value="<?= $r->id_ruang ?>" <?= set_select('id_ruang', $r->id_ruang) ?>><?= $r->nama_ruang ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('id_ruang', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" id="hari" class="form-control" required>
                    <option value="">-- Pilih Hari --</option>
                    <option value="Senin" <?= set_select('hari', 'Senin') ?>>Senin</option>
                    <option value="Selasa" <?= set_select('hari', 'Selasa') ?>>Selasa</option>
                    <option value="Rabu" <?= set_select('hari', 'Rabu') ?>>Rabu</option>
                    <option value="Kamis" <?= set_select('hari', 'Kamis') ?>>Kamis</option>
                    <option value="Jumat" <?= set_select('hari', 'Jumat') ?>>Jumat</option>
                </select>
                <?= form_error('hari', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" value="<?= set_value('jam_mulai') ?>" required>
                        <?= form_error('jam_mulai', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="<?= set_value('jam_selesai') ?>" required>
                        <?= form_error('jam_selesai', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('dosen') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>