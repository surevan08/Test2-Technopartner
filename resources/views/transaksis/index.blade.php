@extends('layout.template')

@section('container')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
    <a href="{{ route('transaksi.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus  fa-sm text-white-50"></i> Tambah Transaksi</a>
</div

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
 
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Transaksi</h3>
                <form action="{{ route('transaksi.index') }}" method="GET">
                    <div class="col-md-12 mt-3">
                        <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dari</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sampai</label>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-eye"></i>
                        </span>
                        <span class="text">Tampilkan</span>
                    </button>
                    </div>
                </form>
            </div>
            <div class="card-body">
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Jenis</th>
                                <th>Nama Kategori</th> 
                                <th>Deskripsi</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($transaksis as $transaksi)
                            <tr>
                                <td>{{ $transaksi->kategoris->jenis_kategori }}</td>
                                <td>{{ $transaksi->kategoris->nama_kategori }}</td> 
                                <td>{{substr( $transaksi->deskripsi,0,20) }}</td> 
                                <td>{{ $transaksi->nominal }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center text-mute" colspan="5">Data post tidak tersedia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
@endsection