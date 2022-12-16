@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data {{ $title }}</h5>
                    {{-- <p>lorem10</p> --}}
                    <div class="position-relative">
                        <button class="btn btn-outline-success position-absolute top-0 end-0" data-bs-toggle="modal"
                            data-bs-target="#addModal">Tambah</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO KK</th>
                                <th>Kepala Kel</th>
                                <th>Details</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $t)
                                <tr>
                                    <td>{{ $t->no_kk }}</td>
                                    <td>{{ $t->kepalaKel->nama }}</td>
                                    <td><a class="btn btn-info btn-sm" href="{{ url('keluarga/' . $t->id) }}">Lihat
                                            Keluarga</a></td>
                                    <td>
                                        <form action="{{ url('kk/' . $t->id) }}" method="POST">
                                            <button type="button" class="btn btn-warning btnEdit btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#edtModal"
                                                data-id="{{ $t->id }}" data-no_kk="{{ $t->no_kk }}"
                                                data-kepala_kel="{{ $t->kepala_kel }}">
                                                <i class="feather-16" data-feather="edit-3"></i></button>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="feather-16" data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    <form method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">NO KK</label>
                            <div class="col-sm-10">
                                <input type="number"
                                    class="form-control @error('no_kk')
                                    is-invalid
                                @enderror"
                                    id="no_kk" name="no_kk" value="{{ old('no_kk') }}">
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
                                <select name="kepala_kel" id="kepala_kel"
                                    class="form-control kepala_kel select2 @error('kepala_kel')
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
                        <div class="row mb-3 mt-n2">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="2">
                                   {{ old('alamat') }}
                                </textarea>
                                {{-- <input type="tex"
                                    class="form-control @error('alamat')
                                    is-invalid
                                @enderror"
                                    id="alamat" name="alamat" value="{{ old('alamat') }}"> --}}
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">RT/RW</label>
                            <div class="col-sm-4">
                                <input type="text"
                                    class="form-control mb-3 @error('rt_rw')
                                    is-invalid
                                @enderror"
                                    id="rt_rw" name="rt_rw" value="{{ old('rt_rw') }}" placeholder="00/00">
                                @error('rt_rw')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Pos</label>
                            <div class="col-sm-4">
                                <input type="text"
                                    class="form-control mb-3 @error('kode_pos')
                                    is-invalid
                                @enderror"
                                    id="kode_pos" name="kode_pos" value="{{ old('kode_pos') }}">
                                @error('kode_pos')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kelurahan</label>
                            <div class="col-sm-4">
                                <input type="text"
                                    class="form-control mb-3 @error('kelurahan')
                                    is-invalid
                                @enderror"
                                    id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}">
                                @error('kelurahan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-4">
                                <input type="text"
                                    class="form-control mb-3 @error('kecamatan')
                                    is-invalid
                                @enderror"
                                    id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
                                @error('kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kabupaten</label>
                            <div class="col-sm-4">
                                <input type="text"
                                    class="form-control mb-3 @error('kabupaten')
                                    is-invalid
                                @enderror"
                                    id="kabupaten" name="kabupaten" value="{{ old('kabupaten') }}">
                                @error('kabupaten')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label for="inputEmail3" class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-4">
                                <input type="text"
                                    class="form-control mb-3 @error('provinsi')
                                    is-invalid
                                @enderror"
                                    id="provinsi" name="provinsi" value="{{ old('provinsi') }}">
                                @error('provinsi')
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
