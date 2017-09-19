@extends('admin.layouts.admin')
@section('content')
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
    <li><a data-toggle="tab" href="#changePassword">Change Password</a></li>
</ul>

<div class="tab-content">
    <div id="profile" class="tab-pane fade in active">
        <h3>Profile</h3>
        <form class="form-horizontal" id="frmAddRole" method="POST" action="{{url('/admin_profile',$admin->id)}}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$admin->name}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$admin->email}}" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default"><i class="fa fa-save text-primary" aria-hidden="true"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
    <div id="changePassword" class="tab-pane fade">
        <h3>Change Password</h3>
        <p>Some content in menu 2.</p>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('scripts/profile.js') }}" type="text/javascript"></script>
@endsection