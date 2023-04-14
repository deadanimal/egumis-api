@extends('layouts.base')

@section('content')
    <h1 style="color: #003478;">PENGURUSAN PENGGUNA</h1>

    <hr style="color: #003478;">
    <div class="card mt-6">
        <div class="card-body">
            <h2 style="color: #003478;">Senarai Pengguna</h2>
            <form action="/carian-senarai-pengguna" method="POST">
                @csrf
                <div class="row mx-2 mb-2 mt-5">
                    <div class="col-4 mb-2 text-end">
                        <label class="col-form-label text-black">Jenis Pengguna:</label>
                    </div>
                    <div class="col-5 mb-2">
                        <select class="form-select categoryFilter" data-column-index='2' aria-label="Default select example"
                            name="jenis_pengguna">
                            <option selected disabled>SILA PILIH</option>
                            <option value="">SEMUA</option>
                            <option value="BPTM">BPTM</option>
                            <option value="BWTD">BWTD</option>
                        </select>
                    </div>
                </div>
                <div class="row mx-2 mb-2 mt-2">
                    <div class="col-4 mb-2 text-end">
                        <label class="col-form-label text-black">Nama:</label>
                    </div>
                    <div class="col-5 mb-2">
                        <input value="{{ $nama ?? '' }}" class="form-control textbox-n" name="nama" type="text" />
                    </div>
                </div>
                <div class="row mx-2 mb-2 mt-2">
                    <div class="col-4 mb-2 text-end">
                        <label class="col-form-label text-black">Nama Pengguna:</label>
                    </div>
                    <div class="col-5 mb-2">
                        <input value="{{ $nama_pengguna ?? '' }}" class="form-control textbox-n" name="nama_pengguna"
                            type="text" />
                    </div>
                </div>
                <div class="row mx-2 mb-2 mt-2">
                    <div class="col-4 mb-2 text-end">
                        <label class="col-form-label text-black">No. Pengenalan:</label>
                    </div>
                    <div class="col-5 mb-2">
                        <input value="{{ $no_kad_pengenalan ?? '' }}" class="form-control textbox-n"
                            name="no_kad_pengenalan" type="number" />
                    </div>
                </div>
                <div class="row mx-2 mb-2 mt-2">
                    <div class="col-4 mb-2 text-end">
                        <label class="col-form-label text-black">E-mel:</label>
                    </div>
                    <div class="col-5 mb-2">
                        <input value="{{ $emel ?? '' }}" class="form-control textbox-n" name="emel" type="text" />
                    </div>

                    <div class="col mb-2 text-end">
                        <button class="btn btn-secondary btn-sm" type="submit">Cari &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
            </form>
            <div class="col mb-2">
                <form action="/pengurusan-pengguna/senarai-pengguna" method="GET">
                    @csrf
                    <button class="btn" onClick="window.location.reload();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path
                                d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                            <path fill-rule="evenodd"
                                d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <form action="/pengurusan-pengguna/daftar-pengguna" method="GET">
            @csrf
            <div class="row mx-2 mb-2 mt-5">
                <div class="col-10 mb-2">
                    <button class="btn btn-secondary" type="submit">Tambah &nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <table class="table line-table mt-6 datatable" style="width:100%">
            <thead class="text-black">
                <tr>
                    <th class="text-center">Bil.</th>
                    <th class="text-center">Nama Pengguna</th>
                    <th class="text-center">No. Pengenalan</th>
                    <th class="text-center">Nama Penuh</th>
                    <th class="text-center">E-mel</th>
                    <th class="text-center">Jenis Pengguna</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Tindakan</th>
                    <th class="text-center">Hapus</th>
                </tr>
            <tbody id="mySenaraiPengguna">
                @foreach ($senarai_pengguna as $s)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $s->username }}</td>
                        <td>{{ $s->identity_number }}</td>
                        <td>{{ $s->full_name }}</td>
                        <td>{{ $s->email }}</td>
                        <td>{{ $s->jenis_pengguna }}</td>
                        <td>{{ $s->status }}</td>
                        <td>
                            <form action="/pengurusan-pengguna/senarai-pengguna/kemaskini/{{ $s->id }}"
                                method="GET">
                                @csrf
                                {{-- <div class="center"> --}}
                                <button class="btn btn-secondary" style="text-align: center">Kemaskini</button>
                                {{-- </div> --}}
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-secondary" type="button" style="text-align: center"
                                data-toggle="modal"
                                data-target="#exampleModalCenter{{ $loop->iteration }}">Hapus</button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{ $loop->iteration }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="exampleModalLongTitle">Adakah anda
                                                ingin menghapuskan maklumat bagi pengguna <b>{{ $s->full_name }}</b> ?</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/pengurusan-pengguna/senarai-pengguna/{{ $s->id }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-secondary" type="submit">Hapus</button>
                                            </form>
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div>
@endsection
