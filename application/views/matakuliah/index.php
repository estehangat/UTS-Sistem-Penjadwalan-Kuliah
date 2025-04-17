<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Mata Kuliah</h3>
    <a href="<?= base_url('matakuliah/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Mata Kuliah
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="matakuliahTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($matakuliah as $mk): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $mk->kode_matkul ?></td>
                        <td><?= $mk->nama_matkul ?></td>
                        <td><?= $mk->sks ?></td>
                        <td>
                            <a href="<?= base_url('matakuliah/edit/'.$mk->id_matkul) ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('matakuliah/delete/'.$mk->id_matkul) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if(empty($matakuliah)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data mata kuliah</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>