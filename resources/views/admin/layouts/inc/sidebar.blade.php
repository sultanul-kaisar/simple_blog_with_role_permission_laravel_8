<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            @if(auth()->user()->hasrole('developer'))
                <div class="pcoded-navigation-label">Page Kits</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu  pcoded-trigger">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-grid"></i></span>
                        <span class="pcoded-mtext">Basic</span>
                    </a>
                    <ul class="pcoded-submenu">
{{--                        <li class="">--}}
{{--                            <a href="{{ route('form') }}" class="nav-link {{ (request()->is('admin/form')) ? 'active' : ''}} waves-effect waves-dark">--}}
{{--                                <span class="pcoded-mtext">Basic Form</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="">--}}
{{--                            <a href="{{ route('table') }}" class="nav-link {{ (request()->is('admin/table')) ? 'active' : ''}} waves-effect waves-dark">--}}
{{--                                <span class="pcoded-mtext">Basic Data Table</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="">--}}
{{--                            <a href="{{ route('report-table') }}" class="nav-link {{ (request()->is('admin/report-table')) ? 'active' : ''}} waves-effect waves-dark">--}}
{{--                                <span class="pcoded-mtext">Report Table</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Level One</span>
                    </a>

                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="dt-ext-autofill.html" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Level Two</span>
                            </a>
                        </li>
                        <li class=" pcoded-hasmenu">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Level Two</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="#" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Level Three</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Level Three</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
                <div class="pcoded-navigation-label">Main</div>
            @endif

            <ul class="pcoded-item pcoded-left-item">
                <li class=" ">
                    <a href="#" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="feather icon-home"></i>
        									</span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>


                    <a href="#" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="feather icon-globe"></i>
        									</span>
                        <span class="pcoded-mtext">Blogs</span>
                    </a>



                    <a href="{{ route('user.index') }}" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="feather icon-user"></i>
        									</span>
                        <span class="pcoded-mtext">Users</span>
                    </a>


                    <a href="{{ route('role.index') }}" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="feather icon-globe"></i>
        									</span>
                        <span class="pcoded-mtext">Roles</span>
                    </a>

                    <a href="{{ route('permission.index') }}" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="feather icon-globe"></i>
        									</span>
                        <span class="pcoded-mtext">Permissions</span>
                    </a>

                </li>



            </ul>

        </div>
    </div>
</nav>
