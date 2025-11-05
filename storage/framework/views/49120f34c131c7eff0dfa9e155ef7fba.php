<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #e0f2ff, #ffffff);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            background: white;
            padding: 40px;
            margin-top: 60px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #007bff;
            font-weight: 700;
            text-align: center;
        }
        th {
            background-color: #cfe2ff;
            text-align: center;
            vertical-align: middle;
        }
        td {
            text-align: center;
            vertical-align: middle;
        }
        .table {
            width: 100%;
            margin-top: 25px;
        }
        .table th, .table td {
            padding: 12px;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 95%;
            margin: 0 auto;
        }
        .btn-tambah {
            background-color: #007bff;
            color: white;
            font-weight: 600;
            transition: 0.2s;
        }
        .btn-tambah:hover { background-color: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h2>Daftar Mahasiswa</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success text-center mt-3"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="top-bar mt-4">
        <div></div> <!-- spacer kiri -->
        <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-tambah">+ Tambah Mahasiswa</a>
    </div>

    <table class="table table-bordered table-hover mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Fakultas</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($m['id']); ?></td>
                <td><?php echo e($m['nim']); ?></td>
                <td><?php echo e($m['nama']); ?></td>
                <td><?php echo e($m['fakultas'] ?? '-'); ?></td>
                <td><?php echo e($m['prodi']); ?></td>
                <td>
                    <a href="<?php echo e(route('mahasiswa.edit', $m['id'])); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo e($m['id']); ?>">Hapus</button>
                </td>
            </tr>

            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="hapusModal<?php echo e($m['id']); ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center">
                            Apakah yakin ingin menghapus <b><?php echo e($m['nama']); ?></b>?
                        </div>
                        <div class="modal-footer justify-content-center">
                            <form action="<?php echo e(route('mahasiswa.destroy', $m['id'])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center text-muted">Belum ada data mahasiswa.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\kampus-laravel\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>