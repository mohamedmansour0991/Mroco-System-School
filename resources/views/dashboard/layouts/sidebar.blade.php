<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/shein.png')}}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                {{--  dashboard  --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}" class="nav-link" data-key="t-analytics"> Home </a>
                            </li>

                        </ul>
                    </div>
                </li>

                @if(auth('admin')->user()->hasPermission('roles-read'))
                    {{--  roles  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#roles" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="roles">
                            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('models.roles') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="roles">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.roles') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_role') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if(auth('admin')->user()->hasPermission('admins-read'))
                    {{--  admins  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#admins" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="admins">
                            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('models.admins') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="admins">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.admins.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.admins') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.admins.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_admin') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif



                @if(auth('admin')->user()->hasPermission('users-read'))
                    {{--  users  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#users" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="users">
                            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('models.users') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="users">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.users') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.users.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_user') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if(auth('admin')->user()->hasPermission('grades-read'))
                    {{--  grades  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#grades" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="grades">
                            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('models.grades') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="grades">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.grades.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.grades') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.grades.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_grade') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if(auth('admin')->user()->hasPermission('class_rooms-read'))
                    {{--  class-rooms  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#class-rooms" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="class-rooms">
                            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('models.class_rooms') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="class-rooms">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.class-rooms.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.class_rooms') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.class-rooms.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_class_room') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if(auth('admin')->user()->hasPermission('sections-read'))
                    {{--  sections  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sections" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sections">
                            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('models.sections') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sections">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.sections.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.sections') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.sections.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_section') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if(auth('admin')->user()->hasPermission('teachers-read'))
                    {{--  teachers  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#teachers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="teachers">
                            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('models.teachers') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="teachers">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.teachers.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.teachers') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.teachers.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_teacher') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if(auth('admin')->user()->hasPermission('courses-read'))
                    {{--  courses  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#courses" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="courses">
                            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('models.courses') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="courses">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.courses.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.courses') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.courses.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_course') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif

                @if(auth('admin')->user()->hasPermission('rooms-read'))
                    {{--  rooms  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#rooms" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="rooms">
                            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('models.rooms') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="rooms">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.rooms.index') }}" class="nav-link" data-key="t-starter"> {{ __('models.rooms') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.rooms.create') }}" class="nav-link" data-key="t-starter"> {{ __('models.add_room') }} </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif




                @if(auth('admin')->user()->hasPermission('settings-read'))
                    {{--  setting  --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#setting" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="setting">
                            <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">{{ __('models.setting') }}</span>
                        </a>

                        <div class="collapse menu-dropdown" id="setting">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="{{ route('admin.setting') }}" class="nav-link" data-key="t-starter"> {{ __('models.setting') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.static') }}" class="nav-link" data-key="t-starter"> {{ __('models.static') }} </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('admin.static-page') }}" class="nav-link" data-key="t-starter"> {{ __('models.static') }} </a>
                                </li>



                            </ul>
                        </div>
                    </li>
                @endif














            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
