@extends('layouts.master')

@section('title', '404 Not Found')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">404
                <strong>Not Found</strong>
            </h2>
            <hr>
        </div>
        <div class="col-md-12 text-center">
            <p>We looked everywhere but we couldn't find it!</p>
            <p>
                <a href="{{ route('home.index') }}" class="btn btn-primary">Home</a>
            </p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

@endsection