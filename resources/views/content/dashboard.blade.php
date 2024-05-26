@extends('layouts.main')

@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card mb-4 shadow-sm border-white">
                <div class="card-body bg-white bg-opacity-10">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                            <h5 class="text-primary">Total barang</h5>
                            <h5 class="fw-bold mt-2">{{ $item }}</h5>
                        </div>
                        <i class="bi bi-boxes fs-1 px-3 py-1 rounded"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card mb-4 shadow-sm border-white">
                <div class="card-body bg-white bg-opacity-10">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                            <h5 class="text-primary">Stok masuk hari ini</h5>
                            <h5 class="fw-bold mt-2">{{ count($stok_masuk) == 0 ? 0 : $stok_masuk->sum('stok_masuk') }}</h5>
                        </div>
                        <i class="bi bi-database-up fs-1 px-3 py-1 rounded"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card mb-4 shadow-sm border-white">
                <div class="card-body bg-white bg-opacity-10">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column">
                            <h5 class="text-primary">Stok keluar hari ini</h5>
                            <h5 class="fw-bold mt-2">{{ count($stok_keluar) == 0 ? 0 : $stok_keluar->sum('stok_keluar') }}
                            </h5>
                        </div>
                        <i class="bi bi-database-down fs-1 px-3 py-1 rounded"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
