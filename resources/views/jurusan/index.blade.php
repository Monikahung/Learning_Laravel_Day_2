<h2>Data Jurusan</h2>

<a href="/jurusan/create">Tambah Jurusan</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Nama Jurusan</th>
        <th>Aksi</th>
    </tr>

    @foreach ($data as $j)
        <tr>
            <td>{{ $j->nama_jurusan }}</td>
            <td>
                <a href="/jurusan/edit/{{ $j->id }}">Edit</a>
                <a href="/jurusan/delete/{{ $j->id }}">Hapus</a>
            </td>
        </tr>
    @endforeach
</table>