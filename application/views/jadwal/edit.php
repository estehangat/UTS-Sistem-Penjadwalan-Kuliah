<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Edit Jadwal</h3>
    <a href="<?= base_url('jadwal') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('jadwal/edit/'.$jadwal->id_jadwal) ?>" method="post">
            <div class="mb-3">
                <label for="id_dosen" class="form-label">Dosen</label>
                <select name="id_dosen" id="id_dosen" class="form-control" required>
                    <option value="">-- Pilih Dosen --</option>
                    <?php foreach($dosen as $d): ?>
                        <option value="<?= $d->id_dosen ?>" <?= ($jadwal->id_dosen == $d->id_dosen) ? 'selected' : '' ?>><?= $d->nama_dosen ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('id_dosen', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="mb-3">
                <label for="id_matkul" class="form-label">Mata Kuliah</label>
                <select name="id_matkul" id="id_matkul" class="form-control" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    <?php foreach($matakuliah as $m): ?>
                        <option value="<?= $m->id_matkul ?>" <?= ($jadwal->id_matkul == $m->id_matkul) ? 'selected' : '' ?>><?= $m->nama_matkul ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('id_matkul', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="mb-3">
                <label for="id_kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" maxlength="1" value="<?= set_value('id_kelas', $jadwal->kelas) ?>" required>
                <?= form_error('id_kelas', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="mb-3">
                <label for="id_ruang" class="form-label">Ruang</label>
                <select name="id_ruang" id="id_ruang" class="form-control" required>
                    <option value="">-- Pilih Ruang --</option>
                    <?php foreach($ruang as $r): ?>
                        <option value="<?= $r->id_ruang ?>" <?= ($jadwal->id_ruang == $r->id_ruang) ? 'selected' : '' ?>><?= $r->nama_ruang ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('id_ruang', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" id="hari" class="form-control" required>
                    <option value="">-- Pilih Hari --</option>
                    <option value="Senin" <?= ($jadwal->hari == 'Senin') ? 'selected' : '' ?>>Senin</option>
                    <option value="Selasa" <?= ($jadwal->hari == 'Selasa') ? 'selected' : '' ?>>Selasa</option>
                    <option value="Rabu" <?= ($jadwal->hari == 'Rabu') ? 'selected' : '' ?>>Rabu</option>
                    <option value="Kamis" <?= ($jadwal->hari == 'Kamis') ? 'selected' : '' ?>>Kamis</option>
                    <option value="Jumat" <?= ($jadwal->hari == 'Jumat') ? 'selected' : '' ?>>Jumat</option>
                </select>
                <?= form_error('hari', '<small class="text-danger">', '</small>') ?>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="waktu" class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" value="<?= set_value('waktu', $jadwal->jam_mulai) ?>" required>
                        <?= form_error('waktu', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="waktu" class="form-label">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="<?= set_value('waktu', $jadwal->jam_selesai) ?>" required>
                        <?= form_error('waktu', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>