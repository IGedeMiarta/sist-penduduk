<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="sidebar-title">
            Main
        </li>
        <li @if (Request::url() == url('/')) class="active-page" @endif>
            <a href="{{ url('/') }}"><i data-feather="home"></i>Dashboard</a>
        </li>
        <li class="sidebar-title">
            Apps
        <li @if (Request::url() == url('penduduk')) class="active-page" @endif>
            <a href="{{ url('penduduk') }}"><i data-feather="users"></i>Penduduk</a>
        </li>
        </li>
        <li @if (Request::url() == url('kk')) class="active-page" @endif>
            <a href="{{ url('kk') }}"><i data-feather="inbox"></i>KK</a>
        </li>
        <li @if (Request::url() == url('kelahiran')) class="active-page" @endif>
            <a href="{{ url('kelahiran') }}"><i data-feather="calendar"></i>Kelahiran</a>
        </li>
        <li @if (Request::url() == url('file')) class="active-page" @endif>
            <a href="file-manager.html"><i data-feather="message-circle"></i>File Manager</a>
        </li>
    </ul>
</div>
