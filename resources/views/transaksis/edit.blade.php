@extends('layout.template')

@section('container')
    
{{--  Notif   --}}
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-error">
    {{ session('error') }}
</div>
@endif

<div class="col-md-8 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Transaksi</h6>
        </div>
        <form action="{{ route('transaksi.update',$transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="card-body">
               <div class="form-group">
                <label  for="id">Jenis Kategori</label>
                <select class="form-control  @error('kategoris_id') is-invalid @enderror" name="kategoris_id">
                <option value="">Pilih Jenis</option>
                @forelse ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $transaksi->kategoris_id == $kategori->id ? 'selected':'' }}>Jenis : {{ $kategori->jenis_kategori  }} | Nama : {{ $kategori->nama_kategori  }} </option> 
                @empty
                    <option value="">Tidak Ada Kategori</option>
                @endforelse 
                </select>
            </div>
            <!-- error message -->
             @error('id_kategori')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        <div class="input-group">
            <span class="input-group">Deskripsi</span>
            <div class="input-group">
            </div>
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi', $transaksi->deskripsi) }}</textarea>
          <!-- error message -->
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
        </div>
        <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="number" class="form-control @error('nominal') is-invalid @enderror"
                    name="nominal" value="{{ old('nominal', $transaksi->nominal) }}" required>
                <!-- error message -->
                @error('nominal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
            <div class="card-footer text-right">
                <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-secondary">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection