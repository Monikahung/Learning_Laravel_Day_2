<form action="/mahasiswa/update/{{ $mhs->id }}" method="POST">
@csrf
    Nama: <input type="text" name="nama" value="{{ $mhs->nama }}"><br>
    NIM: <input type="text" name="nim" value="{{ $mhs->nim }}"><br>
    Jurusan:
    <select name="jurusan_id">
        @foreach ($jurusan as $j)
            <option value="{{ $j->id }}" {{ $mhs->jurusan_id == $j->id ? 'selected' : '' }}>
                {{ $j->nama_jurusan }}
            </option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>