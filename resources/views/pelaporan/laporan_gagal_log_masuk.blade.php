@extends('layouts.base')
@section('content')
    <h1 style="color: #003478;">LAPORAN GAGAL LOG MASUK/ SET SEMULA KATA LALUAN/ DAFTAR PENGGUNA MELALUI MOBILE APPS</h1>

    <hr style="color: #003478;">


    <form action="/pelaporan/carian-gagal-log-masuk" method="POST" class="container-fluid">
        @csrf
        <input type="hidden" name="a" value="123">
        <div class="row mt-3">
            <div class="col-4 text-end">
                <label class="col-form-label text-black">Jenis Status:</label>
            </div>
            <div class="col-4">
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected disabled hidden>SILA PILIH</option>
                    <option value="USER REGISTERED">Daftar Pengguna Melalui Mobile Apps</option>
                    <option value="LOGIN FAIL">Gagal Log Masuk</option>
                    <option value="FORGOT PASS">Lupa Kata Laluan</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-4 text-end">
                <label class="col-form-label text-black">Nama Pengguna:</label>
            </div>
            <div class="col-4">
                <input value="{{ $nama_pengguna ?? '' }}" class="form-control" name="nama_pengguna" type="text"
                    placeholder="TAIP DI SINI" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4 text-end">
                <label class="col-form-label text-black">Nama Penuh:</label>
            </div>
            <div class="col-4">
                <input value="{{ $nama_penuh ?? '' }}" class="form-control" name="nama_penuh" type="text"
                    placeholder="TAIP DI SINI" />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-4 text-end">
                <label class="col-form-label text-black">No. Pengenalan:</label>
            </div>
            <div class="col-4">
                <input value="{{ $no_ic ?? '' }}" class="form-control" name="no_ic" type="number"
                    placeholder="TAIP DI SINI" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4 text-end">
                <label class="col-form-label text-black">E-mel:</label>
            </div>
            <div class="col-4">
                <input value="{{ $emel ?? '' }}" class="form-control" name="emel" type="email"
                    placeholder="TAIP DI SINI" />
            </div>
            <div class="col-4 text-end">
                <button type="submit" class="btn btn-secondary">Cari <span class="fas fa-search"></span></button>
                <a href="/pelaporan/laporan_gagal_log_masuk" class="btn btn-secondary d-inline-flex">Set Semula <span
                        class="ms-1 refreshbtn" data-feather="refresh-ccw"></span></a>
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
@endsection
