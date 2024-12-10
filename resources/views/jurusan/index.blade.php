<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengajuan Proposal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi custom */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media print {

            /* Sembunyikan tombol print dan elemen tidak relevan saat cetak */
            .no-print {
                display: none !important;
            }

            /* Maksimalkan tabel untuk cetak */
            body {
                margin: 0;
                padding: 0;
            }

            .bg-gradient-to-br,
            .bg-gradient-to-r,
            .bg-indigo-600,
            .bg-indigo-700,
            .bg-green-500,
            .bg-red-500,
            .text-white {
                background: #fff !important;
                color: #000 !important;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin: 0;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 8px;
                text-align: center;
            }

            th {
                background-color: #e5e7eb;
                /* Abu-abu terang */
                color: #000;
            }

            tr:nth-child(even) td {
                background-color: #f9f9f9;
                /* Abu-abu muda */
            }

            tr:nth-child(odd) td {
                background-color: #fff;
            }

            /* Mengatur ukuran font */
            th,
            td {
                font-size: 12px;
            }

            footer {
                display: none;
            }
        }
    </style>
</head>

<body
    class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 min-h-screen flex flex-col justify-center items-center font-sans">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-7xl w-full mx-4 animate-fadeIn">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800"><i class="fas fa-file-alt"></i> Hasil Pengajuan Proposal</h1>
                <p class="text-gray-500">Daftar hasil pengajuan proposal mahasiswa</p>
            </div>
            <div class="no-print">
                <button onclick="window.print()"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow-md transform transition-all duration-300 hover:scale-105">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
                        <th class="py-3 px-4 border-b border-gray-200 text-center">Nama</th>
                        <th class="py-3 px-4 border-b border-gray-200 text-center">NPM</th>
                        <th class="py-3 px-4 border-b border-gray-200 text-center">Judul</th>
                        <th class="py-3 px-4 border-b border-gray-200 text-center">Dosen Pembimbing 1</th>
                        <th class="py-3 px-4 border-b border-gray-200 text-center">Dosen Pembimbing 2</th>
                        <th class="py-3 px-4 border-b border-gray-200 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $mhs)
                        <tr class="hover:bg-gray-100 transition-colors duration-300">
                            <td class="py-3 px-4 border-b border-gray-200 text-center">{{ $mhs->nama }}</td>
                            <td class="py-3 px-4 border-b border-gray-200 text-center">{{ $mhs->npm }}</td>
                            <td class="py-3 px-4 border-b border-gray-200 text-center">{{ $mhs->judul }}</td>
                            <td class="py-3 px-4 border-b border-gray-200 text-center">{{ $mhs->dospem_1 }}</td>
                            <td class="py-3 px-4 border-b border-gray-200 text-center">{{ $mhs->dospem_2 }}</td>
                            <td class="py-3 px-4 border-b border-gray-200 text-center">
                                <span
                                    class="px-3 py-1 rounded-full text-white text-sm font-medium bg-{{ $mhs->status == 'diterima' ? 'green-500' : 'red-500' }}">
                                    {{ ucfirst($mhs->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <footer class="mt-6 text-center text-gray-500 no-print">
            <small>&copy; {{ date('Y') }} Jurusan Sistem Informasi. All Rights Reserved.</small>
        </footer>
    </div>
</body>

</html>
