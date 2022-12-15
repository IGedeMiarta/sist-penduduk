 <div class="page-header">
     <nav class="navbar navbar-expand-lg d-flex justify-content-between">
         <div class="" id="navbarNav">
             <ul class="navbar-nav" id="leftNav">
                 <li class="nav-item">
                     <a class="nav-link" id="sidebar-toggle" href="#"><i data-feather="arrow-left"></i></a>
                 </li>

             </ul>
         </div>
         {{-- <div class="logo">
             <a class="navbar-brand" href="{{ url('/') }}"></a>
         </div> --}}
         <div class="logo">
             <img src="{{ asset('logo.jpg') }}" class="" style="max-width: 30px">
         </div>
         <h3 class="nav-text ml-n3">Kabupaten Kaimana</h3>
         <div class="" id="headerNav">
             <ul class="navbar-nav">

                 <li class="nav-item dropdown">
                     <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button"
                         data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ asset('') }}avatar.png"
                             class="rounded-circle" alt="avatar"></a>
                     <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                         <form action="{{ url('logout') }}">
                             <a class="dropdown-item" href="#"><i data-feather="user"></i>Profile</a>
                             @csrf
                             <button class="dropdown-item"><i data-feather="log-out" class="me-2"></i>Logout</button>
                         </form>
                     </div>
                 </li>
             </ul>
         </div>
     </nav>
 </div>
