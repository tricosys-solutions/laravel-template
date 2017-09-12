@extends('admin.layouts.admin')
@section('content')
<div class="row">
    @if (session('deleteRoleMessage'))
    <div class="col-sm-1"></div>
    <div class="col-sm-10 alert alert-info alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('deleteRoleMessage') }}</strong>
    </div>
    <div class="col-sm-1"></div>
    @endif
    @if (session('updateRoleMessage'))
    <div class="col-sm-1"></div>
    <div class="col-sm-8 col-sm-offset-1 alert alert-info alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('updateRoleMessage') }}</strong>
    </div>
    <div class="col-sm-1"></div>
    @endif
    <div class="col-sm-12">
        <div class="margin-bottom">
            <a href="{{url('/admin_role_new')}}" class="btn btn-default" role="button">
                <i class="fa fa-plus-circle text-primary" aria-hidden="true"></i> Add Role
            </a>
        </div>
        <table id="tblRoles">
            <thead>
                <tr>
                    <th>
                        Description
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(isset($roles))
                @foreach($roles as $role)

                <tr>
                    <td>
                        {{$role->description}}
                    </td>
                    <td>
                        <a href="{{url('/admin_role_edit',$role->id)}}" class="btn btn-default" role="button">
                            <i class="fa fa-pencil-square-o text-primary" aria-hidden="true"></i>
                        </a>
                        <form class="inline delete" action="{{url('/admin_role_delete',$role->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <button class="btn btn-default" type="submit"><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>

                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('scripts/role.js') }}" type="text/javascript"></script>
@endsection