@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="nav-box">
            <h2><a href="{{route('recruitment.reports.index')}}">{{trans('app.recruitment.reports.main')}}</a></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque vel temporibus sapiente enim tempora dolores excepturi maxime, repellendus, et tenetur fuga eaque nemo, mollitia adipisci veritatis praesentium nisi neque in.</p>
        </div>
    </div>
</div>
@endsection