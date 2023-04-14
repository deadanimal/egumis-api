@extends('layouts.base')

<style>
    /* .slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    } */
</style>

@section('content')

<h1 style="color: #003478;">PENGURUSAN PENGGUNA</h1>

<hr style="color: #003478;">
<div class="card mt-6">
    <div class="card-body">
        <h2 class="mb-4" style="color: #003478;">Maklumat Pengguna</h2>
        <h4>Maklumat Akaun</h4>
        <hr>

        <form action="/pengurusan-pengguna/senarai-pengguna/simpan-kemaskini/{{$pengguna->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mx-2 mb-2 mt-5">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Nama Pengguna: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->username}}" class="form-control" name="username" type="text" readonly/>
                </div>
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Entiti Pengguna: <span style="color: #FF0000">&#42;</span></label>
                </div>
                {{-- @dd($pengguna1) --}}
                <div class="col-4 mb-2">
                    <input value="{{$pengguna1->entity_name}}" class="form-control" name="entity_name" type="text" placeholder="TAIP DI SINI"/>
                </div>
            </div>
            <div class="row mx-2 mb-2 mt-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Keaktifan: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <div class="form-check form-switch">
                        {{-- <input class="form-check-input" value="{{$pengguna->enabled}}" type="checkbox" id="flexSwitchCheckChecked" checked> --}}
                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                        <input data-id="{{$pengguna->id}}" name="enabled" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $pengguna->enabled ? 'checked' : '' }}>
                    </div>
                </div>
            </div>

            <h4 class="mt-5">Maklumat Diri</h4>
            <hr>
            <div class="row mx-2 mb-2 mt-5">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Nama Penuh: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input  value="{{$pengguna->full_name}}" class="form-control" name="full_name" type="text" placeholder="TAIP DI SINI" required/>
                </div>
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">E-mel: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->email}}" class="form-control" name="email" type="text" placeholder="TAIP DI SINI" required/>
                </div>
            </div>
            <div class="row mx-2 mb-2 mt-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Jenis Pengenalan: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->identity_type}}" class="form-control" name="identity_type" type="text" required/>
                </div>
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">No. Pengenalan: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->identity_number}}" class="form-control" name="identity_number" type="number" placeholder="TAIP DI SINI" required/>
                    <input value="{{$pengguna->new_ic_number}}" class="form-control" name="new_ic_number" type="number" placeholder="TAIP DI SINI" required/>
                    <input value="{{$pengguna->old_ic_number}}" class="form-control" name="old_ic_number" type="number" placeholder="TAIP DI SINI" required/>
                    <input value="{{$pengguna->no_tentera}}" class="form-control" name="no_tentera" type="number" placeholder="TAIP DI SINI" required/>
                    <input value="{{$pengguna->no_polis}}" class="form-control" name="no_polis" type="number" placeholder="TAIP DI SINI" required/>
                    <input value="{{$pengguna->no_pasport}}" class="form-control" name="no_pasport" type="number" placeholder="TAIP DI SINI" required/>
                    <input value="{{$pengguna->no_sijil_kelahiran}}" class="form-control" name="no_sijil_kelahiran" type="number" placeholder="TAIP DI SINI" required/>
                    <input value="{{$pengguna->no_pendaftaran_syarikat_firma}}" class="form-control" name="no_pendaftaran_syarikat_firma" type="number" placeholder="TAIP DI SINI" required/>
                </div>
            </div>

            <h4 class="mt-5">Maklumat Perhubungan</h4>
            <hr>

            <div class="row mx-2 mb-2 mt-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Alamat 1: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->address1}}" class="form-control" value="address1" type="text" readonly/>
                </div>
            </div>
            <div class="row mx-2 mb-2 mt-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Alamat 2:</label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->address2}}" class="form-control" value="address2" type="text" readonly/>
                </div>
            </div>
            <div class="row mx-2 mb-2 mt-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Poskod: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->postcode}}" class="form-control" value="" type="text" readonly/>
                </div>
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Bandar: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->city}}" class="form-control" name="" type="text" readonly/>
                </div>
            </div>
            <div class="row mx-2 mb-2 mt-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Negara: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->country}}" class="form-control" value="" type="text" readonly/>
                </div>
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Negeri: <span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->state}}" class="form-control" name="state" type="text" readonly/>
                </div>
            </div>
            <div class="row mx-2 mb-2 mt-2">
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Nombor Tel Bimbit: <span style="color: #FF0000">&#42;</span><span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->mobile_no}}" class="form-control" value="mobile_no" type="text" readonly/>
                    <small>Masukkan salah satu maklumat untuk dihubungi (no. tel. bimbit atau no. tel. pejabat/rumah)</small>
                </div>
                <div class="col-2 mb-2">
                    <label class="col-form-label text-black">Nombor Tel Pejabat: <span style="color: #FF0000">&#42;</span><span style="color: #FF0000">&#42;</span></label>
                </div>
                <div class="col-4 mb-2">
                    <input value="{{$pengguna->office_no}}" class="form-control" name="office_no" type="text" readonly/>
                    <small>Masukkan salah satu maklumat untuk dihubungi (no. tel. bimbit atau no. tel. pejabat/rumah).</small>
                </div>
            </div>
            <div class="row mx-2 mb-2 mt-2">
                <div class="col mb-2 text-end">
                    {{-- <form action="/pengurusan-pengguna/senarai-pengguna" method="GET">
                        @csrf
                        @method('GET')
                        <button class="btn btn-primary">Kembali</button>
                    </form> --}}

                    <button class="btn btn-secondary" type="submit">Simpan</button>
                </form>
                    <form action="/pengurusan-pengguna/senarai-pengguna" method="GET">
                        @csrf
                        @method('GET')
                        <button class="btn btn-primary">Kembali</button>
                    </form>
                </div>
            </div>
        {{-- </form> --}}



    </div>
</div>

<script>
    $(function() {
    $('.form-check-input').change(function() {
        var enabled = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/pengurusan-pengguna/senarai-pengguna/simpan-kemaskini/{{$pengguna->id}}',
            data: {'enabled': enabled, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>

@endsection