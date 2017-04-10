@extends('layout.master')

@section('title',"Dashboard - $user_name | kwntu")

@section('content')
<!-- Dashboard to display when a user is logged in -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Welcome {{ Auth::user()->user_name }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
