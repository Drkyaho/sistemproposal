<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengajuan Proposal</title>
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
                <h1 class="text-primary"><i class="fas fa-file-upload"></i> Pengajuan Proposal</h1>
                <p class="text-muted">Kelola pengajuan proposal mahasiswa</p>
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
                        <th>Catatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->npm }}</td>
                        <td>{{ $mhs->judul }}</td>
                        <td>
                            <input type="text" class="form-control" name="dosen1[{{ $mhs->id }}]" placeholder="Nama Dosen 1" value="{{ $mhs->dosen1 }}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="dosen2[{{ $mhs->id }}]" placeholder="Nama Dosen 2" value="{{ $mhs->dosen2 }}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="catatan[{{ $mhs->id }}]" placeholder="Tambahkan catatan">
                        </td>
                        <td>
                            <select class="form-select" name="status[{{ $mhs->id }}]">
                                <option value="diterima" {{ $mhs->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ $mhs->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </td>
                        <td class="text-center">
                        <button class="btn btn-success" data-id="{{ $mhs->id }}" class="btn-update"><i class="fas fa-save"></i> Update</button>
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

    <!-- JavaScript function for update (placeholder, implement as needed) -->
    <script>
    // Fungsi untuk menangani tombol update
    document.querySelectorAll('.btn-update').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const status = document.querySelector(`[name="status[${id}]"]`).value;
            const dosen1 = document.querySelector(`[name="dosen1[${id}]"]`).value;
            const dosen2 = document.querySelector(`[name="dosen2[${id}]"]`).value;

            Swal.fire({
                title: 'Konfirmasi Update',
                text: "Apakah Anda yakin ingin mengupdate data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Update!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim data menggunakan fetch API
                    fetch(`/kta/update/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ status, dosen1, dosen2 })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Sukses!', data.message, 'success').then(() => location.reload());
                            } else {
                                Swal.fire('Gagal!', data.message, 'error');
                            }
                        })
                        .catch(error => Swal.fire('Error!', 'Terjadi kesalahan', 'error'));
                }
            });
        });
    });
</script>

</body>

        

</html>
