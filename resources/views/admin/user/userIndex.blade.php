@extends('admin.layouts.admin')
@section('content')
<div class="row">
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
    <div class="col-sm-12">
        <div class="margin-bottom">
            <a href="{{url('/admin_user_new')}}" class="btn btn-default" role="button">
                <i class="fa fa-plus-circle text-primary" aria-hidden="true"></i> Add User
            </a>
        </div>
        <table id="tblUsers">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(isset($users))
                @foreach($users as $user)

                <tr>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        <a href="{{url('/admin_user_edit',$user->id)}}" class="btn btn-default" role="button">
                            <i class="fa fa-pencil-square-o text-primary" aria-hidden="true"></i>
                        </a>
                        <form class="inline delete" action="{{url('/admin_user_delete',$user->id)}}" method="POST">
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
<script src="{{ asset('scripts/user.js') }}" type="text/javascript"></script>
@endsection