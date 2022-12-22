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
                    <div class="table-responsive ">
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Opsi</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal Datang</th>
                                    <th>Ketereangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $t)
                                    <tr>
                                        <td>
                                            <form action="{{ url('pendatang/' . $t->id) }}" method="POST">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <button type="button" class="btn btn-outline-warning btnEdit btn-sm "
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                        data-id="{{ $t->id }}" data-nik="{{ $t->nik }}"
                                                        data-nama="{{ $t->nama }}"
                                                        data-tgl_datang="{{ $t->tgl_datang }}"
                                                        data-keterangan="{{ $t->keterangan }}">
                                                        <i class="feather-16" data-feather="edit-3"></i></button>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <i class="feather-16" data-feather="trash-2"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{ $t->nik }}</td>
                                        <td>{{ $t->nama }}</td>
                                        <td>{{ date('d-m-Y', strtotime($t->tgl_datang)) }}</td>
                                        <td>{{ $t->keterangan }}</td>
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
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah {{ $title }}</h5>
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
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control @error('nama')
                                    is-invalid
                                @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Datang</label>
                            <div class="col-sm-10">
                                <input type="date"
                                    class="form-control @error('tgl_datang')
                                    is-invalid
                                @enderror"
                                    id="tgl_datang" name="tgl_datang" value="{{ old('tgl_datang') }}">
                                @error('tgl_datang')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-n2">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="keterangan" id="keterangan"
                                    class="form-control @error('keterangan')
                                    is-invalid
                                @enderror"
                                    cols="30" rows="4">
                                   {{ old('keterangan') }}
                                </textarea>
                                @error('keterangan')
                                    <div class="text-danger">
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
                                <input type="number"
                                    class="form-control nik @error('nik')
                                    is-invalid
                                @enderror"
                                    id="nik" name="nik" value="{{ old('nik') }}">
                                @error('nik')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control nama @error('nama')
                                    is-invalid
                                @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Datang</label>
                            <div class="col-sm-10">
                                <input type="date"
                                    class="form-control tgl_datang @error('tgl_datang')
                                    is-invalid
                                @enderror"
                                    id="tgl_datang" name="tgl_datang" value="{{ old('tgl_datang') }}">
                                @error('tgl_datang')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-n2">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="keterangan" id="keterangan" class="form-control keterangan" cols="30" rows="2">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <div class="text-danger">
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
                const nik = $(this).data('nik');
                const nama = $(this).data('nama');
                const tgl_datang = $(this).data('tgl_datang');
                const keterangan = $(this).data('keterangan');
                $('.nik').val(nik)
                $('.nama').val(nama)
                $('.tgl_datang').val(tgl_datang)
                $('.keterangan').val(keterangan)
                $('#formEdt').attr('action', "{{ url('pendatang') }}" + "/" + id)
                $('#modalEdit').modal('show');
            })
        })
    </script>
@endpush
