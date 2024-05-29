@session('error')
<div class="alert alert-error">
    {{session('error')}}
</div>
@endsession

@if ($errors->any())
<div class="alert alert-danger">
    <strong>PERHATIAN!</strong>
    <br>    
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif

<h1>Form Kelas</h1>
<form action="{{ url('kelas') }}" method="POST">
    @csrf

    Nama Kelas: <input type="text" name="nama_kelas" value="{{ old('nama_kelas') }}"><br>
    Nama Jurusan: <input type="text" name="jurusan" value="{{ old('jurusan') }}"><br>
    Lokasi Ruangan: <input type="text" name="lokasi_ruangan" value="{{ old('lokasi_ruangan') }}"><br>
    Nama Wali Kelas: <input type="text" name="nama_wali_kelas" value="{{ old('nama_wali_kelas') }}"><br>
    <input type="submit" value="simpan">
</form>