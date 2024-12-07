<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengajuan Proposal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Pengajuan Proposal</h1>
        
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Judul</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->npm }}</td>
                    <td>{{ $mhs->judul }}</td>
                    <td>{{ ucfirst($mhs->status) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
