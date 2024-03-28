<!-- resources/views/kota/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kota</title>
</head>
<body>
    <h1>Data Kota</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kota</th>
                <th>Negara</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kotas as $kota)
                <tr>
                    <td>{{ $kota->id }}</td>
                    <td>{{ $kota->nama }}</td>
                    <td>{{ $kota->negara }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Tombol Ekspor Excel -->
    <form id="exportForm" action="{{ route('export.data') }}" method="POST">
        @csrf
        <button type="submit">Ekspor ke Excel</button>
    </form>

    <!-- JavaScript untuk menangkap respons dari server -->
    <script>
        document.getElementById('exportForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah formulir dikirim secara default
            
            // Mengirimkan permintaan ekspor menggunakan fetch API
            fetch(this.action, {
                method: this.method,
                body: new FormData(this), // Mengirim data formulir
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Terjadi kesalahan saat mengirimkan permintaan.');
                }
                return response.json(); // Mengambil respons JSON dari server
            })
            .then(data => {
                alert(data.message); // Menampilkan pesan alert dari respons JSON
            })
            .catch(error => {
                console.error('Ada kesalahan:', error);
                alert('Terjadi kesalahan saat ekspor data.');
            });
        });
    </script>
</body>
</html>
