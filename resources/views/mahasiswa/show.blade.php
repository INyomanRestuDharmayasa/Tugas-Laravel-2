<!DOCTYPE html>
<html>
<head>
    <title>Profil Mahasiswa</title>
    <style>
        body { background-color: #f0f8ff; font-family: Arial, sans-serif; }
        .container { width: 50%; margin: 80px auto; background: white; padding: 25px; border-radius: 12px; box-shadow: 0 5px 10px rgba(0,0,0,0.1); }
        h2 { color: #007BFF; text-align: center; }
        p { font-size: 16px; margin: 10px 0; }
        a { display: inline-block; margin-top: 15px; text-decoration: none; background-color: #007BFF; color: white; padding: 8px 15px; border-radius: 6px; }
        a:hover { background-color: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h2>Profil Mahasiswa</h2>
    <p><strong>ID:</strong> {{ $mahasiswa['id'] }}</p>
    <p><strong>NIM:</strong> {{ $mahasiswa['nim'] }}</p>
    <p><strong>Nama:</strong> {{ $mahasiswa['nama'] }}</p>
    <p><strong>Prodi:</strong> {{ $mahasiswa['prodi'] }}</p>

    <a href="{{ route('mahasiswa.index') }}">Kembali</a>
</div>
</body>
</html>
