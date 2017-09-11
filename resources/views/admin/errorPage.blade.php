@extends('admin.layouts.admin')
@section('content')
<div class="error-page">
    @if (session('error'))
    <h4 class="headline text-red"> {{ session('error.code') }}</h4>
    @endif
    <div class="error-content">
        <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>
        @if (session('error'))
        <h4>{{ session('error.message') }}</h4>
        @endif
    </div>
</div>
@endsection
@section('scripts')
@endsection
