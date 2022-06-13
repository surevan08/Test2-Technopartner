@extends('layout.template')

@section('container')
    
{{--  Notif   --}}
@if (session('success'))
<div class="alert alert-primary" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif

<div class="col-md-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
        </div>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
        <div class="card-body">
            <div class="form-group">
                <label  for="jenis_kategori">Jenis Kategori</label>
                <select class="form-control  @error('jenis_kategori') is-invalid @enderror" name="jenis_kategori">
                <option value="">Pilih Jenis</option>
                <option value="Pemasukan">Pemasukan</option>
                <option value="Pengeluaran">Pengeluaran</option> 
                </select>
                 @error('jenis_kategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
           <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                    name="nama_kategori" value="{{ old('nama_kategori') }}" required>
                @error('nama_kategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
            <div class="card-footer text-right">
                <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-secondary">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection