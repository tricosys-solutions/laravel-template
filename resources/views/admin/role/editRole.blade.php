@extends('admin.layouts.admin')
@section('content')
<div class="col-sm-12">

    <div class="col-sm-8 col-sm-offset-1">
        @if (session('createRoleMessage'))
        <div class="alert alert-info alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{(session('createRoleMessage'))}}</strong>
        </div>
        @endif

        <div>
            <a href="{{url('/admin_roles')}}" class="btn btn-default" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back to Role List</a>
        </div>
        <h3>Add Role</h3>
        <form class="form-horizontal" id="frmAddRole" method="POST" action="{{url('/admin_role_update',$role->id)}}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" value="{{$role->description}}" placeholder="Enter description" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default"><i class="fa fa-save text-primary" aria-hidden="true"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('scripts/role.js') }}" type="text/javascript"></script>
@endsection