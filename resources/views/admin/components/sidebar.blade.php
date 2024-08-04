 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.index')}}">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-user"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Admin <sup style="text-transform: lowercase;">fuc</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ route('admin.index')}}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Manage
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Entities</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Manage:</h6>
                 <a class="collapse-item" href="{{ route('admin.employee.index')}}">Employees</a>
                 <a class="collapse-item" href="{{ route('admin.material.index')}}">Materials</a>
                 <a class="collapse-item" href="{{ route('admin.supplier.index')}}">Supllier</a>
             </div>
         </div>
     </li>
     <!-- Nav Item - Material Tables -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.material.index')}}">
             <i class="fas fa-fw fa-box"></i>
             <span>Stock</span></a>
     </li>
     <!-- Nav Item - Product Tables -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.product.index')}}">
             <i class="fas fa-fw fa-boxes"></i>
             <span>Products</span></a>
     </li>
     <!-- Nav Item - Report Tables -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.report.index')}}">
             <i class="fas fa-fw fa-pen"></i>
             <span>Reports</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Addons
     </div>

     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="charts.html">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Charts</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->

 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>