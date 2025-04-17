<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Sistem Penjadwalan Kuliah</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar a.active {
            color: #fff;
            background-color: #0d6efd;
        }
        .content {
            padding: 20px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .navbar-brand {
            font-weight: 600;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            font-weight: 600;
        }
        .badge-pill {
            border-radius: 50rem;
        }
    </style>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <h5 class="px-3 pb-3 border-bottom">Sistem Penjadwalan Kuliah</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="<?= base_url('dashboard') ?>" class="<?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dosen') ?>" class="<?= $this->uri->segment(1) == 'dosen' ? 'active' : '' ?>">
                                <i class="fas fa-users me-2"></i> Data Dosen
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('matakuliah') ?>" class="<?= $this->uri->segment(1) == 'matakuliah' ? 'active' : '' ?>">
                                <i class="fas fa-book me-2"></i> Data Mata Kuliah
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('ruang') ?>" class="<?= $this->uri->segment(1) == 'ruang' ? 'active' : '' ?>">
                                <i class="fas fa-door-open me-2"></i> Data Ruang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('jadwal') ?>" class="<?= $this->uri->segment(1) == 'jadwal' && $this->uri->segment(2) != 'weekly' ? 'active' : '' ?>">
                                <i class="fas fa-calendar-alt me-2"></i> Data Jadwal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('jadwal/weekly') ?>" class="<?= $this->uri->segment(1) == 'jadwal' && $this->uri->segment(2) == 'weekly' ? 'active' : '' ?>">
                                <i class="fas fa-calendar-week me-2"></i> Jadwal Mingguan
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?= $title ?></h1>
                </div>
                
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>