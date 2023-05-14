@extends('partials.master')
@section('content')
    {{-- <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Penduduk</h5>
                    <div class="position-relative">
                        <a href="{{ url('cetak-surat') }}" class="btn btn-outline-success position-absolute top-0 end-0">Cetak
                            Surat Kosong</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Opsi</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>Jenis Kel</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Warganegara</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $t)
                                    <tr>
                                        <td>
                                            <a href="{{ url('surat-keterangan/' . $t->id) }}" class="btn btn-success">surat
                                                ket</a>
                                        </td>
                                        <td>{{ $t->nik }}</td>
                                        <td>{{ $t->nama }}</td>
                                        <td>{{ $t->jenkel() }}</td>
                                        <td>{{ $t->ttl() }}</td>
                                        <td>{{ $t->Agama->nama }}</td>
                                        <td>{{ $t->Pendidikan->nama }}</td>
                                        <td>{{ $t->pekerjaan }}</td>
                                        <td>{!! $t->kewarganegaraan !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">BUAT SURAT</h5>
                    <div class="position-relative">
                        <a href="{{ url('cetak-surat') }}" target="_blank"
                            class="btn btn-outline-success position-absolute top-0 end-0">Cetak
                            Surat Kosong</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('buat-surat') }}" target="_blank" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">No Surat</label>
                            <div class="col-sm-10">
                                <input type="text" name="nomor" class="form-control" placeholder="0000/01/2023"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Penduduk</label>
                            <div class="col-sm-10">
                                <select name="id_penduduk" id="id_penduduk" class="select2edt" required>
                                    <option selected disabled>--cari penduduk</option>
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
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keperluan</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]"
                                        value="Kartu Keluarga" id="kk">
                                    <label class="form-check-label" for="kk">
                                        Kartu Keluarga
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]"
                                        value="Kartu Tanda Penduduk (KTP)" id="ktp">
                                    <label class="form-check-label" for="ktp">
                                        Kartu Tanda Penduduk (KTP)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]"
                                        value="Surat Keterangan Kelurahan" id="sk">
                                    <label class="form-check-label" for="sk">
                                        Surat Keterangan Kelurahan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]"
                                        value="Surat Keterangan Nikah" id="nikah">
                                    <label class="form-check-label" for="nikah">
                                        Surat Keterangan Nikah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]"
                                        value="Surat Keterangan Usaha/Domisili Usaha" id="usaha">
                                    <label class="form-check-label" for="usaha">
                                        Surat Keterangan Usaha/Domisili Usaha
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]"
                                        value="Surat Keterangan Domisili Biasa" id="domisili">
                                    <label class="form-check-label" for="domisili">
                                        Surat Keterangan Domisili Biasa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]"
                                        value="Surat Keterangan Pindah" id="pindah">
                                    <label class="form-check-label" for="pindah">
                                        Surat Keterangan Pindah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]"
                                        value="Surat Keterangan Tidak Mampu" id="mampu">
                                    <label class="form-check-label" for="mampu">
                                        Surat Keterangan Tidak Mampu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]"
                                        value="Surat Keterangan Kematian" id="mati">
                                    <label class="form-check-label" for="mati">
                                        Surat Keterangan Kematian
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]"
                                        value="Surat Keterangan Kepemilikan Tanah/Pelepasan Tanah" id="tanah">
                                    <label class="form-check-label" for="tanah">
                                        Surat Keterangan Kepemilikan Tanah/Pelepasan Tanah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="keperluan[]" value="lain"
                                        id="lain">
                                    <label class="form-check-label" for="lain">
                                        lain-lain
                                    </label>
                                </div>
                                <div class="form-check d-none inptLain">
                                    <input class="form-control" type="text" name="lain"
                                        placeholder="Keperluan Lain">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button class="btn btn-success" type="submit">Buat Surat</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#lain').on('change', function() {
                $('.inptLain').removeClass('d-none');
            })
        })
    </script>
@endpush
