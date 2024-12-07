<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Judul Proposal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (optional, for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container mt-5">
        <!-- Header -->
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-md-6">
                <h1 class="text-primary"><i class="fas fa-edit"></i> Pengajuan Judul Proposal</h1>
                <p class="text-muted">Isi formulir di bawah untuk mengajukan judul proposal</p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Pengajuan -->
        <form method="POST" action="/mahasiswa" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control"
                    placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" name="npm" id="npm" class="form-control" placeholder="Masukkan NPM"
                    required>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Proposal</label>
                <input type="text" name="judul" id="judul" class="form-control"
                    placeholder="Masukkan judul proposal" required>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
            </div>
        </form>

        <!-- Daftar Pengajuan -->
        <hr class="my-5">
        <h2 class="text-primary"><i class="fas fa-list"></i> Daftar Pengajuan</h2>
        <div class="row mt-4">
            @foreach ($mahasiswa as $mhs)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $mhs->nama }}</h5>
                            <p class="card-text"><strong>Judul:</strong> {{ $mhs->judul }}</p>
                            <p><strong>Dosen Pembimbing 1:</strong> {{ $mhs->dospem_1 }}</p>
                            <p><strong>Dosen Pembimbing 2:</strong> {{ $mhs->dospem_2 }}</p>
                            <p><strong>Catatan:</strong> {{ $mhs->catatan_dospem }}</p>
                            <p class="mb-1">
                                <strong>Status:</strong>
                                <span
                                    class="badge bg-{{ $mhs->status == 'diterima' ? 'success' : ($mhs->status == 'ditolak' ? 'danger' : 'secondary') }}">
                                    {{ ucfirst($mhs->status ?? 'Pending') }}
                                </span>
                            </p>
                            <p class="text-muted small mb-0"><i class="fas fa-calendar-alt"></i> Diajukan pada
                                {{ $mhs->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-muted mt-5">
        <small>&copy; {{ date('Y') }} Jurusan Sistem Informasi. All Rights Reserved.</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
