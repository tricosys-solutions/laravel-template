@extends('admin.layouts.admin')
@section('content')
<div class="col-sm-12">
    @if (session('deleteMessage'))
    <div class="col-sm-1"></div>
    <div class="col-sm-10 alert alert-info alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('deleteMessage') }}</strong>
    </div>
    <div class="col-sm-1"></div>
    @endif
    @if (session('updateMessage'))
    <div class="col-sm-1"></div>
    <div class="col-sm-8 col-sm-offset-1 alert alert-info alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ session('updateMessage') }}</strong>
    </div>
    <div class="col-sm-1"></div>
    @endif
    <div class="col-sm-8 col-sm-offset-1">
        <div>
            <a href="{{url('/admin_users')}}" class="btn btn-default" role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back to User List</a>
        </div>
        <h3>Edit User</h3>
        <form class="form-horizontal" id="frmAddUser" method="POST" action="{{url('/admin_user_update',$user->id)}}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$user->name}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"  value="{{$user->email}}" required>
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
<script src="{{ asset('script/inquiry.js') }}" type="text/javascript"></script>
@endsection
