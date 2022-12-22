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
    </ul>
</div>
