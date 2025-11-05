<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #eaf4ff, #ffffff);
            min-height: 100vh;
        }
        .card {
            border-radius: 15px;
        }
        .alert-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex; justify-content: center; align-items: center;
            z-index: 1000;
        }
        .alert-box {
            background: white;
            padding: 25px 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        .alert-box h4 {
            margin-bottom: 10px;
        }
        .btn-alert {
            margin-top: 10px;
            padding: 8px 25px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    @if(session('success') || session('error'))
    <div class="alert-overlay">
        <div class="alert-box">
            <h4 class="{{ session('success') ? 'text-success' : 'text-danger' }}">
                {{ session('success') ? 'Berhasil!' : 'Peringatan!' }}
            </h4>
            <p>{{ session('success') ?? session('error') }}</p>
            <button onclick="this.closest('.alert-overlay').remove()" class="btn-alert">OK</button>
        </div>
    </div>
    @endif

    <div class="container py-5">
        @yield('content')
    </div>
</body>
</html>

