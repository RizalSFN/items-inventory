@extends('layouts.main')

@section('content')
    <h1 class="mt-4">History</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Data master</li>
        <li class="breadcrumb-item active">History</li>
    </ol>
    <form action="" method="" class="row align-items-end  mb-4">
        <div class="col-sm-6 col-md-3 col-xl-3">
            <label for="dari" class="form-label fw-medium text-uppercase fs-7">Dari</label>
            <input type="date" class="form-control" value="{{ $dari }}" name="dari" id="dari">
        </div>
        <div class="mx-2 col-sm-6 col-md-3 col-xl-3">
            <label for="sampai" class="form-label fw-medium text-uppercase fs-7">Sampai</label>
            <input type="date" class="form-control" value="{{ $sampai }}" name="sampai" id="sampai">
        </div>
        <div class="me-2 col-sm-6 col-md-3 col-xl-3">
            <label for="kategori" class="form-label fw-medium text-uppercase fs-7">Kategori</label>
            <select class="form-select" name="kategori" id="kategori">
                <option value="stok_masuk" {{ $kategori == 'stok_masuk' ? 'selected' : '' }}>Stok Masuk</option>
                <option value="stok_keluar" {{ $kategori == 'stok_keluar' ? 'selected' : '' }}>Stok Keluar</option>
            </select>
        </div>
        <button class="btn btn-primary col-sm-5 col-md-2 col-xl-2">Tampilkan</button>
    </form>
    <div class="card mb-4">
        <div class="card-body">
            <table class="w-100 text-center table-striped table-hover border ">
                <thead>
                    <tr class="border-bottom fw-bolder " style="font-size: 0.85rem">
                        <th class="py-3">NO</th>
                        <th>KODE BARANG</th>
                        <th>NAMA BARANG</th>
                        <th>{{ $kategori == 'stok_masuk' ? 'STOK MASUK' : 'STOK KELUAR' }}</th>
                        <th>WAKTU</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr class="font-medium border-bottom ">
                            <td class="py-2">{{ $loop->iteration }}.</td>
                            <td>{{ $d->items->kode_item }}</td>
                            <td>{{ $d->items->nama_item }}</td>
                            <td>{{ $kategori == 'stok_masuk' ? $d->stok_masuk : $d->stok_keluar }}</td>
                            <td>{{ $d->created_at }}</td>
                        </tr>
                    @endforeach
                    @if ($info != '')
                        <tr>
                            <td class="fw-medium py-3" colspan="5">{{ $info }}</td>
                        </tr>
                    @elseif ($data->total() > $data->perPage())
                        <tr>
                            <td colspan="5">{{ $data->links('pagination::bootstrap-5') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
