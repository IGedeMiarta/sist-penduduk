@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data {{ $title }}</h5>
                    {{-- <p>lorem10</p> --}}
                    <div class="position-relative">
                        <a class="btn btn-outline-success position-absolute top-0 end-0"
                            href="{{ url('export-pindah') }}">Export</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal Pindah</th>
                                    <th>Nama Ayah</th>
                                    <th>Nama Ibu</th>
                                    <th>Ketereangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $t)
                                    <tr>
                                        <td>{{ $t->penduduk->nik }}</td>
                                        <td>{{ $t->penduduk->nama }}</td>
                                        <td>{{ date('d-m-Y', strtotime($t->tgl_pindah)) }}</td>
                                        <td>{{ $t->penduduk->nama_ayah }}</td>
                                        <td>{{ $t->penduduk->nama_ibu }}</td>
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
