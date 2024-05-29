<h1>DATA KELAS XI SMK4 BANDUNG</h1>

@session('success')
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endsession

@session('error')
<div class="alert alert-error">
    {{ session('error') }}
</div>
@endsession

<a href="{{ url('/kelas/create')}}">Tambah Data</a>
<table border="1">
    <tr>
        <td>No</td>
        <td>Nama Kelas</td>
        <td>Jurusan</td>
        <td>Lokasi Ruangan</td>
        <td>Nama Wali Kelas</td>
    </tr>
    @foreach ($kelas as $row)
    <tr>
        <td>{{ isset($i) ? ++$i: $i=1 }} </td>
        <td>{{ $row->nama_kelas }}</td>
        <td>{{ $row->jurusan }}</td>
        <td>{{ $row->lokasi_ruangan }}</td>
        <td>{{ $row->nama_wali_kelas }}</td>
    </tr>
    @endforeach
</table>