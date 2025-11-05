<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    private $file = 'mahasiswa.json';

    private function loadData()
    {
        if (!file_exists(storage_path($this->file))) {
            file_put_contents(storage_path($this->file), json_encode([]));
        }
        return json_decode(file_get_contents(storage_path($this->file)), true);
    }

    private function saveData($data)
    {
        file_put_contents(storage_path($this->file), json_encode($data, JSON_PRETTY_PRINT));
    }

    // ======================= //
    // Fakultas & Prodi UNUD
    // ======================= //
    private function fakultasProdi()
    {
        return [
            'Fakultas Ilmu Budaya' => [
                'Antropologi Budaya',
                'Arkeologi',
                'Ilmu Sejarah',
                'Sastra Bali',
                'Sastra Indonesia',
                'Sastra Inggris',
                'Sastra Jepang',
            ],
            'Fakultas Kedokteran' => [
                'Pendidikan Dokter',
                'Kedokteran Gigi',
                'Keperawatan',
                'Kesehatan Masyarakat',
                'Psikologi',
            ],
            'Fakultas Hukum' => [
                'Ilmu Hukum',
            ],
            'Fakultas Teknik' => [
                'Arsitektur',
                'Teknik Elektro',
                'Teknik Mesin',
                'Teknik Sipil',
                'Teknologi Informasi',
                'Teknik Industri',
            ],
            'Fakultas Pertanian' => [
                'Agribisnis',
                'Agroteknologi',
                'Arsitektur Pertamanan',
            ],
            'Fakultas Ekonomi dan Bisnis' => [
                'Akuntansi',
                'Manajemen',
                'Ekonomi Pembangunan',
            ],
            'Fakultas Peternakan' => [
                'Peternakan',
            ],
            'Fakultas Matematika dan Ilmu Pengetahuan Alam' => [
                'Biologi',
                'Farmasi',
                'Fisika',
                'Ilmu Komputer',
                'Kimia',
                'Matematika',
            ],
            'Fakultas Kedokteran Hewan' => [
                'Kedokteran Hewan',
            ],
            'Fakultas Teknologi Pertanian' => [
                'Ilmu dan Teknologi Pangan',
                'Teknik Pertanian dan Biosistem',
                'Teknologi Industri Pertanian',
            ],
            'Fakultas Pariwisata' => [
                'Pariwisata',
                'Destinasi Pariwisata',
                'Industri Perjalanan Wisata',
            ],
            'Fakultas Ilmu Sosial dan Ilmu Politik' => [
                'Perpustakaan',
                'Administrasi Negara',
                'Hubungan Internasional',
                'Ilmu Komunikasi',
                'Ilmu Politik',
                'Sosiologi',
            ],
            'Fakultas Kelautan dan Perikanan' => [
                'Ilmu Kelautan',
                'Manajemen Sumberdaya Perairan',
            ],
        ];
    }

    // ======================= //
    // CRUD Function
    // ======================= //

    public function index()
    {
        $mahasiswa = $this->loadData();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $fp = $this->fakultasProdi();
        return view('mahasiswa.create', compact('fp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric',
            'nama' => 'required|regex:/^[A-Za-z\s]+$/',
            'fakultas' => 'required|string',
            'prodi' => 'required|string'
        ], [
            'nim.numeric' => 'NIM hanya boleh berisi angka.',
            'nama.regex' => 'Nama hanya boleh huruf.',
            'prodi.regex' => 'Prodi hanya boleh huruf.'
        ]);

        $data = $this->loadData();
        $nextId = count($data) + 1;
        $data[] = [
            'id' => $nextId,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi
        ];
        $this->saveData($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa disimpan.');
    }

    public function edit($id)
    {
        $data = $this->loadData();
        $mhs = collect($data)->firstWhere('id', (int)$id);
        $fp = $this->fakultasProdi();
        return view('mahasiswa.edit', compact('mhs', 'fp'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|numeric',
            'nama' => 'required|regex:/^[A-Za-z\s]+$/',
            'fakultas' => 'required|string',
            'prodi' => 'required|string'
        ], [
            'nim.numeric' => 'NIM hanya boleh berisi angka.',
            'nama.regex' => 'Nama hanya boleh huruf.',
            'prodi.regex' => 'Prodi hanya boleh huruf.'
        ]);

        $data = $this->loadData();
        foreach ($data as &$m) {
            if ($m['id'] == $id) {
                $m['nim'] = $request->nim;
                $m['nama'] = $request->nama;
                $m['fakultas'] = $request->fakultas;
                $m['prodi'] = $request->prodi;
                break;
            }
        }
        $this->saveData($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa diperbarui.');
    }

    public function destroy($id)
    {
        $data = $this->loadData();
        $data = array_values(array_filter($data, fn($m) => $m['id'] != $id));
        $this->saveData($data);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa dihapus.');
    }
}
