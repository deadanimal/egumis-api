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

    .button:hover {
        background-color: #1A7FE5;
        color: white;
    }
</style>
@section('content')
    <h1 style="color: #003478;">LAPORAN PERMOHONAN TUNTUTAN MELALUI APLIKASI MUDAH ALIH</h1>

    <hr style="color: #003478;">

    <div class="container-fluid">
        <form action="/carian-permohonan-tuntutan-aplikasi" method="POST">
            @csrf
            <div class="row mx-2 mb-2 mt-5">
                <div class="col-1 mb-2">
                    <label class="col-form-label text-black">Tempoh:</label>
                </div>
                <div class="col-4 mb-2">
                    <input placeholder="SILA PILIH" class="form-control textbox-n" type="text"
                        onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                </div>
                <div class="col-1 mb-2">
                    <label class="col-form-label text-black">No. Pengenalan:</label>
                </div>
                <div class="col-4 mb-2">
                    <input class="form-control" name="" type="number" placeholder="TAIP DI SINI" />
                </div>
            </div>
            <div class="row mx-2 mb-2">
                <div class="col-1 mb-2">
                    <label class="col-form-label text-black">No. Rujukan:</label>
                </div>
                <div class="col-4 mb-2">
                    <input class="form-control" name="" type="number" placeholder="TAIP DI SINI" />
                </div>
                <div class="col-1 mb-2">
                    <label class="col-form-label text-black">Jenis Status:</label>
                </div>
                <div class="col-4 mb-2">
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected disabled>SILA PILIH</option>
                        <option value="Deraf">Deraf</option>
                        <option value="Pengesahan Dokumen 1">Pengesahan Dokumen 1</option>
                        <option value="Kuiri Dokumen 1">Kuiri Dokumen 1</option>
                        <option value="Pengesahan Dokumen 2">Pengesahan Dokumen 2</option>
                        <option value="Kuiri Dokumen 2">Kuiri Dokumen 2</option>
                        <option value="Baharu">Baharu</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Kuiri">Kuiri</option>
                    </select>
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
    </div>
    </form>

    <div class="card mt-6">
        <div class="card-body">
            <table class="table line-table mt-6 datatable" style="width:100%">
                <thead class="text-black">
                    <tr>
                        <th class="text-center">Bil.</th>
                        <th class="text-center">No. Rujukan</th>
                        <th class="text-center">Nama Penuh</th>
                        <th class="text-center">No. Pengenalan</th>
                        <th class="text-center">Amaun Tuntutan (RM)</th>
                        <th class="text-center">Tarikh Tuntutan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($info as $i)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $i->ref_no }}</td>
                            <td class="text-center">{{ $i->claimantName }}</td>
                            <td class="text-center">{{ $i->id_no }} </td>
                            <td class="text-center">RM{{ $i->total_claim }}</td>
                            <td class="text-center">{{ $i->created_date }}</td>
                            <td class="text-center">{{ $i->status }}</td>
                            <td class="text-center">Tindakan</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
