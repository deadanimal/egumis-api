@extends('layouts.base')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">

<style>
    .button {
        background-color: #1A7FE5;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>
@section('content')
    <h1 style="color: #003478;">LAPORAN GAGAL LOG MASUK/ SET SEMULA KATA LALUAN/ DAFTAR PENGGUNA MELALUI MOBILE APPS</h1>

    <hr style="color: #003478;">


    <div class="container-fluid">
        <form action="/carian-gagal-log-masuk" method="POST">
            @csrf
            <div class="row mx-2 mb-2 mt-5">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Tempoh:</label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{ $tempoh ?? '' }}" name="tempoh" placeholder="SILA PILIH"
                        class="form-control textbox-n" type="text" onfocus="(this.type='date')"
                        onblur="(this.type='text')" id="date" />
                </div>
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Nama Pengguna:</label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{ $nama_pengguna ?? '' }}" class="form-control" name="nama_pengguna" type="text"
                        placeholder="TAIP DI SINI" />
                </div>
            </div>
            <div class="row mx-2 mb-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Jenis Status:</label>
                </div>
                <div class="col-4 mb-2">
                    {{-- @foreach ($pelaporan as $p) --}}
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected disabled>SILA PILIH</option>
                        <option value="Daftar Pengguna Melalui Mobile Apps">Daftar Pengguna Melalui Mobile Apps</option>
                        <option value="Gagal Log Masuk">Gagal Log Masuk</option>
                        <option value="Lupa Kata Laluan">Lupa Kata Laluan</option>
                    </select>
                    {{-- @endforeach        --}}
                </div>
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">No. Pengenalan:</label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{ $no_ic ?? '' }}" class="form-control" name="no_ic" type="number"
                        placeholder="TAIP DI SINI" />
                </div>
            </div>
            <div class="row mx-2 mb-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Nama:</label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{ $nama_pengguna ?? '' }}" class="form-control" name="nama_pengguna" type="text"
                        placeholder="TAIP DI SINI" />
                </div>
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">E-mel:</label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{ $emel ?? '' }}" class="form-control" name="emel" type="email"
                        placeholder="TAIP DI SINI" />
                </div>
                <div class="col mb-2 text-end">
                    <button class="btn btn-secondary filter-button" type="submit"> Cari
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
        </form>
        <form action="/pelaporan/laporan_gagal_log_masuk" method="GET">
            @csrf
            <div class="col mb-2 text-end">
                <button class="btn" onClick="window.location.reload();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                        <path
                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                        <path fill-rule="evenodd"
                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                    </svg>
                </button>
            </div>
    </div>
    </form>


    <div class="card mt-6">
        <div class="card-body">
            <table class="table line-table mt-6 datatable" style="width:100%">
                <thead class="text-black">
                    <tr>
                        <th class="text-center">Bil.</th>
                        <th class="text-center">Nama Pengguna</th>
                        <th class="text-center">No. Pengenalan</th>
                        <th class="text-center">Nama Penuh</th>
                        <th class="text-center">E-mel</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Tarikh/Masa</th>
                    </tr>
                <tbody id="myAuditTrail">
                    @foreach ($logs as $l)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $l->user->username }}</td>
                            <td>{{ $l->user->identity_number }}</td>
                            <td>{{ $l->full_name }}</td>
                            <td>{{ $l->user->email }}</td>
                            <td>{{ $l->descriptionmy }}
                                {{-- 1. Daftar Pengguna Melalui Mobile Apps
                                2. Gagal Log In
                                3. Reset Kata Laluan --}}
                            </td>
                            <td>{{ $l->created_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>

    </div>
@endsection
