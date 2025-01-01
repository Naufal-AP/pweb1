<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Alumni</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Tracer Alumni</h1>
    <form id="formAlumni">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="tahun_lulus">Tahun Lulus:</label>
        <input type="number" id="tahun_lulus" name="tahun_lulus" required><br><br>

        <label for="pekerjaan">Pekerjaan:</label>
        <input type="text" id="pekerjaan" name="pekerjaan" required><br><br>

        <button type="submit">Kirim</button>
    </form>

    <h2>Daftar Alumni</h2>
    <table border="1" id="tabelAlumni">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tahun Lulus</th>
                <th>Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data akan dimuat di sini -->
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            // Fungsi untuk memuat data alumni
            function muatAlumni() {
                $.ajax({
                    url: 'submit_data.php',
                    type: 'GET',
                    success: function (data) {
                        $('#tabelAlumni tbody').html(data);
                    }
                });
            }

            muatAlumni(); // Muat data pertama kali

            // Mengirim data dari form
            $('#formAlumni').submit(function (e) {
                e.preventDefault();
                const dataForm = $(this).serialize();

                $.ajax({
                    url: 'submit_data.php',
                    type: 'POST',
                    data: dataForm,
                    success: function (respon) {
                        alert(respon);
                        muatAlumni(); // Muat ulang data
                        $('#formAlumni')[0].reset(); // Reset form
                    }
                });
            });
        });
    </script>
</body>

</html>