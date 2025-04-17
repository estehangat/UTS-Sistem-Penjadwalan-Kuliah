<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Jadwal Kuliah</h3>
    <a href="<?= base_url('jadwal/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Jadwal
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="jadwalTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Dosen</th>
                        <th>Mata Kuliah</th>
                        <th>Kelas</th>
                        <th>Ruang</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($jadwal as $jd): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $jd->nama_dosen ?></td>
                        <td><?= $jd->nama_matkul ?></td>
                        <td><?= $jd->kelas ?></td>
                        <td><?= $jd->nama_ruang ?></td>
                        <td><?= $jd->hari ?></td>
                        <td><?= $jd->jam_mulai ?> - <?= $jd->jam_selesai ?></td>
                        <td>
                            <a href="<?= base_url('jadwal/edit/'.$jd->id_jadwal) ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('jadwal/delete/'.$jd->id_jadwal) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if(empty($jadwal)): ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data jadwal</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>