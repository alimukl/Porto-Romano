
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


<style>

.sidenav-header {
  display: flex;
  align-items: center; /* Align text and image */
  justify-content: flex-start; /* Keeps elements aligned properly */
  padding: 10px; /* Adjust spacing */
}

.navbar-brand {
  display: flex;
  align-items: center; /* Aligns image and text vertically */
  gap: 10px; /* Space between logo and text */
}

.porto-romano-text {
  font-family: 'Great Vibes', cursive;
  font-size: 24px; /* Adjust size as needed */
  font-weight: normal;
  color: #202020;
  white-space: nowrap; /* Prevents text from wrapping */
  line-height: 1; /* Keeps text vertically centered */
  padding-bottom:20px;
}

#sidenav-main {
    background-color:#fff!important;
}


</style>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-l fixed-start " id="sidenav-main">
         @php
          $PermissionDashboard = App\Models\PermissionRoleModel::getPermission('Dashboard',Auth::user()->role_id);
          $PermissionUser = App\Models\PermissionRoleModel::getPermission('User',Auth::user()->role_id);
          $PermissionRole = App\Models\PermissionRoleModel::getPermission('Role',Auth::user()->role_id);
          $PermissionLogActivity = App\Models\PermissionRoleModel::getPermission('Log Activity',Auth::user()->role_id);
          $PermissionListLeave = App\Models\PermissionRoleModel::getPermission('List Leave',Auth::user()->role_id);
          $PermissionApplyLeave = App\Models\PermissionRoleModel::getPermission('Apply Leave',Auth::user()->role_id);
          $PermissionPaySlip = App\Models\PermissionRoleModel::getPermission('PaySlip',Auth::user()->role_id);
          $PermissionUploadPaySlip = App\Models\PermissionRoleModel::getPermission('Upload PaySlip',Auth::user()->role_id);
        @endphp
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ url('panel/dashboard') }}" target="_blank">
        <span class="ms-1 porto-romano-text">Porto Romano</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        @if(!empty($PermissionDashboard))
        <li class="nav-item">
          <a class="nav-link @if(Request::is('panel/dashboard')) active collapsed @endif" href="{{ url('panel/dashboard') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class='bx bxs-dashboard' style="font-size: 15px; color:rgb(0, 0, 0);"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        @endif

        @if(!empty($PermissionUser))
        <li class="nav-item">
          <a class="nav-link @if(Request::is('panel/user')) active collapsed @endif" href="{{ url('panel/user') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="bi bi-people-fill" style="font-size: 15px; color:rgb(0, 0, 0);"></i>
            </div>
            <span class="nav-link-text ms-1">User</span>
          </a>
        </li>
        @endif

        @if(!empty($PermissionRole))
        <li class="nav-item">
          <a class="nav-link @if(Request::is('panel/role')) active collapsed @endif" href="{{ url('panel/role') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="bi bi-person-fill-gear" style="font-size: 15px; color:rgb(0, 0, 0);"></i>
            </div>
            <span class="nav-link-text ms-1">Role</span>
          </a>
        </li>
        @endif

        @if(!empty($PermissionLogActivity))
        <li class="nav-item">
          <a class="nav-link @if(Request::is('panel/activity_log')) active collapsed @endif" href="{{ url('panel/activity_log') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="bi bi-database-fill-gear" style="font-size: 15px; color:rgb(0, 0, 0);"></i>
            </div>
            <span class="nav-link-text ms-1">Log Activity</span>
          </a>
        </li>
        @endif

        @if(!empty($PermissionListLeave))
        <li class="nav-item">
          <a class="nav-link @if(Request::is('panel/leave-requests')) active collapsed @endif" href="{{ url('panel/leave-requests') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="bi bi-file-earmark-bar-graph-fill" style="font-size: 15px; color:rgb(0, 0, 0);"></i>
            </div>
            <span class="nav-link-text ms-1">All Leave Request</span>
          </a>
        </li>
        @endif

        @if(!empty($PermissionApplyLeave))
        <li class="nav-item">
          <a class="nav-link @if(Request::is('panel/apply_leave')) active collapsed @endif" href="{{ url('panel/apply_leave') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="bi bi-file-earmark-plus-fill" style="font-size: 15px; color:rgb(0, 0, 0);"></i>
            </div>
            <span class="nav-link-text ms-1">My Leave Request</span>
          </a>
        </li>
        @endif

        @if(!empty($PermissionUploadPaySlip))
        <li class="nav-item">
          <a class="nav-link @if(Request::is('panel/payslips/admin')) active collapsed @endif" href="{{ url('panel/payslips/admin') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="bi bi-file-arrow-up-fill" style="font-size: 15px; color:rgb(0, 0, 0);"></i>
            </div>
            <span class="nav-link-text ms-1">Payslip Admin</span>
          </a>
        </li>
        @endif

        @if(!empty($PermissionPaySlip))
        <li class="nav-item">
          <a class="nav-link @if(Request::is('panel/payslips/user')) active collapsed @endif" href="{{ url('panel/payslips/user') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-file-earmark-text-fill" style="font-size: 15px; color:rgb(0, 0, 0);"></i>
            </div>
            <span class="nav-link-text ms-1">Payslip User</span>
          </a>
        </li>
        @endif

      </ul>
    </div>
  </aside>


  
