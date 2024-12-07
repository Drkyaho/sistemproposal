<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengajuan Proposal</title>
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
                <h1 class="text-primary"><i class="fas fa-file-alt"></i> Hasil Pengajuan Proposal</h1>
                <p class="text-muted">Daftar hasil pengajuan proposal mahasiswa</p>
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-outline-primary"><i class="fas fa-download"></i> Unduh PDF</button>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Judul</th>
                        <th>Dosen Pembimbing 1</th>
                        <th>Dosen Pembimbing 2</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->npm }}</td>
                        <td>{{ $mhs->judul }}</td>
                        <td>{{ $mhs->dospem_1 }}</td>
                        <td>{{ $mhs->dospem_2 }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{ $mhs->status == 'diterima' ? 'success' : 'danger' }}">
                                {{ ucfirst($mhs->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <footer class="mt-5 text-center text-muted">
            <small>&copy; {{ date('Y') }} Jurusan Sistem Informasi. All Rights Reserved.</small>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
