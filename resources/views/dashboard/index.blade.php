@extends('partials.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="jumbotron text-center">
                        <div class="col-md-11 mx-auto">
                            <h1>Selamat datang!</h1>
                            <hr>
                            <p>Halaman {{ auth()->user()->userRole() }} sistem informasi penduduk, sistem informasi
                                kependudukan diharapkan dapat membantu dalam pengelolaan data penduduk yang mudah efektif
                                dan efesien, dan mampu menjembatani proses pelaporan data kependudukan dari kelurahan ke
                                kecamatan dan backup apabila terjadi bencana/keehilangan sehingga dapat mempercepat proses
                                pelayanan pada masyarakat.</p>
                            <p>
                                Anda telah login sebagai <b>{{ auth()->user()->userRole() }}</b>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">
                    <h5 class="card-title">Pendatang</h5>
                    <h2>132</h2>
                    <p>Jumlah</p>
                    <div class="progress">
                        <div class="progress-bar bg-info progress-bar-striped" role="progressbar"
                            style="width: {{ $pr }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">
                    <h5 class="card-title">Kelahiran</h5>
                    <h2>1</h2>
                    <p>Kelahiran Bulan Ini</p>
                    <div class="progress">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar"
                            style="width: {{ $pr }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">
                    <h5 class="card-title">Kematian</h5>
                    <h2>7</h2>
                    <p>Kematian Bulan Ini</p>
                    <div class="progress">
                        <div class="progress-bar bg-danger progress-bar-striped" role="progressbar"
                            style="width: {{ $pr }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">
                    <h5 class="card-title">Pindah</h5>
                    <h2>8</h2>
                    <p>Pindah Bulan ini</p>
                    <div class="progress">
                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                            style="width: {{ $pr }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
