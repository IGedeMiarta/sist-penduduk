@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Penduduk</h5>
                    {{-- <p>lorem10</p> --}}
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
    </div>
@endsection

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
        })
    </script>
@endpush
