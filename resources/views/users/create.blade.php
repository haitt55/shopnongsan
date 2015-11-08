@extends('layouts.master')

@section('title', 'Create User')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('users.index') }}" class="btn btn-success">Listing</a>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create User
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('users.store') }}" role="form">
                                @include('layouts.partials.errors')

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection