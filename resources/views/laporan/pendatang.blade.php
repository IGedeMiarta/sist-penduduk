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
                            href="{{ url('export-pendatang') }}">Export</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tanggal Datang</th>
                                    <th>Ketereangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $tab => $t)
                                    <tr>
                                        <td>
                                            {{ $tab + 1 }}
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
