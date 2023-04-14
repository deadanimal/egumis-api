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
    <h1 style="color: #003478;">LAPORAN TEMPOH PENGGUNAAN APLIKASI</h1>

    <hr style="color: #003478;">


    <div class="container-fluid">
        <form action="/carian-tempoh-penggunaan-aplikasi" method="POST">
            @csrf
            <div class="row mx-2 mb-2 mt-5">
                <div class="col mb-2">
                    <label class="col-form-label text-black">Tempoh:</label>
                </div>
                <div class="col-3 mb-2">
                    <input placeholder="SILA PILIH" class="form-control textbox-n" type="text"
                        onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                </div>
                <div class="col mb-2">
                    <label class="col-form-label text-black">Jenis Status:</label>
                </div>
                <div class="col mb-2">
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected disabled>SILA PILIH</option>
                        <option value="01">Deraf</option>
                        <option value="02">Pengesahan Dokumen 1</option>
                        <option value="03">Kuiri Dokumen 1</option>
                        <option value="04">Pengesahan Dokumen 2</option>
                        <option value="05">Kuiri Dokumen 2</option>
                        <option value="06">Baharu</option>
                        <option value="07">Selesai</option>
                        <option value="08">Kuiri</option>
                    </select>
                </div>

            </div>
            <div class="row mx-2 mb-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Jenis Capaian:</label>
                </div>
                <div class="col-4 mb-2">
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected disabled>SILA PILIH</option>
                        <option value="Daftar Pengguna">Daftar Pengguna</option>
                        <option value="Pengumuman">Pengumuman</option>
                        <option value="Soalan Lazim">Soalan Lazim</option>
                        <option value="Maklumbalas">Maklumbalas</option>
                        <option value="Cetakan PDF">Cetakan PDF</option>
                    </select>
                </div>
            </div>
            <div class="row mx-2 mb-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Jenis OS:</label>
                </div>
                <div class="col-4 mb-2">
                    <input class="form-control" name="" type="number" placeholder="TAIP DI SINI" />
                </div>
            </div>
        </form>

        <div class="card mt-5">
            <div class="card-body">
                <table id="tempoh-penggunaan-aplikasi" class="table line-table mt-6" style="width:100%">
                    <thead class="text-black">
                        <tr>
                            <th class="text-center">Bil.</th>
                            <th class="text-center">Tarikh</th>
                            <th class="text-center">Jenis Capaian</th>
                            <th class="text-center">ID Peranti</th>
                            <th class="text-center">Nama Model</th>
                            <th class="text-center">Jenis OS</th>
                            <th class="text-center">Versi OS</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
