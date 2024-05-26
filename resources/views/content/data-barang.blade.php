@extends('layouts.main')

@section('content')
    <h1 class="mt-4">Data barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Data master</li>
        <li class="breadcrumb-item active">Data barang</li>
    </ol>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <button class="btn btn-primary col-3 col-md-3 col-lg-2 d-flex justify-content-center" data-bs-toggle="modal"
            data-bs-target="#tambahItem"><i class="bi bi-plus-circle me-0 me-md-2 me-lg-2"></i><span
                class="d-none d-md-block d-lg-block">Tambah
                barang</span></button>
        <form class="input-group w-50">
            <button class="input-group-text"><i class="bi bi-search"></i></button>
            <input type="text" class="form-control" name="search" id="floatingInputGroup1" placeholder="Cari disini...">
        </form>
    </div>

    {{-- Modal tambah barang --}}
    <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="tambahItemLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="tambahItemLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('data-barang.create') }}" method="POST" class="modal-body">
                    @csrf
                    <div>
                        <label for="kode_item" class="form-label">Kode barang</label>
                        <input type="text" class="form-control bg-secondary bg-opacity-25" name="kode_item"
                            value="{{ $kode_item }}" id="kode_item" readonly />
                    </div>
                    <div class="mt-3">
                        <label for="nama_item" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_item" name="nama_item"
                            placeholder="Masukkan nama barang" required />
                    </div>
                    <div class="mt-3">
                        <label for="stok_item" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok_item" name="stok_item"
                            placeholder="Masukkan stok barang" required />
                    </div>
                    <div class="d-flex mt-3">
                        <button type="submit" class="btn btn-success col-lg-3 col-md-3 me-3">Simpan</button>
                        <button data-bs-dismiss="modal" type="button"
                            class="btn btn-outline-secondary col-lg-3 col-md-3">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show col-lg-5 col-md-6 col-sm-12"
            role="alert">
            <i class="bi bi-check-circle me-3"></i>
            <div class="fw-medium">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body table-responsive ">
            <table class="w-100 text-center table">
                <thead>
                    <tr class="border-bottom fw-bolder" style="font-size: 0.85rem">
                        <th class="py-3">KODE BARANG</th>
                        <th class="py-3">NAMA BARANG</th>
                        <th class="py-3">STOK</th>
                        <th class="py-3">STATUS</th>
                        <th class="py-3">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="fw-medium border-bottom">
                            <td class="py-3">{{ $item->kode_item }}</td>
                            <td>{{ $item->nama_item }}</td>
                            <td>{{ $item->stok }}</td>
                            <td><span class="badge text-bg-{{ $item->status == 'ready' ? 'success' : 'danger' }}"
                                    style="font-size: 0.85rem">{{ $item->status }}</span></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $item->id }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-{{ $item->status == 'ready' ? 'danger' : 'success' }} mx-2"
                                        data-bs-toggle="modal" data-bs-target="#status{{ $item->id }}"><i
                                            class="bi bi-{{ $item->status == 'ready' ? 'ban' : 'check-circle' }}"></i></button>
                                    <button class="btn btn-info text-white" data-bs-toggle="modal"
                                        data-bs-target="#pakaiItem{{ $item->id }}"
                                        {{ $item->status == 'unready' ? 'disabled' : '' }}><i
                                            class="bi bi-arrow-down-up"></i></button>
                                </div>

                                {{-- modal edit menu --}}
                                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="editLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 fw-bold" id="editLabel">Edit menu</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex flex-column ">
                                                <a href="" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editData{{ $item->id }}"><i
                                                        class="bx bx-edit me-2"></i>Edit
                                                    data</a>
                                                <a href="" class="btn btn-outline-success my-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#tambahStok{{ $item->id }}"><i
                                                        class="bx bx-plus-circle me-2"></i>Tambah
                                                    stok</a>
                                                <a href="" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#kurangStok{{ $item->id }}"><i
                                                        class="bx bx-minus-circle me-2"></i>Kurangi
                                                    stok</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal edit data --}}
                                <div class="modal fade" id="editData{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="editDataLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 fw-bold" id="editDataLabel">Edit data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('data-barang.update', $item->id) }}" method="POST"
                                                class="modal-body text-start">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <label for="id_barang" class="form-label">ID</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $item->id }}" id="id_barang" disabled />
                                                </div>
                                                <div class="mt-3">
                                                    <label for="nama_item" class="form-label">Nama</label>
                                                    <input type="text" value="{{ $item->nama_item }}"
                                                        class="form-control" id="nama_item" name="nama_item"
                                                        placeholder="Masukkan nama barang" required />
                                                </div>
                                                <button class="btn btn-primary mt-3 col-lg-5 col-md-5">Simpan
                                                    perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal kurangi stok --}}
                                <div class="modal fade" id="kurangStok{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="kurangStokLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 fw-bold" id="kurangStokLabel">Kurangi stok
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('data-barang.update.stok', [$item->id, 'keluar']) }}"
                                                method="POST" class="modal-body text-start">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <label for="stok_keluar" class="form-label">Jumlah</label>
                                                    <input type="number" class="form-control" name="stok_keluar"
                                                        id="stok_keluar" placeholder="Masukkan pengurangan stok"
                                                        required />
                                                </div>
                                                <button class="btn btn-primary mt-3 col-lg-5 col-md-5">Simpan
                                                    perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal tambah stok --}}
                                <div class="modal fade" id="tambahStok{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="tambahStokLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 fw-bold" id="tambahStokLabel">Tambah stok</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('data-barang.update.stok', [$item->id, 'masuk']) }}"
                                                method="POST" class="modal-body text-start">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <label for="stok_masuk" class="form-label">Jumlah</label>
                                                    <input type="number" class="form-control" name="stok_masuk"
                                                        id="stok_masuk" placeholder="Masukkan penambahan stok" required />
                                                </div>
                                                <button class="btn btn-primary mt-3 col-lg-5 col-md-5">Simpan
                                                    perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- modal delete --}}
                                <div class="modal fade" id="status{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="statusLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 fw-bold" id="statusLabel">Yakin ingin
                                                    {{ $item->status == 'ready' ? 'menonaktifkan' : 'mengaktifkan' }} item?
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="{{ route('data-barang.status', [$item->id, $item->status == 'ready' ? 'unready' : 'ready']) }}"
                                                    class="btn btn-primary col-4 col-lg-3 col-md-3">Ya</a>
                                                <a href="" class="btn btn-danger ms-3 col-4 col-lg-3 col-md-3"
                                                    data-bs-dismiss="modal">Tidak</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal pakai item --}}
                                <div class="modal fade" id="pakaiItem{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="pakaiItemLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 fw-bold" id="pakaiItemLabel">Penggunaan item
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('data-barang.use', $item->id) }}" method="POST"
                                                class="modal-body text-start">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <label for="jumlah_pakai" class="form-label">Jumlah</label>
                                                    <input type="number" class="form-control" id="jumlah_pakai"
                                                        name="jumlah_pakai"
                                                        placeholder="Masukkan jumlah item yang akan dipakai" required />
                                                </div>
                                                <button class="btn btn-primary mt-3 col-4 col-lg-4 col-md-5">Oke</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if ($info != '')
                        <tr>
                            <td colspan="5" class="py-3 fw-medium">{{ $info }}</td>
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
