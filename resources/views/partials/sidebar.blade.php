<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="sidebar-title">
            Main
        </li>
        <li @if (Request::url() == url('/')) class="active-page" @endif>
            <a href="{{ url('/') }}"><i data-feather="home"></i>Dashboard</a>
        </li>
        <li class="sidebar-title">
            Master Data
        </li>
        <li @if (Request::url() == url('penduduk')) class="active-page" @endif>
            <a href="{{ url('penduduk') }}"><i data-feather="users"></i>Penduduk</a>
        </li>
        </li>
        <li @if (Request::url() == url('kk')) class="active-page" @endif>
            <a href="{{ url('kk') }}"><i data-feather="inbox"></i>KK</a>
        </li>
        <li @if (Request::url() == url('kelahiran')) class="active-page" @endif>
            <a href="{{ url('kelahiran') }}"><i data-feather="smile"></i>Kelahiran</a>
        </li>
        <li @if (Request::url() == url('pendatang')) class="active-page" @endif>
            <a href="{{ url('pendatang') }}"><i data-feather="coffee"></i>Pendatang</a>
        </li>
        <li @if (Request::url() == url('kematian')) class="active-page" @endif>
            <a href="{{ url('kematian') }}"><i data-feather="alert-octagon"></i>Kematian</a>
        </li>
        <li class="sidebar-title">
            Surat Menyurat
        </li>
        <li @if (Request::url() == url('surat')) class="active-page" @endif>
            <a href="{{ url('surat') }}"><i data-feather="mail"></i>Surat Kelurahan</a>
        </li>
        <li class="sidebar-title">
            Laporan
        </li>
        <li>
            <a href="index.html"><i data-feather="list"></i>Laporan<i
                    class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul class="">

                <li @if (Request::url() == url('lap-kelahiran')) class="active-page" @endif>
                    <a href="{{ url('lap-kelahiran') }}"><i class="far fa-circle"></i>Lap. kelahiran</a>
                </li>
                <li @if (Request::url() == url('lap-kematian')) class="active-page" @endif>
                    <a href="{{ url('lap-kematian') }}"><i class="far fa-circle"></i>Lap. kematian</a>
                </li>
                <li @if (Request::url() == url('lap-kelahiran')) class="active-page" @endif>
                    <a href="{{ url('lap-kelahiran') }}"><i class="far fa-circle"></i>Lap. kelahiran</a>
                </li>
                <li @if (Request::url() == url('lap-pendatang')) class="active-page" @endif>
                    <a href="{{ url('lap-pendatang') }}"><i class="far fa-circle"></i>Lap. pendatang</a>
                </li>
                {{-- <li @if (Request::url() == url('lap-pindah')) class="active-page" @endif>
                    <a href="{{ url('lap-pindah') }}"><i class="far fa-circle"></i>Lap. pindah</a>
                </li> --}}
            </ul>
        </li>

        <li class="sidebar-title">
            Action
        </li>
        <li>
            <form action="{{ url('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-borderless"><i data-feather="log-out"></i> Logout</button>
            </form>
        </li>
    </ul>
</div>
