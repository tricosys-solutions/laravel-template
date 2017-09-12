@extends('admin.layouts.admin')
@section('content')
<div class="col-sm-12">
    
    <div class="col-sm-8 col-sm-offset-1">
        @if (session('createMessage'))
        <div class="alert alert-info alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{(session('createMessage'))}}</strong>
        </div>
        @endif
        
        <div>
            <a href="{{url('/admin_users')}}" class="btn btn-default" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back to User List</a>
        </div>
        <h3>Add User</h3>
        <form class="form-horizontal" id="frmAddUser" method="POST" action="{{url('/admin_user_create')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Confirm Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
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
<script src="{{ asset('script/user.js') }}" type="text/javascript"></script>
@endsection
