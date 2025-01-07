<div class="sidebar" data-color="orange">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">PR</a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">Porto Romano</a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        @php
          $PermissionUser = App\Models\PermissionRoleModel::getPermission('User',Auth::user()->role_id);
          $PermissionRole = App\Models\PermissionRoleModel::getPermission('Role',Auth::user()->role_id);
          $PermissionLogActivity = App\Models\PermissionRoleModel::getPermission('Log Activity',Auth::user()->role_id);
          $PermissionListLeave = App\Models\PermissionRoleModel::getPermission('List Leave',Auth::user()->role_id);
          $PermissionApplyLeave = App\Models\PermissionRoleModel::getPermission('Apply Leave',Auth::user()->role_id);
          $PermissionSetting = App\Models\PermissionRoleModel::getPermission('Setting',Auth::user()->role_id);
        @endphp
            <!-- Dashboard -->
            <li>
                <a class="nav-link @if(Request::segment(2) == 'dashboard') collapsed @endif" href="{{ url('panel/dashboard') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- User -->
             @if(!empty($PermissionUser))
            <li>
                <a class="nav-link @if(Request::segment(2) == 'user') collapsed @endif" href="{{ url('panel/user') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>User</p>
                </a>
            </li>
            @endif

            <!-- Role -->
            @if(!empty($PermissionRole))
            <li>
                <a class="nav-link @if(Request::segment(2) == 'role') collapsed @endif" href="{{ url('panel/role') }}">
                    <i class="now-ui-icons business_badge"></i>
                    <p>Role</p>
                </a>
            </li>
            @endif

            <!-- Log Activity -->
            @if(!empty($PermissionLogActivity))
            <li>
                <a class="nav-link @if(Request::segment(2) == 'logactivity') collapsed @endif" href="{{ url('panel/logactivity') }}">
                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                    <p>Log Activity</p>
                </a>
            </li>
            @endif

            <!-- Apply Leave -->
            @if(!empty($PermissionApplyLeave))
            <li>
                <a class="nav-link @if(Request::segment(2) == 'applyleave') collapsed @endif" href="{{ url('panel/applyleave') }}">
                    <i class="now-ui-icons ui-1_check"></i>
                    <p>Apply Leave</p>
                </a>
            </li>
            @endif

            <!-- List Leave -->
            @if(!empty($PermissionListLeave))
            <li>
                <a class="nav-link @if(Request::segment(2) == 'listleave') collapsed @endif" href="{{ url('panel/listleave') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>List Leave</p>
                </a>
            </li>
            @endif

            <!-- Setting -->
            @if(!empty($PermissionSetting))
            <li>
                <a class="nav-link @if(Request::segment(2) == 'setting') collapsed @endif" href="{{ url('panel/setting') }}">
                    <i class="now-ui-icons ui-1_settings-gear-63"></i>
                    <p>Setting</p>
                </a>
            </li>
            @endif

        </ul>
    </div>
</div>
