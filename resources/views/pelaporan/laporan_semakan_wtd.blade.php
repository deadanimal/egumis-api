@extends('layouts.base')

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
    <h1 style="color: #003478;">LAPORAN SEMAKAN WTD</h1>

    <hr style="color: #003478;">


    <form action="/pelaporan/carian-semakan-wtd" method="POST">
        @csrf
        <div class="row mt-5">
            <div class="col-4 text-end">
                <label class="col-form-label text-black">Tempoh:</label>
            </div>
            <div class="col-8">
                <div class="col-xl-6">
                    <input value="{{ $tempoh ?? '' }}" placeholder="SILA PILIH" class="form-control textbox-n" type="text"
                        onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4 text-end">
                <label class="col-form-label text-black">No. Pengenalan:</label>
            </div>
            <div class="col-8">
                <div class="col-xl-6">
                    <input value="{{ $no_ic ?? '' }}" class="form-control" name="no_ic" type="number"
                        placeholder="TAIP DI SINI" />
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4 text-end">
                <label class="col-form-label text-black">No. Rujukan:</label>
            </div>
            <div class="col-8">
                <div class="col-xl-6">
                    <input value="{{ $no_rujukan ?? '' }}" class="form-control" name="no_rujukan" type="text"
                        placeholder="TAIP DI SINI" />
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4 text-end">
                <label class="col-form-label text-black">Jenis Status:</label>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-xl-6">
                        <select class="form-select" name="status">
                            <option selected disabled hidden>SILA PILIH</option>
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
                    <div class="col-xl-6 text-end">
                        <button class="btn btn-secondary d-inline-flex">Cari <span
                                class="fas fa-search ms-1"></span></button>
                        <a href="/pelaporan/semakan-wtd" class="btn btn-secondary d-inline-flex">Set Semula <span
                                class="ms-1 refreshbtn" style="height: 20px;" data-feather="refresh-ccw"></span></a>
                    </div>
                </div>
            </div>
        </div>

    </form>


    <div class="card mt-6">
        <div class="card-body">
            {{-- <div class="table-responsive scrollbar"> --}}
            <table class="table line-table mt-6 datatable" style="width:100%">
                <thead class="text-black">
                    <tr>
                        <th class="text-center">Bil</th>
                        <th class="text-center">No. Rujukan</th>
                        <th class="text-center">Nama Pengguna</th>
                        <th class="text-center">No. Pengenalan</th>
                        <th class="text-center">Amaun Tuntutan (RM)</th>
                        <th class="text-center">Tarikh Tuntutan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Tindakan</th>
                        <th class="text-center">OS</th>
                        <th class="text-center">Model</th>
                    </tr>
                <tbody>
                    @foreach ($semakan_wtd as $sw)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $sw->refBoMaster->entity_code ?? 'Tiada' }}</td>
                            <td class="text-center">{{ $sw->entity_id }}</td>
                            <td class="text-center">{{ $sw->entity_name }} </td>
                            <td class="text-center">RM{{ $sw->refBoMaster->unclaimed_amount ?? 'Tiada' }}</td>
                            <td class="text-center">{{ $sw->created_date }}</td>
                            <td class="text-center">{{ $sw->status }}</td>
                            <td class="text-center">Tindakan</td>
                            <td class="text-center">{{ $sw->os }}</td>
                            <td class="text-center">{{ $sw->model }}</td>
                        </tr>
                        {{-- <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $sw->ref_no }}</td>
                            <td class="text-center">{{ $sw->user->full_name ?? '' }}</td>
                            <td class="text-center">{{ $sw->id_no }} </td>
                            <td class="text-center">RM{{ $sw->total_claim }}</td>
                            <td class="text-center">{{ $sw->created_date }}</td>
                            <td class="text-center">{{ $sw->status }}</td>
                            <td class="text-center">Tindakan</td>
                            <td class="text-center">Versi OS</td>
                            <td class="text-center">Versi Model</td>
                        </tr> --}}
                    @endforeach
                </tbody>
                </thead>
            </table>
            {{-- </div> --}}
        </div>
    </div>
@endsection
