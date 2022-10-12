@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="feather icon-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"></a> User</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content" >
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card sale-card" style="min-height:550px!important;">
                                <div class="card-header">
                                    <h4>All Users</h4>
                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('user create'))
                                        <div class="card-header-right col-md-9">
                                            <a type="button" href="#" class="btn btn-round waves-effect waves-light btn-primary btn-outline-primary float-right"><i class="icofont icofont-user-alt-3"></i>New User</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="page-body">
                                    <div class="card-block">
                                        <div class="table-responsive dt-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Status</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td>
                                                                @if(auth()->user()->hasrole('developer'))
                                                                    @if(Auth::user()->id == '1')
                                                                        @if (Auth::user()->id === $user->id)
                                                                            <span class="badge badge-danger">
                                                                                Self modification restricted
                                                                            </span>
                                                                        @else
                                                                            <div class="list-icons">
                                                                                <div class="dropdown">
                                                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                                        <i class="ti-menu-alt"></i>
                                                                                    </a>

                                                                                    <div class="dropdown-menu dropdown-menu-right">

                                                                                        <a href="{{ route('user.edit', $user->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>

                                                                                        <a href="{{ url('/dashboard') }}" class="dropdown-item" ><i class="ti-trash"></i> Delete</a>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        @if (Auth::user()->id === $user->id)
                                                                            <span class="badge badge-danger">
                                                                                    Self modification restricted
                                                                            </span>
                                                                        @elseif(($user->id == '1') || ($user->id == '2'))
                                                                            <span class="badge badge-danger">
                                                                                Modification restricted
                                                                            </span>
                                                                         @else
                                                                        <div class="list-icons">
                                                                            <div class="dropdown">
                                                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                                    <i class="ti-menu-alt"></i>
                                                                                </a>

                                                                                <div class="dropdown-menu dropdown-menu-right">

                                                                                    <a href="{{ route('user.edit', $user->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>

                                                                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$user->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                                    <form id="delete-form{{$user->id}}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @else
                                                                @if (Auth::user()->id === $user->id)
                                                                    <span class="badge badge-danger">
                                                                        Self modification restricted
                                                                    </span>
                                                                @elseif(($user->hasrole('developer')) || ($user->hasrole('super admin')))
                                                                    <span class="badge badge-danger">
                                                                        Modification restricted
                                                                    </span>
                                                                @else
                                                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('user edit') || auth()->user()->can('user delete'))
                                                                        <div class="list-icons">
                                                                            <div class="dropdown">
                                                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                                    <i class="ti-menu-alt"></i>
                                                                                </a>

                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('user edit'))
                                                                                        <a href="{{ route('user.edit', $user->id) }}" class="dropdown-item"><i class="ti-pencil-alt"></i> Edit</a>
                                                                                    @endif

                                                                                    @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('user delete'))
                                                                                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('delete-form{{$user->id}}').submit();"><i class="ti-trash"></i> Delete</a>
                                                                                        <form id="delete-form{{$user->id}}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none;">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                        </form>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <span class="badge badge-danger">
                                                                            Modification restricted
                                                                        </span>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($user->status == 'active')
                                                                <span  class="badge badge-success">Enabled</span>
                                                            @elseif($user->status == 'inactive')
                                                                <span class="badge badge-warning">disabled</span>
                                                            @elseif($user->status == 'block')
                                                                <span class="badge badge-danger">Blocked</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ ucfirst($user->name) }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>
                                                            @if($user->roles->isEmpty())
                                                                <span class="badge badge-danger mb-2" style="font-size: 12px;">
                                                                    No role
                                                                </span>
                                                            @else
                                                                @foreach($user->roles as $role)
                                                                    <span class="badge badge-success mb-2" style="font-size: 12px;">
                                                                        {{ ucfirst($role->name) }}
                                                                    </span>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
    <!-- data-table js -->
    <script src="{{asset('assets/backend/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/pages/data-table/js/data-table-custom.js')}}"></script>
    <script src="{{asset('assets/backend/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

@endpush