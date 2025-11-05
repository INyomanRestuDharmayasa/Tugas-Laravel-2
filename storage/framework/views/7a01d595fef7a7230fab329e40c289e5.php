<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 p-5 bg-white rounded shadow" style="max-width:600px;">
    <h3 class="text-center text-warning mb-4">Edit Mahasiswa</h3>

    <form action="<?php echo e(route('mahasiswa.update', $mhs['id'])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="<?php echo e(old('nim', $mhs['nim'])); ?>">
            <?php $__errorArgs = ['nim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo e(old('nama', $mhs['nama'])); ?>">
            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <select name="fakultas" id="fakultas" class="form-select">
                <option value="">-- Pilih Fakultas --</option>
                <?php $__currentLoopData = $fp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fakultas => $prodis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($fakultas); ?>" <?php echo e(old('fakultas', $mhs['fakultas'] ?? '') == $fakultas ? 'selected' : ''); ?>>
                        <?php echo e($fakultas); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['fakultas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Prodi</label>
            <select name="prodi" id="prodi" class="form-select">
                <option value="">-- Pilih Prodi --</option>
            </select>
            <?php $__errorArgs = ['prodi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="<?php echo e(route('mahasiswa.index')); ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-warning text-white">Update</button>
        </div>
    </form>
</div>

<script>
    const fp = <?php echo json_encode($fp, 15, 512) ?>;
    const fakultasSel = document.getElementById('fakultas');
    const prodiSel = document.getElementById('prodi');

    fakultasSel.addEventListener('change', function(){
        const prodis = fp[this.value] || [];
        prodiSel.innerHTML = '<option value="">-- Pilih Prodi --</option>';
        prodis.forEach(function(pr){
            const opt = document.createElement('option');
            opt.value = pr;
            opt.text = pr;
            prodiSel.appendChild(opt);
        });
    });

    document.addEventListener('DOMContentLoaded', function(){
        const oldFak = "<?php echo e(old('fakultas', $mhs['fakultas'] ?? '')); ?>";
        const oldProdi = "<?php echo e(old('prodi', $mhs['prodi'] ?? '')); ?>";
        if(oldFak){
            fakultasSel.value = oldFak;
            fakultasSel.dispatchEvent(new Event('change'));
            if(oldProdi){
                prodiSel.value = oldProdi;
            }
        }
    });
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\kampus-laravel\resources\views/mahasiswa/edit.blade.php ENDPATH**/ ?>