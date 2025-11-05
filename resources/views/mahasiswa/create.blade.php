<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 p-5 bg-white rounded shadow" style="max-width:600px;">
    <h3 class="text-center text-primary mb-4">Tambah Mahasiswa</h3>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim') }}">
            @error('nim') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
            @error('nama') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <select name="fakultas" id="fakultas" class="form-select">
                <option value="">-- Pilih Fakultas --</option>
                @foreach($fp as $fakultas => $prodis)
                    <option value="{{ $fakultas }}" {{ old('fakultas') == $fakultas ? 'selected' : '' }}>
                        {{ $fakultas }}
                    </option>
                @endforeach
            </select>
            @error('fakultas') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Prodi</label>
            <select name="prodi" id="prodi" class="form-select">
                <option value="">-- Pilih Prodi --</option>
            </select>
            @error('prodi') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<script>
    const fp = @json($fp);
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
        const oldFak = "{{ old('fakultas') }}";
        const oldProdi = "{{ old('prodi') }}";
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
