 <!-- Sidebar -->
 <style>
     .active{
        font-weight: 900;
     }
 </style>
 <nav class="navbar-vertical navbar">
     <div class="nav-scroller">
         <!-- Brand logo -->
         <a class="navbar-brand" href="{{url('admin/dashboard')}}">
            <h3 style="color: white"></h3>
             {{-- <img src="{{ asset('public/assets/images/brand/logo/logo.svg') }}" alt="" /> --}}
         </a>
         <!-- Navbar nav -->
         <ul class="navbar-nav flex-column" id="sideNavbar">
             <li class="nav-item active">
                 <a class="nav-link " href="{{url('admin/dashboard')}}">
                     <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                 </a>

             </li>
             <li class="nav-item active">
                 <a class="nav-link " href="{{url('admin/product')}}">
                     <i data-feather="home" class="nav-icon icon-xs me-2"></i> Products
                 </a>

             </li>
             <li class="nav-item active">
                 <a class="nav-link " href="{{url('admin/product-reviews')}}">
                     <i data-feather="home" class="nav-icon icon-xs me-2"></i> Product Reviews
                 </a>

             </li>
         

            
     
     
           


         </ul>

     </div>
 </nav>
