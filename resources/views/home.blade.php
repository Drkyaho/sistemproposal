<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Pengajuan Proposal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (optional, for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        .welcome-section {
            background: linear-gradient(to bottom right, #007bff, #6c757d);
            color: #fff;
            padding: 60px 20px;
        }
        .welcome-section h1 {
            font-size: 2.5rem;
        }
        ol li {
            margin-bottom: 10px;
        }

        footer {
            margin-top: auto; /* Pushing footer to the bottom */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-file-alt"></i> Pengajuan Proposal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="welcome-section text-center">
        <div class="container">
            <h1>Selamat Datang</h1>
            <p class="lead">Informasi Penting Tentang Pengajuan Proposal</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-primary"><i class="fas fa-info-circle"></i> Panduan Pengajuan Proposal</h3>
                        <ol class="mt-3">
                            <li>Judul proposal harus jelas dan sesuai dengan tema yang diinginkan.</li>
                            <li>Abstrak proposal harus menggambarkan secara singkat isi dari proposal tersebut.</li>
                            <li>Menjelaskan alasan mengapa proposal ini dibuat dan apa tujuan dari proposal ini.</li>
                            <li>Menyebutkan metode yang akan digunakan untuk pelaksanaan kegiatan yang ada dalam proposal.</li>
                            <li>Menyediakan jadwal yang jelas tentang kegiatan yang akan dilakukan dalam proposal.</li>
                            <li>Rincian anggaran untuk kegiatan yang diusulkan.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-muted py-3">
        <small>&copy; 2024 Sistem Pengajuan Proposal. All Rights Reserved.</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
