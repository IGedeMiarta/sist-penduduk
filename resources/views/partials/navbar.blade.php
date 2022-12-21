 <style>
     @media (min-width: 1025px) and (max-width: 1280px) {

         /* CSS */
         .navTitleText {
             display: none
         }

     }

     @media (min-width: 768px) and (max-width: 1024px) {

         /* CSS */
         .navTitleText {
             display: none
         }

     }

     /*
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 768px to 1024px
*/

     @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {

         /* CSS */
         .navTitleText {
             display: none
         }

     }


     @media (min-width: 481px) and (max-width: 767px) {

         .navTitleText {
             display: none
         }

     }

     @media (min-width: 320px) and (max-width: 480px) {

         /* CSS */
         .navTitleText {
             display: none
         }

         .LogoTitle {
             display: none;
         }

         .userName {
             display: none
         }

     }
 </style>
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
             <img src="{{ asset('logo.jpg') }}" class="LogoTitle" style="max-width: 30px">
         </div>
         <h3 class="nav-text ml-n3 navTitleText">Kabupaten Kaimana</h3>
         <div class="" id="headerNav">
             <ul class="navbar-nav">

                 <li class="nav-item dropdown">
                     <a class="nav-link profile-dropdown" href="#" id="profileDropDown" role="button"
                         data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ asset('') }}avatar.png"
                             class="rounded-circle" alt="avatar">
                         <span style="margin-left: 10px"
                             class="userName text-bold">{{ ucwords(auth()->user()->nama) }}</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end profile-drop-menu" aria-labelledby="profileDropDown">
                         <form action="{{ url('logout') }}" method="POST">
                             <a class="dropdown-item" href="#"><i data-feather="user"></i>Profile</a>
                             @csrf
                             <button class="dropdown-item" type="submit"><i data-feather="log-out"
                                     class="me-2"></i>Logout</button>
                         </form>
                     </div>
                 </li>
             </ul>
         </div>
     </nav>
 </div>
