<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Jadwal Mingguan</h3>
    <a href="<?= base_url('jadwal') ?>" class="btn btn-secondary">
        <i class="fas fa-list me-1"></i> Daftar Jadwal
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <?php foreach (array_keys($jadwal_mingguan) as $hari): ?>
                            <th class="text-center"><?= $hari ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($jadwal_mingguan as $hari => $jadwal_list): ?>
                            <td width="20%" style="vertical-align: top; min-width: 200px;">
                                <?php if(empty($jadwal_list)): ?>
                                    <div class="text-center p-3 text-muted">Tidak ada jadwal</div>
                                <?php else: ?>
                                    <?php 
                                    // Urutkan jadwal berdasarkan jam mulai
                                    usort($jadwal_list, function($a, $b) {
                                        return strtotime($a->jam_mulai) - strtotime($b->jam_mulai);
                                    });
                                    
                                    foreach ($jadwal_list as $jadwal): 
                                    ?>
                                        <div class="card mb-2 border-left-primary">
                                            <div class="card-body p-3">
                                                <h6 class="mb-1 fw-bold"><?= $jadwal->nama_matkul ?> (<?= $jadwal->kelas ?>)</h6>
                                                <div class="text-sm">
                                                    <i class="fas fa-user me-1 text-muted"></i> <?= $jadwal->nama_dosen ?>
                                                </div>
                                                <div class="text-sm">
                                                    <i class="fas fa-clock me-1 text-muted"></i> <?= $jadwal->jam_mulai ?> - <?= $jadwal->jam_selesai ?>
                                                </div>
                                                <div class="text-sm">
                                                    <i class="fas fa-map-marker-alt me-1 text-muted"></i> <?= $jadwal->nama_ruang ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        <i class="fas fa-info-circle me-1"></i> Keterangan
    </div>
    <div class="card-body">
        <p class="mb-0">Jadwal dikelompokkan berdasarkan hari dan diurutkan berdasarkan waktu mulai perkuliahan. Setiap kartu menampilkan informasi tentang mata kuliah, dosen pengajar, waktu, dan ruangan.</p>
    </div>
</div>