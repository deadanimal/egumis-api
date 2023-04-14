@extends('layouts.base')


<style>
    /* div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    } */
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

    .button:hover {
        background-color: #1A7FE5;
        color: white;
    }

    .btn-datatable {
        background: green;
    }

    .calendar-icon {
        padding-right: 150px;
        background: url("/assets/img/calendar.png") no-repeat right;
        background-size: 20px;
    }
</style>
@section('content')
    <h1 style="color: #003478;">AUDIT TRAIL</h1>

    <hr style="color: #003478;">

    <div class="container-fluid">
        <form action="/carian-laporan" method="POST">
            @csrf
            <div class="row mx-2 mb-2 mt-5">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Tempoh:</label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{ $tempoh ?? '' }}" placeholder="SILA PILIH" class="form-control textbox-n" name="tempoh"
                        type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                </div>
            </div>
            <div class="row mx-2 mb-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Jenis Pengguna:</label>
                </div>
                <div class="col-4 mb-2">
                    <select class="form-select categoryFilter" aria-label="Default select example" name="jenis_pengguna">
                        <option selected disabled>SILA PILIH</option>
                        <option value="">SEMUA</option>
                        <option value="BWTD">BWTD</option>
                        <option value="BPTM">BPTM</option>
                    </select>
                </div>
            </div>
            <div class="row mx-2 mb-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Nama Pengguna:</label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{ $nama ?? '' }}" class="form-control" data-column-index='1' type="text"
                        placeholder="TAIP DI SINI" name="nama" />
                </div>
                <div class="col-2 mb-2">
                    <button class="btn btn-secondary filter-button" type="submit"> Cari
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search ms-1" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
        </form>
        <div class="col mb-2">
            <form action="/audit_trail" method="GET">
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



        <div class="card mt-6">
            <div class="card-body">
                <table class="table line-table mt-6 stripe datatable" style="width:100%">
                    <thead class="text-black">
                        <tr>
                            <th class="text-center">Bil.</th>
                            <th class="text-center">Jenis Pengguna</th>
                            <th class="text-center">Nama Pengguna</th>
                            <th class="text-center">Alamat IP</th>
                            <th class="text-center">OS</th>
                            <th class="text-center">Model</th>
                            <th class="text-center">Log Masuk</th>
                            <th class="text-center">Log Keluar</th>
                            <th class="text-center">Tempoh Masa</th>
                            <th class="text-center">Papar</th>
                        </tr>
                    <tbody id="myAuditTrail">
                        @foreach ($audit_trail as $at)
                            <tr>
                                <td class="text-center">{{ $at->id }}</td>
                                <td class="text-center">{{ $at->ip_address }}</td>
                                <td class="text-center">{{ $at->username }}</td>
                                <td class="text-center">{{ $at->ip_address }}</td>
                                <td class="text-center">{{ $at->ip_address }}</td>
                                <td class="text-center">{{ $at->ip_address }}</td>
                                <td class="text-center">{{ $at->date_logged_in }}</td>
                                <td class="text-center">{{ $at->date_logged_out }}</td>
                                <td class="text-center">{{ $at->requested_time }}</td>
                                <td class="text-center">{{ $at->requested_url }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>

    </div>
@endsection
