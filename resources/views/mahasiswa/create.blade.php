<form action="/mahasiswa/store" method="POST">
@csrf
    Nama: <input type="text" name="nama"><br>
    NIM: <input type="text" name="nim"><br>
    Jurusan:
    <select name="jurusan_id">
        @foreach ($jurusan as $j)
            <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>