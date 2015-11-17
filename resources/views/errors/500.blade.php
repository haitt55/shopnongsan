@extends('layouts.master')

@section('title', '500 Something Went Wrong')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">500
                <strong>Something Went Wrong</strong>
            </h2>
            <hr>
        </div>
        <div class="col-md-12 text-center">
            <p>But we are working to fix on it!</p>
            <p>
                <a href="{{ route('home.index') }}" class="btn btn-primary">Home</a>
            </p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

@endsection