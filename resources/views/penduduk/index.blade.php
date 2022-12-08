@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Penduduk</h5>
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
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat, Tgl Lahir</th>
                                <th>Jenis Kel</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $t)
                                <tr>
                                    <td>{{ $t->nik }}</td>
                                    <td>{{ $t->nama }}</td>
                                    <td>{{ $t->ttl() }}</td>
                                    <td>{{ $t->jenkel() }}</td>
                                    <td>{!! $t->getStatus() !!}</td>
                                    <td>
                                        <form action="{{ url('penduduk/' . $t->id) }}" method="POST">
                                            <button type="button" class="btn btn-warning btnEdit btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                data-id="{{ $t->id }}" data-nik="{{ $t->nik }}"
                                                data-nama="{{ $t->nama }}" data-tmp_lahir="{{ $t->tmp_lahir }}"
                                                data-tgl_lahir="{{ $t->tgl_lahir }}" data-sex="{{ $t->sex }}"
                                                data-status="{{ $t->status }}"><i class="fas fa-edit"></i></button>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fas fa-trash"></i></button>
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
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="number"
                                    class="form-control @error('nik')
                                    is-invalid
                                @enderror"
                                    id="nik" name="nik" value="{{ old('nik') }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('nama')
                                    is-invalid
                                @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('tmp_lahir')
                                    is-invalid
                                @enderror"
                                    id="tmp_lahir" name="tmp_lahir" value="{{ old('tmp_lahir') }}">
                                @error('tmp_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Lahir</label>
                            <div class="col-sm-10">
                                <input type="date"
                                    class="form-control @error('tgl_lahir')
                                    is-invalid
                                @enderror"
                                    id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kel</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('sex')
                                        is-invalid
                                    @enderror"
                                        type="radio" name="sex" id="sex1" value="L">
                                    <label class="form-check-label" for="sex1">
                                        Laki Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('sex')
                                        is-invalid
                                    @enderror"
                                        type="radio" name="sex" id="sex2" value="P">
                                    <label class="form-check-label" for="sex2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            @error('sex')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Penduduk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formEdt">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="edt_nik" name="nik">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="edt_nama" name="nama">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="edt_tmp_lahir" name="tmp_lahir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="edt_tgl_lahir" name="tgl_lahir">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kel</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="edt_sex_1"
                                        value="L">
                                    <label class="form-check-label" for="edt_sex_1">
                                        Laki Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="edt_sex_2"
                                        value="P">
                                    <label class="form-check-label" for="edt_sex_2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </fieldset>
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
                const nik = $(this).data('nik');
                const nama = $(this).data('nama');
                const tmp_lahir = $(this).data('tmp_lahir');
                const tgl_lahir = $(this).data('tgl_lahir');
                const sex = $(this).data('sex');
                const status = $(this).data('status');
                $('#edt_nik').val(nik)
                $('#edt_nama').val(nama)
                $('#edt_tmp_lahir').val(tmp_lahir)
                $('#edt_tgl_lahir').val(tgl_lahir)
                if (sex == 'L') {
                    $('#edt_sex_1').attr("checked", "checked");
                } else {
                    $('#edt_sex_2').attr("checked", "checked");

                }
                $('#formEdt').attr('action', "{{ url('penduduk') }}" + "/" + id)
                $('#modalEdit').modal('show');
            })
        })
    </script>
@endpush
