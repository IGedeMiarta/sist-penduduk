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
                                    <th>Tanggal Kematian</th>
                                    <th>Ketereangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $t)
                                    <tr>
                                        <td>
                                            <form action="{{ url('kematian/' . $t->id) }}" method="POST">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <button type="button" class="btn btn-outline-warning btnEdit btn-sm "
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                        data-id="{{ $t->id }}"
                                                        data-id_penduduk="{{ $t->id_penduduk }}"
                                                        data-tanggal="{{ $t->tanggal }}" data-ket="{{ $t->ket }}">
                                                        <i class="feather-16" data-feather="edit-3"></i></button>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <i class="feather-16" data-feather="trash-2"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>{{ $t->penduduk->nik }}</td>
                                        <td>{{ $t->penduduk->nama }}</td>
                                        <td>{{ date('d-m-Y', strtotime($t->tanggal)) }}</td>
                                        <td>{{ $t->ket }}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Penduduk</label>
                            <div class="col-sm-10">
                                <select name="id_penduduk" id="id_penduduk" class="select2  ">
                                    <option selected disabled>--pilih penduduk</option>
                                    @foreach ($penduduk as $i)
                                        <option value="{{ $i->id }}">{{ $i->nik . ' - ' . $i->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_penduduk')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Kematian</label>
                            <div class="col-sm-10">
                                <input type="date"
                                    class="form-control @error('tanggal')
                                    is-invalid
                                @enderror"
                                    id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-n2">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="ket" id="ket"
                                    class="form-control @error('ket')
                                    is-invalid
                                @enderror"
                                    cols="30" rows="4">
                                   {{ old('ket') }}
                                </textarea>
                                @error('ket')
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
    <div class="modal fade ModalSelect" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Penduduk</label>
                            <div class="col-sm-10">
                                <select name="id_penduduk" id="id_penduduk" class="select2edt id_penduduk">

                                    @foreach ($penduduk as $i)
                                        <option value="{{ $i->id }}">{{ $i->nik . ' - ' . $i->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_penduduk')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Tgl Kematian</label>
                            <div class="col-sm-10">
                                <input type="date"
                                    class="form-control tanggal @error('tanggal')
                                    is-invalid
                                @enderror"
                                    id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-n2">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="ket" id="ket"
                                    class="form-control ket @error('ket')
                                    is-invalid
                                @enderror"
                                    cols="30" rows="4">
                                   {{ old('ket') }}
                                </textarea>
                                @error('ket')
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
                const id_penduduk = $(this).data('id_penduduk');
                const tanggal = $(this).data('tanggal');
                const ket = $(this).data('ket');
                const keterangan = $(this).data('keterangan');
                $('.id_penduduk').val(id_penduduk)
                $('.tanggal').val(tanggal)
                $('.ket').val(ket)
                $('#formEdt').attr('action', "{{ url('kematian') }}" + "/" + id)
                $('#modalEdit').modal('show');
            })
        })
    </script>
@endpush
