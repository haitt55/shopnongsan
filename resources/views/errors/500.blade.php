@extends('layouts.master')

@section('title', '500 Something Went Wrong')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">500 Something Went Wrong</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <p>But we are working to fix on it!</p>
                <p class="text-center">
                    <a href="{{ route('home.dashboard') }}" class="btn btn-primary">Dashboard</a>
                </p>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection