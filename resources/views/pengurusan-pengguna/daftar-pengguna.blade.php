@extends('layouts.base')

@section('content')
    <h1 style="color: #003478;">PENGURUSAN PENGGUNA</h1>

    <hr style="color: #003478;">

    <div class="card mt-6 p-4">
        <div class="card-body row">
            <h2 class="mb-5" style="color: #003478;">Pendaftaran Pengguna</h2>

            <form action="{{ route('daftar') }}" method="POST" class="col-xl-12">
                @csrf
                <div class="row align-items-center">
                    <div class="col-xl-4 text-end">
                        <label class="col-form-label">Nama Penuh <i class="text-danger">*</i></label>
                    </div>
                    <div class="col-xl-6">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-4">
                    </div>
                    <div class="col-xl-6">
                        <p class="ms-3 p-0">Nama Penuh seperti pada dokumen pengenalan diri</p>
                    </div>
                </div>

                <div class="row align-items-center mb-4">
                    <div class="col-xl-4 text-end">
                        <label class="col-form-label">Jenis Pengenalan <i class="text-danger">*</i></label>
                    </div>
                    <div class="col-xl-6">
                        <select class="form-select">
                            <option selected disabled hidden>Select</option>
                            <option value="">1</option>
                            <option value="">1</option>
                            <option value="">1</option>
                        </select>
                    </div>
                </div>

                <div class="row align-items-center mb-4">
                    <div class="col-xl-4 text-end">
                        <label class="col-form-label">No. Pengenalan <i class="text-danger">*</i></label>
                    </div>
                    <div class="col-xl-6">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-xl-4 text-end">
                        <label class="col-form-label">E-mel <i class="text-danger">*</i></label>
                    </div>
                    <div class="col-xl-6">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-4">
                    </div>
                    <div class="col-xl-6">
                        <p class="ms-3 p-0">Sila pastikan alamat e-mel yang digunakan adalah sah bagi tujuan verifikasi.</p>
                    </div>
                </div>

                <div class="row align-items-center mb-4">
                    <div class="col-xl-4 text-end">
                        <label class="col-form-label">Nama Pengguna <i class="text-danger">*</i></label>
                    </div>
                    <div class="col-xl-6">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row align-items-center mb-4">
                    <div class="col-xl-4 text-end">
                        <label class="col-form-label">Kata Laluan <i class="text-danger">*</i></label>
                    </div>
                    <div class="col-xl-6">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row align-items-center mb-4">
                    <div class="col-xl-4 text-end">
                        <label class="col-form-label">Ulang Kata Laluan <i class="text-danger">*</i></label>
                    </div>
                    <div class="col-xl-6">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-secondary">Daftar</button>
                </div>


            </form>
        </div>
    </div>
@endsection
