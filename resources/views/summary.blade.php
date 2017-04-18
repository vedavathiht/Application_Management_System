@extends('layouts.app')

<script type="text/javascript" src="{{ URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js') }}"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Summery</div>

                <div class="panel-body">

                <div class="jumbotron">
                <h3>Workstations :  <span class="badge"> {{ $workstations }} </span></h3>
                 <h3>Applications :  <span class="badge"> {{ $applications }} </span></h3>
                 <h3> Users :  <span class="badge">{{ $appusers }} </span></h3>
                 </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection