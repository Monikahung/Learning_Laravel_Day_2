<h2>Tambah Jurusan</h2>

<form action="/jurusan/store" method="POST">
@csrf
    Nama Jurusan:
    <input type="text" name="nama_jurusan">

    <button type="submit">Simpan</button>
</form>