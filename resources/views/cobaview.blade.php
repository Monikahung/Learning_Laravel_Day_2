<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Laravel</title>
    <!-- Link CSS eksternal yang tersimpan di folder public > template > css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/css/cobacss.css') }}">
</head>
<body>
    <h1>Selamat Datang, Tetap Semangat Untuk Belajar Laravel!</h1>
    <!-- Menampilkan gambar yang disimpan di folder public > gambar -->
    <img src="{{ asset('gambar/pantai.jpg') }}"/>
</body>
</html>