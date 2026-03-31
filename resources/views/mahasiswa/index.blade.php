<h2>Data Mahasiswa</h2>

<a href="/mahasiswa/create">Tambah</a>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

    @foreach ($data as $d)
        <tr>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->nim }}</td>
            <td>{{ $d->jurusan->nama_jurusan }}</td>
            <td>
                <a href="/mahasiswa/edit/{{ $d->id }}">Edit</a>
                <a href="/mahasiswa/delete/{{ $d->id }}">Hapus</a>
            </td>
        </tr>
    @endforeach
</table>