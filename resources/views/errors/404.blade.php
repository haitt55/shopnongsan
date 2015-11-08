@extends('layouts.master')

@section('title', '404 Not Found')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">404 Page Not Found</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <p>We looked everywhere but we couldn't find it!</p>
                <p class="text-center">
                    <a href="{{ route('home.dashboard') }}" class="btn btn-primary">Dashboard</a>
                </p>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection