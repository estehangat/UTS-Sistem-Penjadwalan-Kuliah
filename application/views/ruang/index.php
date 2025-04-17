<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Ruang</h3>
    <a href="<?= base_url('ruang/create') ?>" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Ruang
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="ruangTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ruang</th>
                        <th>Gedung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($ruang as $r): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $r->nama_ruang ?></td>
                        <td><?= $r->gedung ?></td>
                        <td>
                            <a href="<?= base_url('ruang/edit/'.$r->id_ruang) ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('ruang/delete/'.$r->id_ruang) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if(empty($ruang)): ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data ruang</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>