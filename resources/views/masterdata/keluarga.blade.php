@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">KARTU KELUARGA</h1>
                    <h5 class="text-center">No.{{ $kk->no_kk }}</h5>
                    <div class="row">
                        <div class="col-sm-8">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Nama Kepala Keluarga</td>
                                        <td>:</td>
                                        <td>{{ $kk->kepalaKel->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ $kk->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>RT/RW</td>
                                        <td>:</td>
                                        <td>{{ $kk->rt_rw }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos</td>
                                        <td>:</td>
                                        <td>{{ $kk->kode_pos }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-4">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Desa/Kelurahan</td>
                                        <td>:</td>
                                        <td>{{ $kk->desa_kel }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td>{{ $kk->kecamatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten/Kota</td>
                                        <td>:</td>
                                        <td>{{ $kk->kabupaten_kota }}</td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>:</td>
                                        <td>{{ $kk->provinsi }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">D</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-6">{{ $kk->desa_kel }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Kecamatan</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-6">{{ $kk->kecamatan }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Kabupaten/Kota</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-6">{{ $kk->kabupaten_kota }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Provinsi</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-6">{{ $kk->provinsi }}</div>
                            </div>
                        </div>
                    </div> --}}


                    <div class="position-relative">
                        <button class="btn btn-outline-success position-absolute top-0 end-0" data-bs-toggle="modal"
                            data-bs-target="#addModal">Tambah</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive  text-nowrap">
                        <table id="" class="display table table-bordered" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jenis <br> Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal <br> Lahir</th>
                                    <th>Agama</th>
                                    <th>Pendidikan</th>
                                    <th>Jenis Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($table as $t)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $t->Penduduk->nama }}</td>
                                        <td>{{ $t->Penduduk->nik }}</td>
                                        <td>{{ $t->Penduduk->jenkel() }}</td>
                                        <td>{{ $t->Penduduk->tmp_lahir }}</td>
                                        <td>{{ date('d-m-Y', strtotime($t->Penduduk->tgl_lahir)) }}</td>
                                        <td>{{ $t->Penduduk->Agama->nama }}</td>
                                        <td>{{ $t->Penduduk->Pendidikan->nama }}</td>
                                        <td>{{ $t->Penduduk->pekerjaan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive  text-nowrap">
                        <table id="" class="display table table-bordered" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Status<br>Perkawinan</th>
                                    <th rowspan="2">Status Hubungan <br> Dalam Keluarga</th>
                                    <th rowspan="2">Kewarganegaraan </th>
                                    <th colspan="2">Nama Orang Tua</th>
                                </tr>
                                <tr>
                                    <th>Ayah</th>
                                    <th>Ibu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($table as $t)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $t->stsKawin() }}</td>
                                        <td>{{ $t->hubungan }}</td>
                                        <td>{{ $t->Penduduk->kewarganegaraan }}</td>
                                        <td>{{ $t->Penduduk->nama_ayah }}</td>
                                        <td>{{ $t->Penduduk->nama_ibu }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('modal')
    <div class="modal fade ModalSelect" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelTitle">Tambah {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('keluarga/' . $kk->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Cari Penduduk</label>
                            <div class="col-sm-10">
                                <select name="penduduk_id" id="penduduk_id"
                                    class="form-control penduduk_id select2 @error('penduduk_id')
                                    is-invalid
                                @enderror">
                                    <option selected disabled>--pilih</option>
                                    @foreach ($penduduk as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kepala_kel')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Status Perkawinan</label>
                            <div class="col-sm-10">
                                <select name="status_kawin" id="status_kawin"
                                    class="form-control status_kawin @error('status_kawin')
                                    is-invalid
                                @enderror">
                                    <option value="1">Kawin</option>
                                    <option value="0">Belum Kawin</option>
                                </select>
                                @error('status_kawin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Hubungan</label>
                            <div class="col-sm-10">
                                <select name="hubungan" id="hubungan"
                                    class="form-control hubungan @error('hubungan')
                                    is-invalid
                                @enderror">
                                    <option value="ISTRI">ISTRI</option>
                                    <option value="ANAK">ANAK</option>
                                    <option value="FAMILI LAIN">FAMILI LAIN</option>
                                </select>
                                @error('hubungan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edtModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelTitle">Edit {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formEdt">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">NO KK</label>
                            <div class="col-sm-10">
                                <input type="number"
                                    class="form-control @error('no_kk')
                                    is-invalid
                                @enderror"
                                    id="no_kk_edt" name="no_kk" value="{{ old('no_kk') }}">
                                @error('no_kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Kepala Keluarga</label>
                            <div class="col-sm-10">
                                <select name="kepala_kel" id="kepala_kel_edt"
                                    class="form-control @error('kepala_kel')
                                    is-invalid
                                @enderror">
                                    <option selected disabled>--pilih</option>
                                    @foreach ($penduduk as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kepala_kel')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endpush
@push('script')
    <script>
        $(document).ready(function() {
            $('.btnEdit').on('click', function() {
                const id = $(this).data('id');
                const no_kk = $(this).data('no_kk');
                const kepala_kel = $(this).data('kepala_kel');
                $('#no_kk_edt').val(no_kk)
                $('#kepala_kel_edt').val(kepala_kel)
                $('#formEdt').attr('action', "{{ url('kk') }}" + "/" + id)
                $('#edtModal').modal('show');
            })
        })
    </script>
@endpush
