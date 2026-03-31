<h2>Tambah Jurusan</h2>

<form action="/jurusan/update/{{  $jurusan->id }}" method="POST">
@csrf
    Nama Jurusan:
    <input type="text" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}">

    <button type="submit">Update</button>
</form>