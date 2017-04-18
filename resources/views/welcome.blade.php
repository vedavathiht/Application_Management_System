@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                @if (Auth::check())
                @if ( Auth::user()->user_type != 0)
                
                 @endif
                @endif
                <div class="panel-body">
                    <img src="welcome.jpeg" class="img-thumbnail" alt="Image not found" width="1000" height="800">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
