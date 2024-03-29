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
                                <th>No</th>
                                <th>Tanggal Lahir</th>
                                <th>Nama</th>
                                <th>Details</th>
                                {{-- <th>Opsi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $tab => $t)
                                <tr>
                                    <td>{{ $tab + 1 }}</td>
                                    <td>{{ date('d m Y', strtotime($t->tgl_lahir)) }}</td>
                                    <td>{{ $t->nama }}</td>
                                    <td><a class="btn btn-info btn-sm" href="{{ url('keluarga/' . $t->id_kk) }}">Lihat
                                            Keluarga</a></td>
                                    {{-- <td>
                                        <form action="{{ url('kk/' . $t->id) }}" method="POST">
                                            <button type="button" class="btn btn-warning btnEdit btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#edtModal"
                                                data-id="{{ $t->id }}" data-nama="{{ $t->nama }}"
                                                data-tgl_lahir="{{ $t->tgl_lahir }}" data-id_kk="{{ $t->id_kk }}">
                                                <i class="feather-16" data-feather="edit-3"></i></button>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="feather-16" data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                    </td> --}}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelahiran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">
                                KK<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <select name="kk" id="kk" class="select2 nik">
                                    <option selected disabled>nik - kepala keluarga</option>
                                    @foreach ($kk as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->no_kk . ' - ' . $item->kepalaKel->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">
                                Nama Orang Tua<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-5">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">
                                    Ayah<span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                    class="form-control @error('nama_ayah')
                                    is-invalid
                                @enderror"
                                    id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}">
                                @error('nama_ayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">
                                    Ibu<span class="text-danger">*</span></label>

                                <input type="text"
                                    class="form-control @error('nama_ibu')
                                    is-invalid
                                @enderror"
                                    id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}">
                                @error('nama_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">
                                NIK
                            </label>
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
                            <label for="inputPassword3" class="col-sm-2 col-form-label">
                                Nama Lengkap<span class="text-danger">*</span>
                            </label>
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
                            <label for="inputPassword3" class="col-sm-2 col-form-label">
                                Tempat Lahir<span class="text-danger">*</span>
                            </label>
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
                            <label for="inputPassword3" class="col-sm-2 col-form-label">
                                Tgl Lahir<span class="text-danger">*</span>
                            </label>
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
                            <legend class="col-form-label col-sm-2 pt-0">
                                Jenis Kel<span class="text-danger">*</span>
                            </legend>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('jenis_kelamin')
                                        is-invalid
                                    @enderror"
                                        {{-- @dd(old('jenis_kela')) --}} type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                                        value="L" @if (old('jenis_kelamin' == 'L')) checked @endif>
                                    <label class="form-check-label" for="jenis_kelamin1">
                                        Laki Laki
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('jenis_kelamin')
                                        is-invalid
                                    @enderror"
                                        type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P"
                                        @if (old('jenis_kelamin' == 'P')) checked @endif>
                                    <label class="form-check-label" for="jenis_kelamin2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </fieldset>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">
                                Agama<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <select name="agama" id="agama"
                                    class="form-select @error('agama')
                                   is-invalid
                               @enderror">
                                    <option selected disabled>--pilih</option>
                                    @foreach ($agama as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($item->id == old('agama')) selected @endif>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('agama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Kewarga- <br> negaraan<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="kewarganegaraan" id="kewarganegaraan" class="form-select">
                                    <option value="WNI" selected>Warga Negara Indonesia</option>
                                    <option value="WNA">Warga Negara Asing</option>
                                </select>
                                @error('kewargenegaraan')
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
    <div class="modal fade " id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <div class="invalid-feedback">
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
                                    class="form-control tmp_lahir @error('tmp_lahir')
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
                                    class="form-control tgl_lahir @error('tgl_lahir')
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
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <input
                                        class="form-check-input jenis_kelamin_l @error('jenis_kelamin')
                                        is-invalid
                                    @enderror"
                                        type="radio" name="jenis_kelamin" id="sex1" value="L">
                                    <label class="form-check-label" for="sex1">
                                        Laki Laki
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <input
                                        class="form-check-input jenis_kelamin_p @error('jenis_kelamin')
                                        is-invalid
                                    @enderror"
                                        type="radio" name="jenis_kelamin" id="sex2" value="P">
                                    <label class="form-check-label" for="sex2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </fieldset>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <select name="agama" id="agama"
                                    class="form-select agama @error('agama')
                                   is-invalid
                               @enderror">
                                    <option selected disabled>--pilih</option>
                                    @foreach ($agama as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($item->id == old('agama')) selected @endif>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('agama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 pendidikan col-form-label">Pendidikan</label>
                            <div class="col-sm-10">
                                <select name="pendidikan" id="pendidikan" class="form-select pendidikan">
                                    <option selected disabled>--pilih</option>
                                    @foreach ($pendidikan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control pekerjaan @error('pekerjaan')
                                    is-invalid
                                @enderror"
                                    id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
                                @error('pekerjaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Orang Tua</label>
                            <div class="col-sm-5">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Ayah</label>

                                <input type="text"
                                    class="form-control nama_ayah @error('nama_ayah')
                                    is-invalid
                                @enderror"
                                    id="e_nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}">
                                @error('nama_ayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Ibu</label>

                                <input type="text"
                                    class="form-control nama_ibu @error('nama_ibu')
                                    is-invalid
                                @enderror"
                                    id="e_nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}">
                                @error('nama_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Kewarga- <br> negaraan</label>
                            <div class="col-sm-10">
                                <select name="kewarganegaraan" id="kewarganegaraan" class="form-select kewarganegaraan">
                                    <option value="WNI" selected>Warga Negara Indonesia</option>
                                    <option value="WNA">Warga Negara Asing</option>
                                </select>
                                @error('kewargenegaraan')
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
                const nik = $(this).data('nik');
                const nama = $(this).data('nama');
                const tmp_lahir = $(this).data('tmp_lahir');
                const tgl_lahir = $(this).data('tgl_lahir');
                const jenis_kelamin = $(this).data('jenis_kelamin');
                const status = $(this).data('status');
                const agama = $(this).data('agama_id');
                const pendidikan = $(this).data('pendidikan');
                const pekerjaan = $(this).data('pekerjaan');
                const nama_ayah = $(this).data('nama_ayah');
                const nama_ibu = $(this).data('nama_ibu');
                const warganegara = $(this).data('kewarganegaraan');
                $('.nik').val(nik)
                $('.nama').val(nama)
                $('.tmp_lahir').val(tmp_lahir)
                $('.tgl_lahir').val(tgl_lahir)
                $('.agama').val(agama)
                $('.pendidikan').val(pendidikan)
                $('.pekerjaan').val(pekerjaan)
                $('.nama_ayah').val(nama_ayah)
                $('.nama_ibu').val(nama_ibu)
                $('.kewarganegaraan').val(warganegara)
                if (jenis_kelamin == 'L') {
                    $('.jenis_kelamin_l').attr("checked", "checked");
                } else {
                    $('.jenis_kelamin_p').attr("checked", "checked");

                }
                $('#formEdt').attr('action', "{{ url('penduduk') }}" + "/" + id)
                $('#modalEdit').modal('show');
            })
            $('#kk').on('change', function() {
                const id = $(this).val();
                $.ajax({
                    url: "{{ url('kelahiran') }}" + '/' + id,
                    success: function(rs) {
                        console.log(rs);
                        $('#nama_ayah').val(rs.data.ayah)
                        $('#nama_ibu').val(rs.data.ibu)
                    }
                })
            })
        })
    </script>
@endpush
