@extends('layouts.main')

@section('content')
    <h1 class="mt-4">Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Setting</li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>

    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show col-lg-5 col-md-6 col-sm-12"
            role="alert">
            <i class="bi bi-check-circle me-3"></i>
            <div class="fw-medium">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('profil.update') }}" method="POST" class="row">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ $data->name }}"
                                class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama anda"
                                required>
                            @error('nama')
                                <label class="text-danger fw-medium"><i
                                        class="bi bi-exclamation-circle me-2"></i>{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label for="email" class="form-label">Email (Aktif)</label>
                            <input type="email" name="email" id="email" value="{{ $data->email }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email anda"
                                required>
                            @error('email')
                                <label class="text-danger fw-medium"><i
                                        class="bi bi-exclamation-circle me-2"></i>{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label for="telepon" class="form-label">No. Telepon</label>
                            <input type="number" name="telepon" id="telepon" value="{{ $data->telepon }}"
                                class="form-control @error('telepon') is-invalid @enderror"
                                placeholder="Masukkan nomor telepon anda" required>
                            @error('telepon')
                                <label class="text-danger fw-medium"><i
                                        class="bi bi-exclamation-circle me-2"></i>{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="alamat" value="{{ $data->alamat }}"
                                class="form-control @error('alamat') is-invalid @enderror"
                                placeholder="Masukkan alamat anda" required>
                            @error('alamat')
                                <label class="text-danger fw-medium"><i
                                        class="bi bi-exclamation-circle me-2"></i>{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="my-3">
                            <h5>Ganti Password</h5>
                            <hr>
                        </div>
                        <div class="col-md-6 col-lg-6 mb-sm-3 ">
                            <label for="password" class="form-label">Password baru</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan password baru anda">
                            @error('password')
                                <label class="text-danger fw-medium"><i
                                        class="bi bi-exclamation-circle me-2"></i>{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-6 mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Masukkan konfirmasi password anda">
                            @error('password_confirmation')
                                <label class="text-danger fw-medium"><i
                                        class="bi bi-exclamation-circle me-2"></i>{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="col-md-4 col-lg-3 mt-3">
                            <button class="btn btn-primary">Simpan perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
