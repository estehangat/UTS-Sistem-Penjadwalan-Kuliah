<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Dosen</h3>
    <a href="<?= base_url('dosen/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Dosen
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dosenTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dosen</th>
                        <th>NIP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($dosen as $dos): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $dos->nama_dosen ?></td>
                        <td><?= $dos->nip ?></td>
                        <td>
                            <a href="<?= base_url('dosen/edit/'.$dos->id_dosen) ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('dosen/delete/'.$dos->id_dosen) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if(empty($dosen)): ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data dosen</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>