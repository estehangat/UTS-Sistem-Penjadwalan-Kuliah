<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-white-75 small">Total Dosen</div>
                        <div class="text-lg fw-bold"><?= $total_dosen ?></div>
                    </div>
                    <i class="fas fa-users fa-2x text-white-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
                <a class="text-white stretched-link" href="<?= base_url('dosen') ?>">Lihat Detail</a>
                <div class="text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-white-75 small">Total Mata Kuliah</div>
                        <div class="text-lg fw-bold"><?= $total_matkul ?></div>
                    </div>
                    <i class="fas fa-book fa-2x text-white-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
                <a class="text-white stretched-link" href="<?= base_url('matakuliah') ?>">Lihat Detail</a>
                <div class="text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-white-75 small">Total Ruang</div>
                        <div class="text-lg fw-bold"><?= $total_ruang ?></div>
                    </div>
                    <i class="fas fa-door-open fa-2x text-white-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
                <a class="text-white stretched-link" href="<?= base_url('ruang') ?>">Lihat Detail</a>
                <div class="text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-danger text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-white-75 small">Total Jadwal</div>
                        <div class="text-lg fw-bold"><?= $total_jadwal ?></div>
                    </div>
                    <i class="fas fa-calendar-alt fa-2x text-white-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between small">
                <a class="text-white stretched-link" href="<?= base_url('jadwal') ?>">Lihat Detail</a>
                <div class="text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-calendar-day me-1"></i>
                Jadwal Hari Ini
            </div>
            <div class="card-body">
                <?php if (empty($jadwal_hari_ini)): ?>
                    <div class="alert alert-info">
                        Tidak ada jadwal perkuliahan untuk hari ini.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dashboardTable">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Mata Kuliah</th>
                                    <th>Dosen</th>
                                    <th>Ruang</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($jadwal_hari_ini as $jadwal): ?>
                                <tr>
                                    <td><?= date('H:i', strtotime($jadwal->jam_mulai)) ?> - <?= date('H:i', strtotime($jadwal->jam_selesai)) ?></td>
                                    <td><?= $jadwal->nama_matkul ?> (<?= $jadwal->kode_matkul ?>)</td>
                                    <td><?= $jadwal->nama_dosen ?></td>
                                    <td><?= $jadwal->nama_ruang ?> (<?= $jadwal->gedung ?>)</td>
                                    <td><?= $jadwal->kelas ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>